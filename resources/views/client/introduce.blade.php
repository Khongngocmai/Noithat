@extends('client.layouts.template')

@section('main')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{  asset('client/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giới thiệu</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p style="font-size: 2rem;line-height:1.5;text-align:justify;">
                    <b>Tre Việt Nam</b> là một website chuyên cung cấp các sản phẩm làm bằng tre lớn nhất Việt Nam. Với mong muốn mang tới cho mọi gia đình những sản phẩm tiện nghi và chất lượng cao.
                </p>
                <p style="font-size: 2rem;line-height:1.5;text-align:justify;">
                    Thông tin liên hệ
                </p>
                <p style="font-size: 1.3rem;line-height:1.5;text-align:justify;">
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: Hà Nội
                    <br>
                    <i class="fa fa-phone" aria-hidden="true"></i> Số điện thoại: +01 23.456.789
                    <br>
                    <i class="fa fa-envelope" aria-hidden="true"></i> Email: tre@gmail.com
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@stop