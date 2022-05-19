<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>TRE VIỆT NAM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Font Awaesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset("client/js/FlexSlider2/css/flexslider.css") }}" />
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @yield('css')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> tre@gmail.com</li>
                                <li>Miễn phí ship với hóa đơn từ 500.000 VND</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            @if (!Auth::check())
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.show.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>

                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.show.register') }}">| Đăng ký</a>
                                </div>
                            @else
                                <div class="header__top__right__auth">
                                    <a href="{{ route('my.order') }}">Xin chào, {{ Auth::user()->hoten }}</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.change.account') }}">| Cập nhật tài khoản</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.logout') }}">| Đăng xuất</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" width="120" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href={{ route('client.home') }}>Trang chủ</a></li>
                            <li><a href={{ route('client.product') }}>Sản phẩm</a></li>
                            <li><a href={{ route('client.introduce') }}>Giới thiệu</a></li>
                            <li><a href={{ route('client.contact') }}>Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('client.shopping.cart') }}"><i class="fa fa-shopping-bag"></i> <span id="qty_cart">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span></a></li>
                        </ul>
                        @php
                            use App\Models\Cart;
                            $oldCart = Session::get('cart');
                            $cart = new Cart($oldCart);
                            $total = 0;
                            if (!empty($cart->items))
                                foreach ($cart->items as $row) {
                                    if ($row['item']['giatien'] != 0)
                                        $total+=$row['item']['giatien'] * $row['qty'];
                                    else
                                        $total+=$row['item']['giakhuyenmai'] * $row['qty'];
                                }
                        @endphp
                        <div class="header__cart__price">Tổng: <span id="price_cart">{{ Session::has('cart') ? number_format($total,-3,',',',') : 0 }} VND</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('main')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Hà Nội</li>
                            <li>Số điện thoại: +01 23.456.789</li>
                            <li>Email: tre@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__payment"><img src="{{ asset('client/img/payment-item.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('client/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="{{ asset('client/js/add-to-cart.js') }}"></script>
    <script src="{{ asset('client/js/filter.js') }}"></script>
    <script src="{{ asset('client/js/sort.js') }}"></script>
    <script src="{{ asset('client/js/voucher.js') }}"></script>
    <script src="{{ asset('client/js/rating.js') }}"></script>
    <script type='text/javascript' src='{{ asset("client/js/FlexSlider2/js/jquery.flexslider.js") }}'></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: true,
                directionNav: true
            });
        });
    </script>
    <script src="{{ asset('client/ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('content')</script>
</body>

</html>
