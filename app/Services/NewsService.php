<?php

namespace App\Services;

use App\Helpers\TextSystemConst;
use App\Http\Requests\Admin\StoreCommonRequest;
use App\Models\news;
use App\Repository\Eloquent\NewsRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsService
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * BrandService constructor.
     *
     * @param newsRepository $brandRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list brand
        $list = $this->newsRepository->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã ID',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tiêu Đề',
                    'key' => 'title',
                ],
              
            ],
            'actions' => [
                'text'          => "Thao Tác",
                'create'        => true,
                'createExcel'   => false,
                'edit'          => true,
                'deleteAll'     => true,
                'delete'        => true,
                'viewDetail'    => false,
            ],
            'routes' => [
                'create' => 'admin.news_create',
                'delete' => 'admin.news_delete',
                'edit' => 'admin.news_edit',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("news"),
            'tableCrud' => $tableCrud,
        ];
    }

    /**
     * Show the form for creating a new user.
     *
     * @return array
     */
    public function create()
    {
        try {
            $fields = [
                [
                    'attribute' => 'title',
                    'label' => 'Tiêu Đề',
                    'type' => 'text',
                ],
                [
                    'attribute' => 'description',
                    'label' => 'Chi tiết',
                    'type' => 'text',
                ],
                [
                    'attribute' => 'priority',
                    'label' => 'Độ ưu tiên',
                    'type' => 'number',
                ],
            ];

            $rules = [
                'title' => [
                    'required' => true,
                ],
                'description' => [
                    'required' => true,
                ],
                'priority' => [
                    'required' => true,
                ],
            ];

            // Messages eror rules
            $messages = [
                'title' => [
                    'required' => __('message.required', ['attribute' => 'Tên tiêu đề là bắt buộc']),
                ],
                'description' => [
                    'required' => __('message.required', ['attribute' => 'Chi tiết là bắt buộc']),
                ],
                'priority' => [
                    'required' => __('message.required', ['attribute' => 'Độ ưu tiên là bắt buộc']),
                ],
            ];

            return [
                'fields' => $fields,
                'title' => TextLayoutTitle("create_news"),
                'rules' => $rules,
                'messages' => $messages,
            ];
        } catch (Exception) {
            return [];
        }

    }

    /**
     * store the admin in the database.
     * @param App\Http\Requests\Admin\StoreCategoryRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',  // description không bắt buộc
                'priority' => 'required|integer',    // priority không bắt buộc
            ]);
            $this->newsRepository->create($data);
            return redirect()->route('admin.news_index')->with('success', TextSystemConst::CREATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('admin.news_index')->with('error', TextSystemConst::CREATE_FAILED);
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return array
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);
        try {
            $fields = [
                [
                    'attribute' => 'title',
                    'label' => 'Tiêu Đề',
                    'type' => 'text',
                    'value' => $news->title
                ],
                [
                    'attribute' => 'description',
                    'label' => 'Chi tiết',
                    'type' => 'text',
                    'value' => $news->description
                ],
                [
                    'attribute' => 'priority',
                    'label' => 'Độ ưu tiên',
                    'type' => 'number',
                    'value' => $news->priority
                ],
            ];
            $rules = [
                'title' => [
                    'required' => true,
                ],
                'description' => [
                    'required' => true,
                ],
                'priority' => [
                    'required' => true,
                ],
            ];

            // Messages eror rules
            $messages = [
                'title' => [
                    'required' => __('message.required', ['attribute' => 'Tên tiêu đề là bắt buộc']),
                ],
                'description' => [
                    'required' => __('message.required', ['attribute' => 'Chi tiết là bắt buộc']),
                ],
                'priority' => [
                    'required' => __('message.required', ['attribute' => 'Độ ưu tiên là bắt buộc']),
                ],
            ];

            return [
                'fields' =>$fields,
                'title' => TextLayoutTitle("edit_brand"),
                'rules' => $rules,
                'messages' => $messages,
                'news' => $news,
            ];
        } catch (Exception) {
            return [];
        }

    }

    public function update(Request $request, $id)
    {

        try {
            $news = $this->newsRepository->find($id);
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',  // description không bắt buộc
                'priority' => 'required|integer',    // priority không bắt buộc
            ]);
            $news->update($data);
            return redirect()->route('admin.news_index')->with('success', TextSystemConst::UPDATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()->route('admin.news_index')->with('error', TextSystemConst::UPDATE_FAILED);
        }
    }

     /**
     * delete the user in the database.
     * @param Illuminate\Http\Request; $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try{
            if($this->newsRepository->delete($this->newsRepository->find($request->id))) {
                return response()->json(['status' => 'success', 'message' => TextSystemConst::DELETE_SUCCESS], 200);
            }

            return response()->json(['status' => 'failed', 'message' => TextSystemConst::DELETE_FAILED], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['status' => 'error', 'message' => TextSystemConst::SYSTEM_ERROR], 200);
        }
    }
    public function getNews()
    {
        return$this->newsRepository->getNews();
    }

}
?>
