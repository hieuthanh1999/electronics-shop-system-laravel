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
                        <li class="axil-breadcrumb-item active" aria-current="page">Hoá đơn của tôi</li>
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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="axil-dashboard-order">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">Code</th>
                        <th scope="col" class="text-center">Tổng tiền</th>
                        <th scope="col" class="text-center">Ngày thanh toán</th>
                        <th scope="col" class="text-center">Phương thức</th>
                        <th scope="col" class="text-center">Trạng thái</th>
                        <th scope="col" class="text-center">Ghi chú</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    @if (count($orderHistorys) > 0)
                        @foreach ($orderHistorys as $orderHistory)
                        <tr>
                            <td>{{ $orderHistory->id }}</td>
                            <td>{{ format_number_to_money($orderHistory->total_money) }}</td>
                            <td>{{ $orderHistory->created_at }}</td>
                            <td><span class="badge badge-info">{{ $orderHistory->payment_name }}</span></td>
                            <td>
                            @if ($orderHistory->order_status == 0)
                                <span class="badge badge-warning">Chờ xử lý</span>
                            @elseif($orderHistory->order_status == 1)
                                <span class="badge badge-info">Đang giao hàng</span>
                            @elseif($orderHistory->order_status == 2)
                                <span class="badge badge-danger">Đã hủy</span>
                            @elseif($orderHistory->order_status == 3)
                                <span class="badge badge-success">Đã nhận hàng</span>
                            @endif
                            </td>
                            <td>{{ $orderHistory->note }}</td>
                            <td>
                            <div style="padding: 8px; display: flex; justify-content: start;">
                                <a class="btn-a" href="{{ route('order_history.show', $orderHistory->id) }}">Chi tiết</a>
                                @if ($orderHistory->order_status == 0)
                                <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Hủy Đơn</a>
                                @elseif($orderHistory->order_status == 1)
                                <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xác Nhận</a>
                                @elseif($orderHistory->order_status == 2)
                                <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xóa Đơn</a>
                                @elseif($orderHistory->order_status == 3)
                                <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xóa Đơn</a>
                                @endif
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                        <td colspan="7">
                            Không có dữ liệu
                        </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        @if (count($orderHistorys) > 0)
        <div class="text-center">
            <ul class="pagination">
                {{ $orderHistorys->links('vendor.pagination.default') }}
            </ul>
        </div>
        @endif
      </div>
      <div class="clearfix">
      </div>
    </div>
</div>
@vite(['resources/client/css/cart.css'])
@endsection
