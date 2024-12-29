@extends('layouts.client')
@section('content-client')
<style>
    .form-select{
        font-size: 14px;
    }
    .axil-signin-form{
        max-width: 100%;
    }
</style>
<div class="axil-product-area bg-color-white axil-section-gap">

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-23">
            <div class="">
                <div class="axil-signin-form">
                    <h3 class="title">Đăng ký</h3>
                    <p class="b2 mb--55">hãy đăng ký 1 tài khoản cho riêng mình.</p>
                    <div id="form-data" hidden data-rules="{{ json_encode($rules) }}"
                    data-messages="{{ json_encode($messages) }}"></div>
                    <form action="{{ route('user.register') }}" method="POST" id="form__js">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Và Tên</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" aria-describedby="emailHelp" placeholder="Nhập họ và tên">
                                {{-- khi người dùng gửi dữ lên server. server kiểm tra nếu có lỗi sẽ trả về và hiển thị ra cho người dùng --}}
                                @if ($errors->get('name'))
                                    <span id="name-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('name')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email">
                                @if ($errors->get('email'))
                                <span id="email-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('email')) }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" class="form-control" value="{{ old('password') }}" id="password" name="password" placeholder="Nhập mật khẩu">
                                @if ($errors->get('password'))
                                <span id="password-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('password')) }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Xác Nhận Mật Khẩu</label>
                                <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="password_confirm" name="password_confirm" placeholder="Xác nhận mật khẩu">
                                @if ($errors->get('password_confirm'))
                                    <span id="password_confirm-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('password_confirm')) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Điện Thoại</label>
                                <input type="text" class="form-control" value="{{ old('phone_number') }}" id="phone_number" name="phone_number" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
                                @if ($errors->get('phone_number'))
                                    <span id="phone_number-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('phone_number')) }}
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh, Thành Phố</label>
                                <select class="form-control form-select" id="city" name="city">
                                @foreach ($citys as $city)
                                    <option value="{{ $city['ProvinceID'] }}"
                                    @if ( $city['ProvinceID'] == old('city'))
                                        selected
                                    @endif
                                    >{{ $city['NameExtension'][1] }}</option>
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
                                    @foreach ($districts as $district)
                                        <option value="{{ $district['DistrictID'] }}"
                                        @if ( $district['DistrictID'] == old('district'))
                                            selected
                                        @endif
                                        >{{ $district['DistrictName'] }}</option>
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
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward['WardCode'] }}"
                                    @if ( $ward['WardCode'] == old('ward'))
                                        selected
                                    @endif
                                    >{{ $ward['WardName'] }}</option>
                                @endforeach
                                </select>
                                @if ($errors->get('ward'))
                                <span id="ward-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('ward')) }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 35px;">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa Chỉ Nhà</label>
                                <input type="text" class="form-control" value="{{ old('apartment_number') }}" id="apartment_number" name="apartment_number" aria-describedby="emailHelp" placeholder="Nhập địa chỉ nhà">
                                @if ($errors->get('apartment_number'))
                                  <span id="apartment_number-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('apartment_number')) }}
                                  </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row" style="margin-top: 35px;">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="singin-header-btn" style="margin-top: 35px;">
                        <p>Bạn đã có tài khoản?</p>
                        <a href="{{ route('user.login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/client/js/register.js'])
@endsection
