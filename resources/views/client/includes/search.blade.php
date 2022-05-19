<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('client.product.category',['category' => $category->id_dmsp]) }}">{{ $category->ten_dmsp }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <form class="form-inline" action="{{ route('client.search.product') }}" method="GET">
                        <input type="text" placeholder="Tìm kiếm sản phẩm ..." name="q" class="form-control">
                        <select class="form-control ml-2 mr-2" name="category">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_dmsp }}">{{ $category->ten_dmsp }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-2" name="price">
                            <option value="">Tất cả mức giá</option>
                            <option value="0">0 - 3,000,000đ</option>
                            <option value="1">3,100,000đ - 4,000,000đ</option>
                            <option value="2">4,100,000đ - 4,500,000đ</option>
                            <option value="3">4,600,000đ - 5,000,000đ</option>
                            <option value="4">5,100,000đ - 8,000,000đ</option>
                            <option value="5">Trên 8,000,000đ</option>
                        </select>
                        <button type="submit" class="btn btn-success">TÌM KIẾM</button>
                    </form>
                </div>
                <div class="hero__item set-bg" data-setbg="{{  asset('client/img/hero/banner.jpg') }}">
                    <div class="hero__text">
                        <div class="hero__text">
                            <a href="{{ route('client.product') }}" class="primary-btn">MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->