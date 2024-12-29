@extends('layouts.client')
@section('content-client')
    <script>
        $(document).ready(function() {
            // Khi người dùng click vào một thumbnail màu sắc
            $('.thumbnail').on('click', function(e) {
                e.preventDefault();

                // Lấy ảnh màu từ data-image
                var newImage = $(this).data('image');

                // Cập nhật hình ảnh chính
                $('#zoom_03').attr('src', newImage);
                $('#zoom_03').attr('data-zoom-image', newImage);
            });

            // Điều chỉnh thanh trượt (optional, nếu cần tạo hiệu ứng trượt)
            $('#thum-prev').click(function() {
                $('#gallery_01').scrollLeft($('#gallery_01').scrollLeft() - 100);
            });
            $('#thum-next').click(function() {
                $('#gallery_01').scrollLeft($('#gallery_01').scrollLeft() + 100);
            });
        });
    </script>
    <style>
        .preview_image {
            position: relative;
        }

        .preview-small {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .thum-image {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .prev-thum {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .prev-thum li {
            margin-right: 10px;
        }

        .prev-thum .sub-img img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            cursor: pointer;
        }

        .control-left,
        .control-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #333;
            background: rgba(255, 255, 255, 0.7);
            padding: 5px;
            cursor: pointer;
        }

        .control-left {
            left: 10px;
        }

        .control-right {
            right: 10px;
        }

        .rating .fa-star {
            color: #b1b1b1;
        }

        .preview-small {
            margin-top: unset !important;
        }

        .quantyti_sold {
            font-size: 14px !important;
        }

        .products-description div {
            font-size: 14px;
            line-height: 20px;
        }

        .preview_image {
            position: sticky;
            top: 100px;
            /* Điều chỉnh khoảng cách từ trên cùng của trang khi cuộn */
            z-index: 20;
            /* Đảm bảo phần này không bị che bởi các phần tử khác */
        }
    </style>
    <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
        <div class="single-product-thumb mb--40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb--40">
                        <div class="row">
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                        @foreach ($productColor as $color)
                                            <div class="thumbnail">
                                                <a href="{{ asset('asset/client/images/products/small/' . $color->img) }}" class="popup-zoom">
                                                    <img src="{{ asset('asset/client/images/products/small/' . $color->img) }}" alt="Product Images">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="label-block">
                                        <div class="product-badget">20% OFF</div>
                                    </div> --}}
                                    <div class="product-quick-view position-view">
                                        <a href="{{ asset('asset/client/images/products/small/' . $product->img) }}" class="popup-zoom">
                                            <i class="far fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 order-lg-1">
                                <div class="product-small-thumb-3 small-thumb-wrapper">
                                    @foreach ($productColor as $color)
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('asset/client/images/products/small/' . $color->img) }}" alt="thumb image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb--40">
                        <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title">{{ $product->name }}</h2>
                                <span class="price-amount"> {{ format_number_to_money($product->price_sell) }} VNĐ</span>
                                <div class="product-rating">
                                    <div class="review-link">
                                        (<span>{{ $productSold->sum ?? 0 }}</span>  Số lượng đã bán)
                                    </div>
                                </div>
                                <ul class="product-meta">
                                    <li><i class="fal fa-check"></i>Số lượng sản phẩm trong kho (<span id="quantity_remain"></span>)</li>
                                    <li><i class="fal fa-check"></i>Miễn phí giao hàng</li>
                                    <li><i class="fal fa-check"></i>Giảm 30%</li>
                                </ul>
                                <div class="product-variations-wrapper">

                                    <!-- Start Product Variation  -->
                                    <div class="product-variation">
                                        <h6 class="title">Colors:</h6>
                                        <div class="color-variant-wrapper">
                                            <select id="data-color">
                                                @foreach ($productColor as $color)
                                                    <option value="{{ $color->id }}">
                                                        {{ $color->color_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Product Variation  -->

                                    <!-- Start Product Variation  -->
                                    <div class="product-variation product-size-variation">
                                        <h6 class="title">Size:</h6>
                                        <select id="data-size" data-sizes="{{ json_encode($productSize) }}" name="id">

                                        </select>
                                    </div>
                                    <!-- End Product Variation  -->

                                </div>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper d-flex-center">
                                    <!-- Start Quentity Action  -->
                                    <div class="pro-qty"><input type="text" value="1" min="1" name="quantity"></div>
                                    <!-- End Quentity Action  -->

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart"><button type="submit" class="axil-btn btn-bg-primary">Thêm vào giỏ hàng</button></li>
                                        {{-- <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li> --}}
                                    </ul>
                                    <!-- End Product Action  -->

                                </div>
                                <!-- End Product Action Wrapper  -->
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

        <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
            <div class="container">
                <ul class="nav tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Chi tiết sản phẩm</a>
                    </li>
                    {{-- <li class="nav-item " role="presentation">
                        <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">Additional Information</a>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                        <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá sản phẩm</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="product-desc-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>{!! $product->description !!}</p>
                                </div>

                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-desc-wrapper -->
                    </div>
                    <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                        <div class="product-additional-info">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Stand Up</th>
                                            <td>35″L x 24″W x 37-45″H(front to back wheel)</td>
                                        </tr>
                                        <tr>
                                            <th>Folded (w/o wheels) </th>
                                            <td>32.5″L x 18.5″W x 16.5″H</td>
                                        </tr>
                                        <tr>
                                            <th>Folded (w/ wheels) </th>
                                            <td>32.5″L x 24″W x 18.5″H</td>
                                        </tr>
                                        <tr>
                                            <th>Door Pass Through </th>
                                            <td>24</td>
                                        </tr>
                                        <tr>
                                            <th>Frame </th>
                                            <td>Aluminum</td>
                                        </tr>
                                        <tr>
                                            <th>Weight (w/o wheels) </th>
                                            <td>20 LBS</td>
                                        </tr>
                                        <tr>
                                            <th>Weight Capacity </th>
                                            <td>60 LBS</td>
                                        </tr>
                                        <tr>
                                            <th>Width</th>
                                            <td>24″</td>
                                        </tr>
                                        <tr>
                                            <th>Handle height (ground to handle) </th>
                                            <td>37-45″</td>
                                        </tr>
                                        <tr>
                                            <th>Wheels</th>
                                            <td>Aluminum</td>
                                        </tr>
                                        <tr>
                                            <th>Size</th>
                                            <td>S, M, X, XL</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="reviews-wrapper">
                            <div class="row">
                                <div class="col-lg-6 mb--40">
                                    <div class="axil-comment-area pro-desc-commnet-area">
                                        <h5 class="title">Nội dung đánh giá</h5>
                                        <ul class="comment-list">
                                            <div class="tab-content row">
                                                @if (count($productReviews) > -1)
                                                    <div class="review__comment-header">
                                                        <div class="row">
                                                            <div class="col-sm-4 review__comment-header--title">
                                                                Thành viên
                                                            </div>
                                                            <div class="col-sm-8 review__comment-header--title">
                                                                Nội dung đánh giá
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review__comment-list" style="padding-top: 30px;">
                                                        <div class="row">
                                                            @foreach ($productReviews as $productReview)
                                                                <div class="col-sm-4">
                                                                    <span
                                                                        class="review__comment-author">{{ $productReview->user_name }}</span>
                                                                    <div class="review__comment-time">
                                                                        <span>{{ $productReview->created_at }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="review__comment-rating">
                                                                        <x-stars number="{{ $productReview->rating }}" />
                                                                    </div>
                                                                    <div class="review__comment-content">
                                                                        <p>
                                                                            {{ $productReview->content }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 review_comment-line"></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-center review-comment-null">Chưa có đánh giá nào</p>
                                                @endif
                                            </div>
                                        </ul>
                                    </div>
                                    <!-- End .axil-commnet-area -->
                                </div>
                                <!-- End .col -->
                                <div class="col-lg-6 mb--40">
                                    <!-- Start Comment Respond  -->
                                    <form method="POST" action="{{ route('product_review.store', $product->id) }}">
                                        @csrf
                                        @if (!$checkReviewProduct)
                                            <div class="comment-respond pro-des-commend-respond mt--0">
                                                <h5 class="title mb--30">Thêm đánh giá</h5>
                                                <div class="d-flex-center mb--40 form-row">
                                                    <div class="rating">
                                                        <input class="star" type="radio" hidden id="star1"
                                                            name="rating" value="1" />
                                                        <label for="star1" title="Poor" id="icon-star1">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                        <input class="star" type="radio" hidden id="star2"
                                                            name="rating" value="2" />
                                                        <label for="star2" title="Fair" id="icon-star2">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                        <input class="star" type="radio" hidden id="star3"
                                                            name="rating" value="3" />
                                                        <label for="star3" title="Good" id="icon-star3">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                        <input class="star" type="radio" hidden id="star4"
                                                            name="rating" value="4" />
                                                        <label for="star4" title="Very Good" id="icon-star4">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                        <input class="star" type="radio" hidden id="star5"
                                                            name="rating" value="5" />
                                                        <label for="star5" title="Excellent" id="icon-star5">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                    </div>
                                                </div>


                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Đánh giá</label>
                                                                <textarea style="width: 100%;" name="content" rows="7"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-submit">
                                                                <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">Đánh giá</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        @endif
                                    </form>
                                    <!-- End Comment Respond  -->
                                </div>
                                <!-- End .col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- woocommerce-tabs -->
        @vite(['resources/client/js/product-detail.js', 'resources/client/css/product-detail.css', 'resources/client/css/product-review.css'])

    </div>
@endsection
