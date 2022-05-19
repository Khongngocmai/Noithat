<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Mã khuyến mãi</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Mã khuyến mãi</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($orders as $row)
                        <tr>
                            <td>{{ $row->id_donhang }}</td>
                            <td>{{ \App\Models\User::find($row->id_nguoidung)->hoten }}</td>
                            <td>{{ !is_null($row->id_khuyenmai) ? number_format($row->thanhtien - \App\Models\Voucher::find($row->id_khuyenmai)->giatien,-3,',',',') : number_format($row->thanhtien,-3,',',',') }} VND</td>
                            <td>{{ !is_null($row->id_khuyenmai) ? \App\Models\Voucher::find($row->id_khuyenmai)->makhuyenmai : 'Không có' }}
                            </td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($row->created_at)) }}</td>
                            <td>
                                @if ($row->tinhtrang === 0)
                                    {{ 'Chờ xác nhận' }}
                                @elseif ($row->tinhtrang === 1)
                                    {{ 'Xác nhận' }}
                                @elseif ($row->tinhtrang === 2)
                                    {{ 'Hoàn thành' }}
                                @elseif ($row->tinhtrang === 3)
                                    {{ 'Hủy' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
