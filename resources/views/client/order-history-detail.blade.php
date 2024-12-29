@extends('layouts.client')
@section('content-client')
<style>
  .a-hover:hover{
    color:black !important;
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
                        <li class="axil-breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
<div class="axil-dashboard-area axil-section-gap">
    <div class="container shopping-cart">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title">
            Hoá đơn số {{ $order->id }}
          </h3>
          <div class="axil-dashboard-order">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 100px;">Mã</th>
                        <th scope="col" class="text-center">Tên SP</th>
                        <th scope="col" class="text-center">Ảnh</th>
                        <th scope="col" class="text-center">Màu</th>
                        <th scope="col" class="text-center">Size</th>
                        <th scope="col" class="text-center">Số lượng</th>
                        <th scope="col" class="text-center">Giá</th>
                        <th scope="col" class="text-center">Tổng giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $totalProductMoney = 0;?>
                    @foreach ($order_details as $order_detail)
                        <?php $totalProductMoney +=  $order_detail->unit_price *  $order_detail->quantity;?>
                        <tr>
                            <td>{{ $order_detail->product_id }}</td>
                            <td>
                            <a href="{{ route('user.products_detail', $order_detail->product_id) }}">{{ $order_detail->product_name }}</a>
                            </td>
                            <td class="text-center">
                            <img style="width: 70px; height:auto; object-fit: cover;" src="{{ asset("asset/client/images/products/small/$order_detail->product_img") }}" alt="">
                            </td>
                            <td>{{ $order_detail->color_name }}</td>
                            <td>{{ $order_detail->size_name }}</td>
                            <td>{{ $order_detail->quantity }}</td>
                            <td>{{ format_number_to_money($order_detail->unit_price) }}</td>
                            <td>{{ format_number_to_money($order_detail->unit_price *  $order_detail->quantity) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="7">Tổng tiền</td>
                        <td style="font-weight: 600;">{{ format_number_to_money($totalProductMoney) }} VND</td>
                    </tr>
                    <tr>
                        <td colspan="7">Chi phí vận chuyển</td>
                        <td style="font-weight: 600;">{{ format_number_to_money($infomationUser->orders_transport_fee) }} VND</td>
                    </tr>
                    <tr>
                        <td colspan="7">Phương thức thanh toán</td>
                        <td>
                            <span class="badge badge-info">{{ $infomationUser->payment_name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">Thành tiền</td>
                        <td style="font-weight: 600;"   >
                            {{ format_number_to_money($order->total_money) }} VND
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
</div>
@vite(['resources/client/css/cart.css'])
@endsection
