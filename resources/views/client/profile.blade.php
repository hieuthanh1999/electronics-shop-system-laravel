@extends('layouts.client')
@section('content-client')
<style>
    .axil-dashboard-order .table tbody .view-btn{
        display: flex;
        align-items: center;
    }
</style>
{{-- <div class="container_fullwidth">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <ol class="checkout-steps">
            <li class="steps active">
              <h4 class="title-steps">
                Thông Tin Cá Nhân
              </h4>
              <div class="step-description">
                <div class="your-details row">
                  <form action="{{ route('profile.change_profile') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputPassword1">Họ Và Tên</label>
                      <input type="text" class="form-control" value="{{ $fullName }}" id="name" name="name" placeholder="Nhập họ và tên">
                      @if ($errors->get('name'))
                        <span id="name-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('name')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" value="{{ $email }}" id="email" name="email" placeholder="Nhập địa chỉ email">
                      @if ($errors->get('email'))
                        <span id="email-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('email')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Số điện thoại</label>
                      <input type="text" class="form-control" value="{{ $phoneNumber }}" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại">
                      @if ($errors->get('phone_number'))
                        <span id="phone_number-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('phone_number')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tỉnh, Thành Phố</label>
                      <select class="form-control form-select" id="city" name="city">
                        @foreach ($citys as $item)
                            <option value="{{ $item['ProvinceID'] }}"
                            @if ( $item['ProvinceID'] == $city)
                                selected
                            @endif
                            >{{ $item['NameExtension'][1] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('city'))
                        <span id="city-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('city')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Quận, Huyện</label>
                      <select class="form-control form-select" id="district" name="district">
                        @foreach ($districts as $item)
                            <option value="{{ $item['DistrictID'] }}"
                            @if ( $item['DistrictID'] == $district)
                                selected
                            @endif
                            >{{ $item['DistrictName'] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('district'))
                        <span id="district-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('district')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phường Xã</label>
                      <select class="form-control form-select" id="ward" name="ward">
                        @foreach ($wards as $item)
                            <option value="{{ $item['WardCode'] }}"
                            @if ( $item['WardCode'] == $ward)
                              selected
                            @endif
                            >{{ $item['WardName'] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('ward'))
                        <span id="ward-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('ward')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa Chỉ Nhà</label>
                      <input type="text" class="form-control" value="{{ $apartment_number}}" id="apartment_number" name="apartment_number" aria-describedby="emailHelp" placeholder="Nhập địa chỉ nhà">
                      @if ($errors->get('apartment_number'))
                        <span id="apartment_number-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('apartment_number')) }}
                        </span>
                      @endif
                    </div>
                    <div style="padding-top: 5px;" class="text-center">
                      <button>Xác nhận</button>
                    </div>
                  </form>
                </div>
              </div>
            </li>
          </ol>
        </div>
        <div class="col-md-5">
          <div>
              <ol class="checkout-steps">
                <li class="steps active">
                  <h4 class="title-steps">
                    Đổi Mật Khẩu
                  </h4>
                  <div class="step-description">
                    <form action="{{ route('profile.change_password') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mật Khẩu Hiện Tại</label>
                        <input type="password" class="form-control" value="{{ old('current_password') }}" id="current_password" name="current_password" aria-describedby="emailHelp" placeholder="Nhập mật khẩu hiện tại">
                        @if ($errors->get('current_password'))
                          <span id="current_password-error" class="error invalid-feedback" style="display: block">
                            {{ implode(", ",$errors->get('current_password')) }}
                          </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" value="{{ old('new_password') }}" id="new_password" name="new_password" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới">
                        @if ($errors->get('new_password'))
                          <span id="new_password-error" class="error invalid-feedback" style="display: block">
                            {{ implode(", ",$errors->get('new_password')) }}
                          </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Xác Nhận Mật Khẩu Mới</label>
                        <input type="password" class="form-control" value="{{ old('confirm_password') }}" id="confirm_password" name="confirm_password" aria-describedby="emailHelp" placeholder="Xác nhận mật khẩu mới">
                        @if ($errors->get('confirm_password'))
                          <span id="confirm_password-error" class="error invalid-feedback" style="display: block">
                            {{ implode(", ",$errors->get('confirm_password')) }}
                          </span>
                        @endif
                      </div>
                      <div style="padding-top: 5px;" class="text-center">
                        <button>Xác nhận</button>
                      </div>
                    </div>
                    </form>
                    <div class="your-details row">
                  </div>
                </li>
              </ol>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
  </div>
@vite(['resources/client/css/checkout.css', 'resources/client/js/profile.js']) --}}
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="/">Trang chủ</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Tài khoản</li>
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
        @if (Auth::check())
        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">

                            <div class="media-body">
                                <h5 class="title mb-0"> Xin chào, {{ Auth::user()->name }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Tài khoản</a>
                                        {{-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a> --}}
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-change-pass" role="tab" aria-selected="false"><i class="fas fa-lock"></i> <!-- Lock icon -->
                                        Thay đổi mật khẩu</a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade  show active" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form action="{{ route('profile.change_profile') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Tên</label>
                                                            <input type="text" class="form-control" value="{{ $fullName }}" id="name" name="name" placeholder="Nhập họ và tên">
                                                            @if ($errors->get('name'))
                                                              <span id="name-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('name')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Email</label>
                                                            <input type="text" class="form-control" value="{{ $email }}" id="email" name="email" placeholder="Nhập địa chỉ email">
                                                            @if ($errors->get('email'))
                                                              <span id="email-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('email')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Số điện thoại</label>
                                                            <input type="text" class="form-control" value="{{ $phoneNumber }}" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại">
                                                            @if ($errors->get('phone_number'))
                                                              <span id="phone_number-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('phone_number')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Thành phố</label>
                                                            <select class="form-control form-select select2" id="city" name="city">
                                                              @foreach ($citys as $item)
                                                                  <option value="{{ $item['ProvinceID'] }}"
                                                                  @if ( $item['ProvinceID'] == $city)
                                                                      selected
                                                                  @endif
                                                                  >{{ $item['NameExtension'][1] }}</option>
                                                              @endforeach
                                                            </select>
                                                            @if ($errors->get('city'))
                                                              <span id="city-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('city')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Quận/Huyện</label>
                                                            <select class="form-control form-select select2" id="district" name="district">
                                                              @foreach ($districts as $item)
                                                                  <option value="{{ $item['DistrictID'] }}"
                                                                  @if ( $item['DistrictID'] == $district)
                                                                      selected
                                                                  @endif
                                                                  >{{ $item['DistrictName'] }}</option>
                                                              @endforeach
                                                            </select>
                                                            @if ($errors->get('district'))
                                                              <span id="district-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('district')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Xã</label>
                                                            <select class="form-control form-select select2" id="ward" name="ward">
                                                              @foreach ($wards as $item)
                                                                  <option value="{{ $item['WardCode'] }}"
                                                                  @if ( $item['WardCode'] == $ward)
                                                                    selected
                                                                  @endif
                                                                  >{{ $item['WardName'] }}</option>
                                                              @endforeach
                                                            </select>
                                                            @if ($errors->get('ward'))
                                                              <span id="ward-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('ward')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                                            <input type="text" class="form-control" value="{{ $apartment_number}}" id="apartment_number" name="apartment_number" aria-describedby="emailHelp" placeholder="Nhập địa chỉ nhà">
                                                            @if ($errors->get('apartment_number'))
                                                                <span id="apartment_number-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('apartment_number')) }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group mb--0">
                                                            <input type="submit" class="axil-btn" value="Cập nhật">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-change-pass" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form action="{{ route('profile.change_password') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="title">Thay đổi mật khẩu</h5>
                                                        <div class="form-group">
                                                            <label>Mật khẩu hiện tại</label>
                                                            <input type="password" class="form-control" value="{{ old('current_password') }}" id="current_password" name="current_password" aria-describedby="emailHelp" placeholder="Nhập mật khẩu hiện tại">
                                                            @if ($errors->get('current_password'))
                                                              <span id="current_password-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('current_password')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mật khẩu mới</label>
                                                            <input type="password" class="form-control" value="{{ old('new_password') }}" id="new_password" name="new_password" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới">
                                                            @if ($errors->get('new_password'))
                                                              <span id="new_password-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('new_password')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Xác nhận mật khẩu mới</label>
                                                            <input type="password" class="form-control" value="{{ old('confirm_password') }}" id="confirm_password" name="confirm_password" aria-describedby="emailHelp" placeholder="Xác nhận mật khẩu mới">
                                                            @if ($errors->get('confirm_password'))
                                                              <span id="confirm_password-error" class="error invalid-feedback" style="display: block">
                                                                {{ implode(", ",$errors->get('confirm_password')) }}
                                                              </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb--0">
                                                            <input type="submit" class="axil-btn" value="Cập nhật">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Payment</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($orderHistorys) > 0)
                                                    @foreach ($orderHistorys as $orderHistory)

                                                    <tr>
                                                        <th scope="row">#{{ $orderHistory->id }}</th>
                                                        <td>{{ $orderHistory->created_at }}</td>
                                                        <td><span>{{ $orderHistory->payment_name }}</span></td>
                                                        <td>
                                                            @if ($orderHistory->order_status == 0)
                                                                <span class="">Chờ xử lý</span>
                                                            @elseif($orderHistory->order_status == 1)
                                                                <span class="">Đang giao hàng</span>
                                                            @elseif($orderHistory->order_status == 2)
                                                                <span class="">Đã hủy</span>
                                                            @elseif($orderHistory->order_status == 3)
                                                                <span class="">Đã nhận hàng</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ format_number_to_money($orderHistory->total_money) }} VNĐ</td>
                                                        <td style="padding: 8px; display: flex; justify-content: start;">
                                                            <a class="axil-btn view-btn" href="{{ route('order_history.show', $orderHistory->id) }}">View</a>

                                                            @if ($orderHistory->order_status == 0)
                                                                <a class="axil-btn view-btn" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Hủy Đơn</a>
                                                            @elseif($orderHistory->order_status == 1)
                                                                <a class="axil-btn view-btn" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xác Nhận</a>
                                                            @elseif($orderHistory->order_status == 2)
                                                            <a class="axil-btn view-btn" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xóa Đơn</a>
                                                            @elseif($orderHistory->order_status == 3)
                                                                <a class="axil-btn view-btn" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xóa Đơn</a>
                                                            @endif


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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- End My Account Area  -->
        @vite(['resources/client/css/checkout.css', 'resources/client/js/profile.js'])
@endsection
