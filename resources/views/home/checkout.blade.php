@extends('master.main')

@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Thanh toán</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{route('home')}}">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Start -->
    <div class="shop-product-section section section-padding-03">
        <div class="container custom-container">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row g-8">

                    <div class="col-lg-7">

                        <!-- Billing Address -->
                        <div id="billing-form">
                            <h4 class="mb-4">Thông tin nhận hàng</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col-sm-12">
                                    <label>Họ Tên</label>
                                    <input name="name" class="form-field" type="text" value="{{ auth()->guard('customer')->user()->name }}">
                                    @error('name')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-12">
                                    <label>Địa chỉ giao hàng</label>
                                    <input name="shipping_address" class="form-field" type="text" value="{{ auth()->guard('customer')->user()->address }}">
                                    @error('shipping_address')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>

                        </div>

                        

                    </div>

                    <div class="col-lg-5">

                        <!-- Checkout Summary Start -->
                        <div class="checkout-box">

                            <h4 class="mb-4">Tổng số hàng</h4>

                            <table class="checkout-summary-table table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $quantity = 0;
                                    @endphp
                                    @foreach ($user_cart->items as $item)
                                        @php
                                            $price = $item->product->price * $item->quantity;
                                            $total += $price;
                                            $quantity += $item->quantity
                                        @endphp
                                        <tr>
                                            <td>{{$item->product->prodName}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->product->price}}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="border-top">Tổng</th>
                                        <th class="border-top">{{$quantity}}</th>
                                        <th class="border-top">{{$total}}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- Checkout Summary End -->

                        <!-- Payment Method Start -->
                        <div class="checkout-box">
                            @if($quantity !== 0) 
                                <h4 class="mb-4">Phương thức thanh toán</h4>
    
                                <div class="checkout-payment-method">
    
                                    <div class="single-method form-check">
                                        <input class="form-check-input" type="radio" id="payment_method" name="payment_method" value="tiền mặt" checked>
                                        <label class="form-check-label" for="payment_method">Thanh toán bằng tiền mặt</label>
                                        <p>Vui lòng thanh toán sau khi nhận hàng</p>
                                    </div>
                                </div>
    
                                <button class="btn btn-dark btn-primary-hover rounded-0 mt-6">Đặt hàng</button>
                            @else
                                <h4 class="mb-4">Bạn chưa có sản phẩm nào trong giỏ hàng</h4>
                                <a href="{{route('shop.index')}}" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Tới mua hàng</a>
                            @endif
                        </div>
                        <!-- Payment Method End -->

                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Product Section End -->

@stop()