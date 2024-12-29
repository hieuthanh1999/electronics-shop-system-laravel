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
                        <li class="axil-breadcrumb-item active" aria-current="page">Giỏ hàng</li>
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
<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        @if (count(\Cart::getContent()) <= 0)
            <h3 class="text-center">Giỏ hàng của bạn đang không có sản phẩm nào</h3>
            <div class="text-center" style="padding-top: 50px">
              <a href="{{ route('user.home') }}" class="btn-a">Mua Ngay</a>
            </div>
          @else
        <div class="axil-product-cart-wrap">
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Tên </th>
                            <th scope="col">Màu</th>
                            <th scope="col">Size</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                            <th scope="col">Cập nhật</th>
                            <th scope="col">Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                        {{-- @php
                        dd($cart)
                        @endphp --}}
                        <form action="{{ route('cart.update') }}" method="post">
                          @csrf
                            <input type="text" value="{{ $cart->id }}" hidden name="id">
                            <tr style="text-align: center">
                                <td class="product-thumbnail"><img src="{{ asset("asset/client/images/products/small/" . $cart->attributes->image . "") }}"/></td>
                                <td class=""> {{ $cart->name }}</td>
                                <td class=""> {{ $cart->attributes->color }}</td>
                                <td class="">   {{ $cart->attributes->size }} </td>
                                <td class="" data-title="Price"><span class="currency-symbol"></span>{{ format_number_to_money($cart->price * $cart->quantity) }} VNĐ</td>
                                <td class="product-quantity" data-title="Qty">
                                    <div class="pro-qty">
                                        <input name="quantity" type="number" min="1" value="{{ $cart->quantity }}">
                                    </div>
                                </td>
                                <td class="" data-title="Subtotal"><span class="currency-symbol"></span>{{ format_number_to_money($cart->price) }} VNĐ</td>
                                <td class="" >
                                    <div style="display: flex;
                                    width: 100%;
                                    padding: 0;
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;
                                    margin: 10px;">
                                      <button type="submit" style="margin: 10px; width: 100%"  class="axil-btn">cập nhật</button>

                                    </div>
                                    <td class="">
                                        <a  href="{{ route('cart.delete', $cart->id) }}" class="remove-wishlist"><i class="fal fa-times"></i>
                                        </a>
                                    </td>

                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--80">
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-total">
                                        <td>Thành tiền</td>
                                        <td class="order-total-amount">{{ format_number_to_money(Cart::getTotal()) }} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="axil-btn btn-bg-primary checkout-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@vite(['resources/client/css/cart.css'])
@endsection
