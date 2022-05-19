@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

@if(Session::has('invalid'))
    <div class="alert alert-danger alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('invalid')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success')}}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Giá khuyến mãi</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Giá khuyến mãi</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $count }}</td>
                            <td><img src="{{ asset($product->image->first()->url) }}" width=60px ></td>
                            <td>{{ $product->ten_sp }}</td>
                            <td>
                                @php
                                    if ($product->giatien != 0) {
                                        echo number_format($product->giatien,-3,',',',') . ' VND';
                                    } else {
                                        echo 'N/A';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if ($product->giakhuyenmai != 0) {
                                        echo number_format($product->giakhuyenmai,-3,',',',') . ' VND';
                                    } else {
                                        echo 'N/A';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if (!is_null($product->thoigianbatdau)) {
                                        echo date('d/m/Y', strtotime($product->thoigianbatdau));
                                    } else {
                                        echo 'N/A';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if (!is_null($product->thoigianketthuc)) {
                                        echo date('d/m/Y', strtotime($product->thoigianketthuc));
                                    } else {
                                        echo 'N/A';
                                    }
                                @endphp
                            </td>
                            <td>{{ $product->cate_title }}</td>
                            <td>{{ $product->soluong }}</td>
                            <th>{{ $product->tinhtrang == 1 ? 'Hiện' : 'Ẩn' }}</th>
                            <td>
                                <a href="{{ route('product.delete',['id' => $product->id_sp]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa item này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('product.edit.form',['id' => $product->id_sp]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @if ($product->tinhtrang == 1)
                                    <a href="{{ route('product.update.status',['id' => $product->id_sp, 'status' => 0]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn ẩn sản phẩm này ?')">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                @else
                                    <a href="{{ route('product.update.status',['id' => $product->id_sp, 'status' => 1]) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
