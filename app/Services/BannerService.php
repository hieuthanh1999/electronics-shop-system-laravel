<?php

namespace App\Services;

use App\Helpers\TextSystemConst;
use App\Http\Requests\Admin\StoreCommonRequest;
use App\Models\Banner;
use App\Repository\Eloquent\BannerRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BannerService
{
    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * BrandService constructor.
     *
     * @param BannerRepository $brandRepository
     */
    public function __construct(BannerRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list brand
        $list = $this->brandRepository->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã Banner',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tên Banner',
                    'key' => 'title',
                ],
                [
                    'text' => 'Hình Ảnh',
                    'key' => 'image',
                    'img' => [
                        'url' => 'asset/client/images/banners/',
                        'style' => 'width: 200px;'
                    ],
                ],
                [
                    'text' => 'Chi tiết',
                    'key' => 'description',
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
                'create' => 'admin.banners_create',
                'delete' => 'admin.banners_delete',
                'edit' => 'admin.banners_edit',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("banner"),
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

            //Rules form
            $rules = [
                'name' => [
                    'required' => true,
                    'minlength' => 1,
                    'maxlength' => 100,
                ],
                'file-input' => [
                    'required' => __('message.required', ['attribute' => 'hình ảnh']),
                ],
            ];

            // Messages eror rules
            $messages = [
                'name' => [
                    'required' => __('message.required', ['attribute' => 'Tên tiêu đề']),
                    'minlength' => __('message.min', ['min' => 1, 'attribute' => 'Tên tiêu đề']),
                    'maxlength' => __('message.max', ['max' => 100, 'attribute' => 'Tên tiêu đề']),
                ],
            ];

            return [
                'title' => TextLayoutTitle("create_banner"),
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
                'image' => 'required',
                'description' => 'nullable|string'
            ]);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('asset/client/images/banners'), $imageName);
            $data['image'] = $imageName;
            $this->brandRepository->create($data);
            return redirect()->route('admin.banners_index')->with('success', TextSystemConst::CREATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('admin.banners_index')->with('error', TextSystemConst::CREATE_FAILED);
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return array
     */
    public function edit($id)
    {
        $category = $this->brandRepository->find($id);
        try {
            //Rules form
            $rules = [
                'name' => [
                    'required' => true,
                    'minlength' => 1,
                    'maxlength' => 100,
                ],
                'file-input' => [
                    'required' => __('message.required', ['attribute' => 'hình ảnh']),
                ],
            ];

            // Messages eror rules
            $messages = [
                'name' => [
                    'required' => __('message.required', ['attribute' => 'Tên tiêu đề']),
                    'minlength' => __('message.min', ['min' => 1, 'attribute' => 'Tên tiêu đề']),
                    'maxlength' => __('message.max', ['max' => 100, 'attribute' => 'Tên tiêu đề']),
                ],
            ];

            return [
                'title' => TextLayoutTitle("edit_brand"),
                'rules' => $rules,
                'messages' => $messages,
                'banner' => $category,
            ];
        } catch (Exception) {
            return [];
        }

    }

    public function update(Request $request, $id)
    {

        try {
            $banner = $this->brandRepository->find($id);
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string'
            ]);
            if ($request->image) {
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('asset/client/images/banners'), $imageName);
                $data['image'] = $imageName;
            }
            $banner->update($data);
            return redirect()->route('admin.banners_index')->with('success', TextSystemConst::UPDATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()->route('admin.banners_index')->with('error', TextSystemConst::UPDATE_FAILED);
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
            if($this->brandRepository->delete($this->brandRepository->find($request->id))) {
                return response()->json(['status' => 'success', 'message' => TextSystemConst::DELETE_SUCCESS], 200);
            }

            return response()->json(['status' => 'failed', 'message' => TextSystemConst::DELETE_FAILED], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['status' => 'error', 'message' => TextSystemConst::SYSTEM_ERROR], 200);
        }
    }
}
?>
