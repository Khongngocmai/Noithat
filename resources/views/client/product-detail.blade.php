@extends('client.layouts.template')

@section('main')
<style>
    .list-inline-rating {
        display: flex;
    }
</style>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{  asset('client/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $product->ten_sp }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <section class="slider" style="display: inline-block; width: 100%">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($product->image as $item)
                                <li data-setbg="{{ asset($item->url) }}">
                                    <img src="{{ asset($item->url) }}"/>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->ten_sp }}</h3>
                    <ul class="list-inline-rating">
                        @for ($count = 1;$count <= 5;$count++)
                            @php
                                if ($count <= $rating) {
                                    $color = 'color:#ffcc00;';
                                } else {
                                    $color = 'color:#ccc;';
                                }
                            @endphp
                            <li id="{{ $product->id_sp }}-{{ $count }}"
                                data-index="{{ $count }}"
                                data-product_id="{{ $product->id_sp }}"
                                data-rating="{{ $rating }}"
                                class="rating"
                                style="cursor:pointer;{{ $color }}font-size:30px">&#9733;</li>
                        @endfor
                    </ul>
                    <div class="product__details__price">{{ number_format($product->giatien != 0 ? $product->giatien : $product->giakhuyenmai,-3,',',',') }} VND</div>
                    <a href="javascript:void(0)" onclick="addToCart({{ $product->id_sp }});" class="primary-btn">THÊM GIỎ HÀNG</a>
                    <ul>
                        <li><b>Danh mục</b> <span>{{ $product->cate_title }}</span></li>
                        <li><b>Nhà cung cấp</b> <span>{{ $product->supplier_title }}</span></li>
                        <li><b>Trạng thái</b> <span>{{ $product->soluong > 0 ? 'Còn hàng' : 'Hết hàng' }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Mô tả sản phẩm</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p>{!! $product->mota !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{  asset($product->image->first()->url) }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="javascript:void(0)" onclick="addToCart({{ $product->id_sp }});"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('client.product.detail', ['id' => $product->id_sp]) }}">{{ $product->ten_sp }}</a></h6>
                            @if ($product->giatien != 0)
                                <h5>{{ number_format($product->giatien,-3,',',',') }} VND</h5>
                            @else
                                <h5>{{ number_format($product->giakhuyenmai,-3,',',',') }} VND</h5>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@stop