@extends('client.layouts.template')

@section('main')
<!-- Contact Form Begin -->
<div class="contact-form spad">
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
            </div>
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TRANG LIÊN HỆ</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('post.contact') }}" method="POST">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Họ tên" style="margin-bottom: 10px;" name="name" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="email" placeholder="Email" style="margin-bottom: 10px;" name="email" required>
                </div>
            </div>
            <div class="row justify-content-md-center mb-3">
                <div class="col-lg-6 col-md-6">
                    <textarea placeholder="Nhập nội dung của bạn" name="content" id="content"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Gửi</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
<!-- Contact Form End -->
@stop