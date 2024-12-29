<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
 /**
     * @var Newsç
     */
    private $newService;

    /**
     * BrandController constructor.
     *
     * @param newService $newService
     */
    public function __construct(NewsService $newService)
    {
        $this->newService = $newService;
    }
    public function index()
    {
        return view('admin.news.index', $this->newService->index());
    }
     public function create()
    {
        return view('admin.news.create', $this->newService->create());
    }

    public function store(Request $request)
    {
        return $this->newService->store($request);
    }

    public function edit($id)
    {
        return view('admin.news.edit',$this->newService->edit($id));
    }

    public function update(Request $request, $id)
    {
        return $this->newService->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->newService->delete($request);
    }
}
