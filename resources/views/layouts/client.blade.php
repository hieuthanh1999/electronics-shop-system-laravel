<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 15:56:30 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('asset/client/images/favicon.png') }}">
    <title>{{ setting_website()->name }}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/css/style.min.css') }}">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <link href="{{ asset('asset/client/css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="{{ asset('asset/client/css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('asset/client/css/flexslider.css') }}" type="text/css" media="screen"/>
    <link href="{{ asset('asset/client/css/sequence-looptheme.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/client/js/jquery.elevatezoom.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    {{-- <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet"> --}}
    @vite(['resources/client/css/auth.css', 'resources/client/css/home.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<body class="sticky-header newsletter-popup-modal">
    <style>/* Định dạng popup */
       /* Popup tổng thể */
.thank-you-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Hiệu ứng nền mờ */
    display: none; /* Ẩn mặc định */
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* Nội dung popup */
.thank-you-popup-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: popup-appear 0.3s ease-in-out;
}

/* Header của popup */
.thank-you-popup-header {
    margin-bottom: 20px;
}

/* Icon cảm ơn */
.thank-you-icon {
    width: 80px;
    height: 80px;
}

/* Nội dung thông điệp */
.thank-you-popup-body {
    font-size: 16px;
    font-weight: 500;
    color: #333333;
    margin-bottom: 20px;
}

/* Nút đóng */
.thank-you-close-button {
    background-color: #4caf50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.thank-you-close-button:hover {
    background-color: #45a049;
}

/* Hiệu ứng xuất hiện */
@keyframes popup-appear {
    from {
        transform: scale(0.7);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

    </style>
    <script>

document.addEventListener('DOMContentLoaded', function () {
    function showPopup(message) {
        var popup = document.getElementById('thank-you-popup');
        var popupMessage = document.getElementById('thank-you-message');

        // Gán thông điệp vào popup
        popupMessage.innerText = message;

        // Hiển thị popup
        popup.style.display = 'flex';

        // Đóng popup khi nhấn nút
        document.getElementById('close-popup').addEventListener('click', function () {
            popup.style.display = 'none';
        });

        // Tự động đóng popup sau 3 giây
        setTimeout(function () {
            popup.style.display = 'none';
        }, 5000);
    }

    // Xử lý gửi form
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        $('#newsletter-form').off('submit').on('submit', function (e) {
            e.preventDefault();

            const email = $('input[name="email"]').val(); // Lấy giá trị email

            $.ajax({
                url: '/newsletter', // URL gửi đến
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        showPopup('Cảm ơn bạn đã đăng ký! Email: ' + email);
                    } else {
                        showPopup('Có lỗi xảy ra. Vui lòng thử lại!');
                    }
                },
                error: function (error) {
                    console.error('Lỗi:', error);
                    showPopup('Có lỗi xảy ra. Vui lòng thử lại!');
                }
            });
        });

    }
});


    </script>
 <!-- Popup cảm ơn -->
<!-- Popup cảm ơn -->
<div id="thank-you-popup" class="thank-you-popup">
    <div class="thank-you-popup-content">
        <div class="thank-you-popup-header">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Thank you icon" class="thank-you-icon">
        </div>
        <div class="thank-you-popup-body">
            <p id="thank-you-message"></p>
        </div>
        <div class="thank-you-popup-footer">
            <button id="close-popup" class="thank-you-close-button">Đóng</button>
        </div>
    </div>
</div>


    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <header class="header axil-header header-style-1" style="z-index: 100">
        <div class="header-top-campaign">
            {{-- <div class="container position-relative">
                <div class="campaign-content">
                    <p>Open Doors To A World Of Fashion <a href="#">Discover More</a></p>
                </div>
            </div>
            <button class="remove-campaign"><i class="fal fa-times"></i></button> --}}
        </div>

        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{ route('user.home') }}" class="logo logo-dark">
                            <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" style="width: 40px; height: 50px;" alt="Electronics Shop System">
                         </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            {{-- <div class="mobile-nav-brand">
                                <a href="{{ route('user.home') }}">
                                    <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="Electronics Shop System">
                                 </a>
                                <a href="index.html" class="logo">

                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div> --}}
                            <ul class="mainmenu">
                                @foreach (category_header() as $category)
                                  {{-- Kiểm tra nếu danh mục có danh mục con --}}
                                    @php
                                        $childCategories = category_child_header($category->id);
                                    @endphp

                                    @if ($childCategories->isNotEmpty())
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('user.products', $category->slug) }}">{{ $category->name }}</a>
                                            <ul class="axil-submenu">
                                                @foreach ($childCategories as $child)
                                                    <li>
                                                        <a href="{{ route('user.products', $child->slug) }}">{{ $child->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="">
                                            <a href="{{ route($category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endif

                                @endforeach
                            </ul>

                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            {{-- <li class="axil-search">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li> --}}
                            {{-- <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li> --}}
                            <li class="shopping-cart">
                                <a href="{{ route('cart.index') }}" class="cart-dropdown-btn">
                                    <span class="cart-count">{{ \Cart::getTotalQuantity() }}</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown" style="z-index: 100">
                                    @if (Auth::check())
                                        <span class="title">Thông tin</span>
                                        <ul>
                                            <li>
                                                <a href="{{ route('profile.index') }}">Thông tin cá nhân</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('order_history.index') }}">Lịch sử mua hàng</a>
                                            </li>
                                            <li>
                                                <div class="login-btn">
                                                    <a href="{{ route('user.logout') }}" class="axil-btn btn-bg-primary">Đăng xuất</a>
                                                </div>
                                            </li>
                                        </ul>
                                    @else
                                    <div class="login-btn">
                                        <a href="{{ route('user.login') }}" class="axil-btn btn-bg-primary">Đăng nhập</a>
                                    </div>
                                    <div class="reg-footer text-center">Chưa có tài khoản? <a href="{{ route('user.register') }}" class="btn-link">Đăng ký.</a></div>
                                    @endif
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <main class="main-wrapper">
        @yield('content-client')
    </main>
    <hr>
    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                    <form id="newsletter-form">
                        @csrf
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="Nhập email của bạn" type="email" name="email">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
    <div class="service-area " >
        <div class="container separator-top" style="padding-top: 20px">
            <div class="row">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset("source/assets/images/icons/service1.png") }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset("source/assets/images/icons/service2.png") }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset("source/assets/images/icons/service3.png") }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset("source/assets/images/icons/service4.png") }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <div class="footer-top separator-top" style="padding: 20px">
            <div class="container">
               <div class="row" style="text-align: left">
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget" style="text-align: center;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            height: 100%;">
                        <a href="{{ route('user.home') }}">
                            <img style="width: 100px; height: 100px;"  src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="">
                         </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Thông tin liên hệ</h5>
                        <div class="inner">
                            <p>{{ setting_website()->address }}
                            </p>
                            <ul class="support-list-item">
                                <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i> {{ setting_website()->email }}</a></li>
                                <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> {{ setting_website()->phone_number }}</a></li>
                                <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Về chúng tôi</h5>
                        <div class="inner">
                            <p>Chuyên bán thời trang an toàn. Tin cậy nhanh chóng. Chăm sóc khách hàng 24/24
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Nhận thông tin từ chúng tôi</h5>
                        <div class="inner">
                            <p>Cảm ơn rất nhiều
                            </p>

                        </div>
                    </div>
                </div>
               </div>
            </div>
         </div>
          <!-- Start Copyright Area  -->
          <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2024. store</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{ asset("source/assets/images/icons/cart/cart-1.png") }}" alt="paypal cart"></li>
                                <li><img src="{{ asset("source/assets/images/icons/cart/cart-2.png") }}" alt="paypal cart"></li>
                                <li><img src="{{ asset("source/assets/images/icons/cart/cart-5.png") }}" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>

        {{-- <div class="copyright-info">
           <div class="container">
              <div class="row">
                 <div class="col-md-6">
                    <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                 </div>
                 <div class="col-md-6">
                    <ul class="social-icon">
                       <li><a href="#" class="linkedin"></a></li>
                       <li><a href="#" class="google-plus"></a></li>
                       <li><a href="#" class="twitter"></a></li>
                       <li><a href="#" class="facebook"></a></li>
                    </ul>
                 </div>
              </div>
           </div>
        </div> --}}
     </div>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-01.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-01.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-02.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-02.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-03.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-03.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="assets/images/icons/rate.png" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search" placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->

    <!-- Offer Modal Start -->
    <div class="offer-popup-modal" id="offer-popup-modal">
        <div class="offer-popup-wrap">
            <div class="card-body">
                <button class="popup-close"><i class="fas fa-times"></i></button>
                <div class="content">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                        <h3 class="title">Best Sales Offer<br> Grab Yours</h3>
                    </div>
                    <div class="poster-countdown countdown"></div>
                    <a href="shop.html" class="axil-btn btn-bg-primary">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('source/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('source/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('source/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="{{ asset('source/assets/images/product/product-38.png') }}/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('source/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('source/assets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('source/assets/js/main.js') }}"></script>
        @if (Session::has('success'))
        <span id="toast__js" message="{{ session('success') }}" type="success"></span>
    @elseif (Session::has('error'))
        <span id="toast__js" message="{{ session('error') }}" type="error"></span>
    @endif
    <!-- Bootstrap core JavaScript==================================================-->
    <script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/jquery.sequence-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/client/js/script.min.js') }}" ></script>
    <script defer src="{{ asset('asset/client/js/jquery.flexslider.js') }}"></script>
    @vite(['resources/admin/js/toast-message.js'])
</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 15:56:41 GMT -->
</html>
