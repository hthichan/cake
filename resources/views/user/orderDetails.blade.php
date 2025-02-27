@extends('user.index')

@section('menu')
    <div class="col-lg-4 col-12">
        <ul class="my-account-tab-list nav">
            <li><a href="#items" class="active"><i class="dlicon files_notebook"></i> Lịch sử mua hàng</a></li>
        </ul>
    </div>
@stop()
@section('content')
    <!-- Single Tab Content Start -->
    <div id="orders">
        <div class="myaccount-content order">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên hàng</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $price = 0;
                        @endphp
                        @foreach ($orderDetails as $item)
                            <tr>
                                <td>{{$item->product->prodName}}</td>
                                <td>
                                    <img src="uploads/product/{{$item->product->image->url}}" alt="" width="40" height="40">
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                @php
                                    $price += $item->price;
                                @endphp
                            </tr>
                        @endforeach
                        @if (isset($orderDetails))
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Tổng tiền: </td>
                                <td>
                                    {{ $price }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <a href="{{route('user.order')}}">Quay về</a>
        </div>
    </div>
    <!-- Single Tab Content End -->

@stop()