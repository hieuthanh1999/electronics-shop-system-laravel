@extends('layouts.client')
@section('content-client')
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Tin tức</li>
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
    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">

        <!-- End .single-post -->
        <div class="post-single-wrapper position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 axil-post-wrapper">
                        <div class="post-heading">
                            <h2 class="title">{{ $news->title }}</h2>

                        </div>
                        <p>{{ $news->description }}</p>
                    </div>

                    <div class="col-lg-4">
                        <aside class="axil-sidebar-area">
                            <div class="axil-single-widget mt--40">
                                <h6 class="widget-title">Sản phẩm bán chạy</h6>
                                <ul class="product_list_widget recent-viewed-product">
                                    @foreach ($bellingProducts as $bellingProduct)
                                        <!-- Start Single product_list  -->
                                        <li>
                                            <div class="thumbnail">
                                                <a href="{{ route('user.products_detail', $bellingProduct->id) }}">
                                                    <img src="{{ asset("asset/client/images/products/small/$bellingProduct->img") }}" alt="Blog Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="{{ route('user.products_detail', $bellingProduct->id) }}">{{ $bellingProduct->name }}</a></h6>
                                                <div class="product-meta-content">
                                                    <span class="woocommerce-Price-amount amount">
                                                        {{ format_number_to_money($bellingProduct->price_sell) }} VND
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single product_list  -->
                                    @endforeach
                                </ul>

                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->
    @vite(['resources/client/css/cart.css'])
@endsection
