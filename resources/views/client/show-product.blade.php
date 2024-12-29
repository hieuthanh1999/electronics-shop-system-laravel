@extends('layouts.client')
@section('content-client')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{ asset('source/assets/images/product/product-45.png') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="axil-shop-sidebar category leftbar">
                        <form method="get">
                            <div class="d-lg-none">
                                <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title">Danh mục</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        @foreach ($categories as $index => $category)
                                            <li>
                                                <input type="radio" class="checkboxx" value="{{ $category->slug }}"
                                                       name="category_slug" id="category_{{ $index }}"
                                                       @if ($loop->first) checked @endif>
                                                <label for="category_{{ $index }}">
                                                    {{ $category->name }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title">Thương hiệu</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li>
                                            <input type="radio" id = "all" class="checkboxx" value="" name="brand_id" checked>
                                            <label class="name-filter" for="all">
                                                Tất cả
                                            </label>
                                        </li>
                                        @foreach ($brands as $index => $brand)
                                        <li>
                                            <input type="radio" class="checkboxx" value="{{ $brand->id }}"
                                                   name="brand_id" id="brand_{{ $index }}"
                                                  >
                                            <label for="brand_{{ $index }}" class="name-filter">
                                                {{ $brand->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="toggle-list product-price-range active">
                                <h6 class="title">PRICE</h6>
                                <div class="shop-submenu">
                                    <div style="display: flex; width: 100%; align-items: center">
                                        <div class="form-control">
                                            <input id="min-price" type="text" value="{{ $request->min_price ?? '' }}" class=" price-filter" placeholder="Giá từ" name="min_price">
                                        </div>
                                        <span class="separate">-</span>
                                        <div class="form-control">
                                            <input id="max-price" type="text" value="{{ $request->max_price ?? '' }}" class="price-filter" placeholder="Giá đến" name="max_price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="filter-price" class="axil-btn btn-bg-primary" url="{{ $request->fullUrl() }}">Lọc Sản Phẩm</button>
                        </form>
                    </div>
                    <!-- End .axil-shop-sidebar -->
                </div>
                <div class="col-lg-9">

                    <div class="row row--15">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="axil-product product-style-one mb--30">
                                        <div class="thumbnail">
                                            <a href="{{ route('user.products_detail', $product->id) }}">
                                                <img src="{{ asset("asset/client/images/products/small/$product->img") }}" alt="Product Name">
                                            </a>
                                            {{-- <div class="label-block label-right">
                                                <div class="product-badget">10% OFF</div>
                                            </div> --}}
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    {{-- <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                                    </li> --}}
                                                    <li class="select-option">
                                                        <a href="{{ route('user.products_detail', $product->id) }}" class="button add-cart" type="button">Xem Chi Tiết</a>
                                                    </li>
                                                    {{-- <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="{{ route('user.products_detail', $product->id) }}">{{ $product->name }}</a></h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price">{{ format_number_to_money($product->price_sell) }} VNĐ</span>
                                                    {{-- <span class="price old-price">$30</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <h3 class="title" style="padding-top: 20px;">Không tìm thấy sản phẩm</h3>
                        @endif

                    </div>
                    @if (count($products) > 0)
                    <div class="text-center pt--20">
                        <div class="text-center">
                            <ul class="pagination">
                                {{ $products->links('vendor.pagination.default') }}
                            </ul>
                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
@endsection
