<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreCommonRequest;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
     /**
     * @var bannerService
     */
    private $bannerService;

    /**
     * BrandController constructor.
     *
     * @param BannerService $bannerService
     */
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    public function index()
    {
        return view('admin.banner.index', $this->bannerService->index());
    }
     public function create()
    {
        return view('admin.banner.create', $this->bannerService->create());
    }

    public function store(Request $request)
    {
        return $this->bannerService->store($request);
    }

    public function edit($id)
    {
        return view('admin.banner.edit',$this->bannerService->edit($id));
    }

    public function update(Request $request, $id)
    {
        return $this->bannerService->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->bannerService->delete($request);
    }
}
