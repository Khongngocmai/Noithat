@extends('client.layouts.template')

@section('main')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{  asset('client/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Hóa đơn của tôi</h2>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tổng tiền</th>
                            <th>Địa chỉ</th>
                            <th>Mã khuyến mâĩ</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id_donhang }}</td>
                                <td>{{ !is_null($order->id_khuyenmai) ? number_format($order->thanhtien - \App\Models\Voucher::find($order->id_khuyenmai)->giatien,-3,',',',') : number_format($order->thanhtien,-3,',',',') }} VND</td>
                                <td>{{ $order->diachi }}</td>
                                <td>{{ !is_null($order->id_khuyenmai) ? \App\Models\Voucher::find($order->id_khuyenmai)->makhuyenmai : 'Không có' }}
                                <td>
                                    @php
                                        if ($order->tinhtrang == 0) {
                                            echo 'Chờ xác nhận';
                                        } elseif ($order->tinhtrang == 1) {
                                            echo 'Xác nhận';
                                        } elseif ($order->tinhtrang == 2) {
                                            echo 'Hoàn thành';
                                        } else {
                                            echo 'Hủy';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <a href="{{ route('my.order.show', ['id' => $order->id_donhang]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@stop
