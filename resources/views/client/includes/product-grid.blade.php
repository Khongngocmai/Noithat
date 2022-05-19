@if ($products->count() > 0)
    @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{ asset($product->image->first()->url) }}">
                    <ul class="product__item__pic__hover">
                        <li><a href="javascript:void(0)" onclick="addToCart({{ $product->id_sp }});"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="latest-product__item__text">
                    <h6><a style="color:black;" href="{{ route('client.product.detail', ['id' => $product->id_sp]) }}">{{ $product->ten_sp }}</a></h6>
                    @if ($product->giatien != 0)
                        <span>{{ number_format($product->giatien,-3,',',',') }} VND</span>
                    @else
                        <span>{{ number_format($product->giakhuyenmai,-3,',',',') }} VND</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    {!! $products->links() !!}
@else
    <div class="col-lg-4 col-md-6 col-sm-6">
        Không có sản phẩm nào
    </div>
@endif