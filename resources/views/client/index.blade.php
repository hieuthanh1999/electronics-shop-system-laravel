@extends('layouts.client')
@section('content-client')
    <style>
        .slick-layout-wrapper--15 .slick-list {
            width: 100%;
        }
        .offer {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 15px;
            background-color: #ff4500;
            /* Màu cam nổi bật */
            color: white;
            font-weight: bold;
            font-size: 16px;
            border-radius: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Thêm bóng cho phần text */
            transform: rotate(-10deg);
            /* Góc nghiêng để tạo sự độc đáo */
            z-index: 10;
            /* Đảm bảo phần này luôn hiển thị trên các thành phần khác */
        }

        /* Hiệu ứng hover */
        .offer:hover {
            background-color: #ff6347;
            /* Màu cam sáng hơn khi hover */
            cursor: pointer;
            transform: rotate(0deg);
            /* Loại bỏ hiệu ứng nghiêng khi hover */
        }

        .container_fullwidth {
            background-color: #f5f5f5;
        }

        .news-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .news-item {
            flex: 1;
            min-width: 22%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .news-item h2 {
            font-style: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .news-item p {
            font-size: 14px;
            color: #555;
        }

        #sequence {
            position: relative;
            width: 100%;
            height: 25vh;
            overflow: hidden;
        }

        .sequence-canvas {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            transition: transform 1s ease-in-out;
            /* Hiệu ứng chuyển slide */
        }

        .sequence-canvas li {

            position: relative;
            min-width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            object-fit: cover;
            /* Giữ tỷ lệ ảnh và cắt bớt phần thừa */
            object-position: center;
            /* Căn giữa ảnh */
        }

        .flat-caption {
            position: relative;
            z-index: 2;
            color: #fff;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .sequence-prev,
        .sequence-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }

        .sequence-prev {
            left: 20px;
        }

        .sequence-next {
            right: 20px;
        }


        .style-header-index {
            text-align: center;
            background: #4f5962;
            border-radius: 10px;
            color: white;
            padding: 10px;
        }

        /* Overlay che màn hình */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* Làm mờ nền */
            display: flex;
            justify-content: center;
            /* Căn giữa ngang */
            align-items: center;
            /* Căn giữa dọc */
            z-index: 1000;
            display: none;
            /* Mặc định ẩn */
        }

        /* Nội dung popup */
        .popup-content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            left: 30%;
            top: 40%;
            position: relative;
            background: #fff;
            width: 800px;
            max-width: 90%;
            padding: 10px 20px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: popupFadeIn 0.5s ease;
            /* Hiệu ứng mờ dần */
        }

        /* Tiêu đề và mô tả */
        .popup-content h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .popup-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Input email */
        .popup-content input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: all 0.3s ease;
        }

        .popup-content input[type="email"]:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        /* Nút đăng ký */
        .subscribe-button {
            width: 100%;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .subscribe-button:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Nút đóng */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 24px;
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-button:hover {
            color: #333;
        }

        /* Hiệu ứng xuất hiện */
        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        #toast {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            visibility: hidden;
        }

        #toast.show {
            visibility: visible;
            opacity: 1;
        }

        .newletter-image img {
            width: 500px;
            height: 300px;
        }

        .newletter-content {
            padding: 10px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function showToast(email) {
                var toast = document.getElementById('toast');
                var toastEmail = document.getElementById('toast-email');

                toastEmail.innerText = email;

                toast.classList.add('show');

                setTimeout(function() {
                    toast.classList.remove('show');
                }, 3000);
            }
            setTimeout(() => {
                const newsletterPopup = document.getElementById('newsletter-popup');
                if (newsletterPopup) {
                    newsletterPopup.style.display = 'block';
                }
            }, 3000);

            const closePopupButton = document.getElementById('close-popup');
            if (closePopupButton) {
                closePopupButton.addEventListener('click', function() {
                    const newsletterPopup = document.getElementById('newsletter-popup');
                    if (newsletterPopup) {
                        newsletterPopup.style.display = 'none';
                    }
                });
            }

            // Xử lý gửi form
            const newsletterForm = document.getElementById('newsletter-form');
            if (newsletterForm) {
                $('#newsletter-form').submit(function(e) {
                    e.preventDefault();

                    const email = $('input[name="email"]').val(); // Lấy giá trị email

                    $.ajax({
                        url: '/newsletter', // URL gửi đến
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            email: email
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.success) {
                                showToast(email);
                            } else {
                                showToast('Có lỗi xảy ra. Vui lòng thử lại!');
                            }
                        },
                        error: function(error) {
                            console.error('Lỗi:', error);
                            showToast('Có lỗi xảy ra. Vui lòng thử lại!');
                        }
                    });
                });

            }
        });
    </script>
    <div class="axil-main-slider-area main-slider-style-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-sm-6">
                    <div class="main-slider-content">
                        <div class="slider-content-activation-one">
                            @foreach ($banners as $item)
                                <div class="single-slide slick-slide" data-sal="slide-up" @if ($loop->first) data-sal-delay="400" @endif
                                    data-sal-duration="800">
                                    <span class="subtitle"><i class="fas fa-fire"></i> {{ $item->description }}</span>
                                    <h1 class="title">{{ $item->title }}</h1>

                                </div>
                            @endforeach
                            {{-- <div class="single-slide slick-slide">
                                <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                <h1 class="title">Smart Digital Watch</h1>

                            </div>
                            <div class="single-slide slick-slide">
                                <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                <h1 class="title">Roco Wireless Headphone</h1>

                            </div>
                            <div class="single-slide slick-slide">
                                <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                <h1 class="title">Smart Digital Watch</h1>

                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="main-slider-large-thumb">
                        <div class="slider-thumb-activation-one axil-slick-dots">
                            @foreach ($banners as $item)
                                <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600"
                                    data-sal-duration="1500">
                                    <img src="{{ asset("asset/client/images/banners/$item->image") }}" alt="Product">
                                </div>
                            @endforeach
                            {{-- <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600"
                                data-sal-duration="1500">
                                <img src="{{ asset('source/assets/images/product/product-39.png') }}" alt="Product">

                            </div>
                            <div class="single-slide slick-slide">
                                <img src="{{ asset('source/assets/images/product/product-38.png') }}" alt="Product">

                            </div>
                            <div class="single-slide slick-slide">
                                <img src="{{ asset('source/assets/images/product/product-39.png') }}" alt="Product">

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1"><img src="{{ asset('source/assets/images/others/shape-1.png') }}" alt="Shape"></li>
            <li class="shape-2"><img src="{{ asset('source/assets/images/others/shape-2.png') }}" alt="Shape"></li>
        </ul>
    </div>

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> This Week’s</span>
                <h2 class="title">New Arrivals</h2>
            </div>
            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        @foreach ($newProducts as $newProduct)

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="{{ route('user.products_detail', $newProduct->id) }}">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset("asset/client/images/products/small/$newProduct->img") }}" alt="Product Images">
                                        <img class="hover-img" src="{{ asset("asset/client/images/products/small/$newProduct->img") }}" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">New</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            {{-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> --}}
                                            <li class="select-option">
                                                <a href="{{ route('user.products_detail', $newProduct->id) }}">
                                                    View Detail
                                                </a>
                                            </li>
                                            {{-- <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 style="height: 50px" class="title"><a href="{{ route('user.products_detail', $newProduct->id) }}">{{ $newProduct->name }}</a></h5>
                                        <div class="productname" style="padding: 10px 0;">
                                            <x-avg-stars :number="$newProduct->avg_rating" />
                                            {{-- <span style="font-size: 14px;">Đã bán: {{ $newProduct->sum }}</span> --}}
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{ format_number_to_money($newProduct->price_sell) }} VND</span>
                                            {{-- <span class="price old-price">$49.99</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    @endforeach


                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start Categorie Area  -->
    <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
                <h2 class="title">Browse by Category</h2>
            </div>
            <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach (category_child_content() as $category)
                <div class="slick-single-layout">
                    <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                        <a href="{{ route('user.products', $category->slug) }}">

                            <h6 class="cat-title">{{ $category->name }}</h6>
                        </a>
                    </div>
                    <!-- End .categrie-product -->
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Start Axil Product Poster Area  -->
    <div class="axil-poster">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb--30">
                <div class="single-poster">
                    <a href="shop.html">
                        <img src="{{ asset("source/assets/images/product/poster/poster-01.png") }}" alt="eTrade promotion poster">
                        <div class="poster-content">
                            <div class="inner">
                                <h3 class="title">Rich sound, <br> for less.</h3>
                                <span class="sub-title">Collections <i class="fal fa-long-arrow-right"></i></span>
                            </div>
                        </div>
                        <!-- End .poster-content -->
                    </a>
                </div>
                <!-- End .single-poster -->
            </div>
            <div class="col-lg-6 mb--30">
                <div class="single-poster">
                    <a href="shop-sidebar.html">
                        <img src="{{ asset("source/assets/images/product/poster/poster-02.png") }}" alt="eTrade promotion poster">
                        <div class="poster-content content-left">
                            <div class="inner">
                                <span class="sub-title">50% Offer In Winter</span>
                                <h3 class="title">Get VR <br> Reality Glass</h3>
                            </div>
                        </div>
                        <!-- End .poster-content -->
                    </a>
                </div>
                <!-- End .single-poster -->
            </div>
        </div>
    </div>
    </div>
    <!-- End Axil Product Poster Area  -->
    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                <h2 class="title">Top-selling Products</h2>
            </div>
            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        @foreach ($bellingProducts as $bellingProduct)

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="{{ route('user.products_detail', $bellingProduct->id) }}">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset("asset/client/images/products/small/$bellingProduct->img") }}" alt="Product Images">
                                        <img class="hover-img" src="{{ asset("asset/client/images/products/small/$bellingProduct->img") }}" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">Hot</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            {{-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> --}}
                                            <li class="select-option">

                                                <a href="{{ route('user.products_detail', $bellingProduct->id) }}">
                                                    View Detail
                                                </a>

                                            </li>
                                            {{-- <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 style="height: 50px" class="title"><a href="{{ route('user.products_detail', $bellingProduct->id) }}">{{ $bellingProduct->name }}</a></h5>
                                        <div class="productname" style="padding: 10px 0;">
                                            <x-avg-stars :number="$bellingProduct->avg_rating" />
                                            <span style="font-size: 14px;">Đã bán: {{ $bellingProduct->sum }}</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{ format_number_to_money($bellingProduct->price_sell) }} VND</span>
                                            {{-- <span class="price old-price">$49.99</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    @endforeach


                    </div>
                </div>
                <!-- End .slick-single-layout -->

                <!-- End .slick-single-layout -->
            </div>
        </div>
    </div>
    <!-- Start Testimonila Area  -->
    <div class="axil-testimoial-area axil-section-gap bg-vista-white">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="fal fa-quote-left"></i>Testimonials</span>
                <h2 class="title">Users Feedback</h2>
            </div>
            <!-- End .section-title -->
            <div class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                @if (count($productReviews) > -1)
                    @foreach ($productReviews as $productReview)

                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>{{ $productReview->content }}</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <span class="designation">{{ $productReview->created_at }}</span>
                                <h6 class="title">{{ $productReview->user_name }}</h6>
                            </div>
                            {{-- <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div> --}}
                        </div>
                        <!-- End .thumbnail -->
                        </div>
                    @endforeach
                @else
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“ It’s amazing how much easier it has been to
                                meet new people and create instantly non
                                connections. I have the exact same personal
                                the only thing that has changed is my mind
                                set and a few behaviors. “</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div>
                            {{-- <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div> --}}
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Testimonila Area  -->



    {{-- <div class="cart-dropdown" id="cart-dropdown">
        @if (count(\Cart::getContent()) <= 0)
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Giỏ hàng</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <div class="cart-empty">
                    <h3>Giỏ hàng rỗng</h3>
                    <p>Hãy thêm sản phẩm vào giỏ hàng</p>
                </div>
            </div>
        </div>
        @else
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Giỏ hàng</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    @foreach ($carts as $cart)
                    <form action="{{ route('cart.update') }}" method="post">
                      @csrf
                      <li class="cart-item">
                        <div class="item-img">
                            <a href=""><img src="{{ asset("asset/client/images/products/small/" . $cart->attributes->image . "") }}" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                            <h3 class="item-title"><a href="single-product-3.html">{{ $cart->name }}</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>{{ format_number_to_money($cart->price) }} VNĐ</div>
                            @isset($cart->attributes->color)
                                <div class="item-price">{{ $cart->attributes->color }}</div>
                            @endisset
                            @isset($cart->attributes->size)
                                <div class="item-price">{{ $cart->attributes->size }}</div>
                            @endisset
                            <div class="pro-qty item-quantity">
                                <input name="quantity" type="number" class="quantity-input" value="{{ $cart->quantity }}">
                            </div>
                        </div>
                    </li>

                    </form>
                    @endforeach

                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">{{ format_number_to_money(Cart::getTotal()) }} VNĐ</span>
                </h3>
                <div class="group-btn">
                    <a href="{{ route('cart.index') }}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="{{ route('checkout.index') }}" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div> --}}
@endsection
