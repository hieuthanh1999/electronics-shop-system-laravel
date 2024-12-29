@extends('layouts.client')
@section('content-client')
<style>
    .order-payment-method .axil-order-summery.order-checkout-summery .order-payment-method .single-payment .input-group input[type=radio]:checked~label::before {
    background-color: var(--color-primary) !important;
    }
</style>
<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <form action="{{ route('checkout.index') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">Billing details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Họ và tên <span>*</span></label>
                                    <input type="text" class="form-control" disabled value="{{ $fullName }}" id="name" name="name" placeholder="Nhập họ và tên">
                                    @if ($errors->get('name'))
                                      <span id="name-error" class="error invalid-feedback" style="display: block">
                                        {{ implode(", ",$errors->get('name')) }}
                                      </span>
                                    @endif                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email <span>*</span></label>
                                    <input type="text" class="form-control" disabled value="{{ $email }}" id="email" name="email" placeholder="Nhập địa chỉ email">
                                    @if ($errors->get('email'))
                                      <span id="email-error" class="error invalid-feedback" style="display: block">
                                        {{ implode(", ",$errors->get('email')) }}
                                      </span>
                                    @endif                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" disabled value="{{ $phoneNumber }}" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại">
                            @if ($errors->get('phone_number'))
                              <span id="phone_number-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('phone_number')) }}
                              </span>
                            @endif                        </div>
                        <div class="form-group">
                            <label>Tỉnh/Thành phố <span>*</span></label>
                            <select class="form-control form-select" disabled id="city" name="city">
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
                            <label>Quận/Huyện <span>*</span></label>
                            <select class="form-control form-select" id="district" disabled name="district">
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
                            <label>Xã <span>*</span></label>
                            <select class="form-control form-select" id="ward" disabled name="ward">
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
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" disabled value="{{ $apartment_number}}" id="apartment_number" name="apartment_number" aria-describedby="emailHelp" placeholder="Nhập địa chỉ nhà">
                            @if ($errors->get('apartment_number'))
                              <span id="apartment_number-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('apartment_number')) }}
                              </span>
                            @endif                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                    <tr class="order-product">
                                        <td>{{ $cart->name }} <span class="quantity">x{{ $cart->quantity }}</span></td>
                                        <td>{{ format_number_to_money($cart->price) }} VNĐ</td>
                                    </tr>
                                    @endforeach

                                    <tr class="order-total">
                                        <td>Tổng tiền</td>
                                        <td class="order-total-amount">{{ format_number_to_money(Cart::getTotal()) }} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            @if ($errors->get('payment_method'))
                                <span id="payment_method-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('payment_method')) }}
                                </span>
                            @endif
                            @foreach ($payments as $payment)
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input
                                        type="radio"
                                        value="{{ $payment->id }}"
                                        name="payment_method"
                                        id="{{ $payment->id }}"
                                        @if ($loop->first) checked @endif>
                                    <label for="{{ $payment->id }}">{{ $payment->name }}</label>
                                    <img style="width: 60px" src="{{ asset("asset/imgs/$payment->img") }}" alt="{{ $payment->name }} payment">
                                </div>
                            </div>
                        @endforeach


                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Thanh Toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@vite(['resources/client/js/checkout.js', 'resources/client/css/checkout.css'])


@endsection
