@extends('layouts.client')
@section('content-client')
<style>
    .axil-post-wrapper .description {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Giới hạn 3 dòng */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
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
        <div class="container">
            <div class="row row--25">
                <div class="col-lg-8 axil-post-wrapper">
                    @foreach ($news as $item)
                        <!-- Start Single Blog  -->
                        <div class="content-blog sticky mt--60">
                            <div class="inner">
                                <div class="content">
                                    <h4 class="title"><a href="{{ route('user.news.details', $item->id) }}">{{ $item->title }}</a></h4>

                                    <p class="description">{{ \Illuminate\Support\Str::limit($item->description, 200, '...') }}</p>
                                    <div class="read-more-btn">
                                        <a class="axil-btn btn-bg-primary" href="{{ route('user.news.details', $item->id) }}">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->
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
                    <!-- End Sidebar Area -->
                </div>
            </div>
            <div class="post-pagination">
                <nav class="navigation pagination" aria-label="Products">
                    {{ $news->links() }}
                </nav>
            </div>
            <!-- End post-pagination -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End Blog Area  -->
    @vite(['resources/client/css/cart.css'])
@endsection
