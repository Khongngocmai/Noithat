@extends('client.layouts.template')

@section('main')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{  asset('client/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('client.home') }}">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible mt-2">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
                @endif
                @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible mt-2">
                            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{Session::get('success')}}
                        </div>
                @endif
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th width="200">Đơn giá</th>
                                <th>Số lượng</th>
                                <th width="350">Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use App\Models\Cart;
                                $oldCart = Session::get('cart');
                                $cart = new Cart($oldCart);
                                $total = 0;
                            @endphp
                            @if (!empty($cart->items))
                                @foreach ($cart->items as $row)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{  asset($row['item']->image->first()->url) }}" alt="{{ $row['item']['ten_sp'] }}" width="100">
                                            <h5 style="font-size:16px !important;">{{ $row['item']['ten_sp'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            @if ($row['item']['giatien'] != 0)
                                                {{ number_format($row['item']['giatien'],-3,',',',') }} VND
                                            @else
                                                {{ number_format($row['item']['giakhuyenmai'],-3,',',',') }} VND
                                            @endif
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <a href="{{ route('decrease.item', ['id' => $row['item']['id_sp']]) }}"><span class="dec qtybtn">-</span></a>
                                                    <input type="text" value="{{ $row['qty'] }}" readonly>
                                                    <a href="{{ route('increase.item', ['id' => $row['item']['id_sp']]) }}"><span class="inc qtybtn">+</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            @if ($row['item']['giatien'] != 0)
                                                @php $total+=$row['item']['giatien'] * $row['qty']; @endphp
                                                {{ number_format($row['item']['giatien'] * $row['qty'],-3,',',',') }} VND
                                            @else
                                                @php $total+=$row['item']['giakhuyenmai'] * $row['qty']; @endphp
                                                {{ number_format($row['item']['giakhuyenmai'] * $row['qty'],-3,',',',') }} VND
                                            @endif
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('delete.item', ['id' => $row['item']['id_sp']]) }}"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">Chưa có sản phẩm</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('client.home') }}" class="primary-btn cart-btn">TIẾP TỤC MUA HÀNG</a>
                </div>
            </div>
            @if (!empty($cart->items))
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Giỏ hàng</h5>
                        <ul>
                            <li>Tổng tiền <span>{{ number_format($total,-3,',',',') }} VND</span></li>
                        </ul>
                        @if (Auth::check())
                            <a href="{{ route('client.checkout') }}" class="primary-btn">THANH TOÁN</a>
                        @else
                            <a href="{{ route('auth.show.login') }}" class="primary-btn">VUI LÒNG ĐĂNG NHẬP</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@stop
