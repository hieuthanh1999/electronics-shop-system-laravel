@extends('layouts.client')
@section('content-client')
<style>
    .content-footer {
    text-align: center;
    margin-top: 20px;
}

.btn-link {
    display: inline-block;
    background: #fff;
    padding: 10px 20px;
    border: 1px solid #cccccc;
    font-size: 14px;
    margin:  0 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    outline: none;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-link:hover {
    border: 1px solid #4f5962;
    color: #4f5962;
    text-decoration: none;
}

</style>

<div class="axil-product-area bg-color-white axil-section-gap">

    <!-- Start Header -->

    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--9">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">Đăng nhập cửa hàng</h3>
                    <form action="{{ route('user.login') }}" method="POST" id="login-form__js">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Nhập email">
                            @if ($errors->get('email'))
                              <span id="email-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('email')) }}
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            @if ($errors->get('password'))
                              <span id="password-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('password')) }}
                              </span>
                            @endif                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <a href="{{ route('user.forgot_password_create') }}" class="forgot-btn">Quên mật khẩu?</a>
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng nhập</button>

                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="singin-header-btn">
                                <p>bạn không phải là thành viên?</p>
                            </div>
                            <a href="{{ route('user.register') }}" class="axil-btn btn-bg-secondary sign-up-btn">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container_fullwidth content-page">
    <div class="container">
        <div class="col-md-12 container-page">
            <div class="checkout-page">
              <ol class="checkout-steps">
                <li class="steps active">
                  <h4 class="title-steps text-center">
                    Đăng Nhập
                  </h4>
                  <div class="step-description">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="run-customer">
                          <form action="{{ route('user.login') }}" method="POST" id="login-form__js">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Nhập email">
                              @if ($errors->get('email'))
                                <span id="email-error" class="error invalid-feedback" style="display: block">
                                  {{ implode(", ",$errors->get('email')) }}
                                </span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Mật Khẩu</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                              @if ($errors->get('password'))
                                <span id="password-error" class="error invalid-feedback" style="display: block">
                                  {{ implode(", ",$errors->get('password')) }}
                                </span>
                              @endif
                            </div>
                            <div class="text-center">
                                <button>
                                  Đăng Nhập
                                </button>
                            </div>
                            <div class="content-footer">
                                <a href="{{ route('user.forgot_password_create') }}" class="btn-link">
                                  Quên mật khẩu
                                </a>
                                <a href="{{ route('user.register') }}" class="btn-link">
                                  Đăng kí tài khoản
                                </a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </ol>
            </div>
          </div>
    </div>
</div> --}}
@vite(['resources/common/js/login.js'])
@endsection
