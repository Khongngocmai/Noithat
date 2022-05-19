<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Order;
use App\Models\User;

class OrderExport implements FromCollection,WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $startDate = $this->data['start_date'];
        $endDate = $this->data['end_date'];
        $status = $this->data['status'];
        if ($status == -1) {
            $orders = Order::whereBetween('updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->get();
        } else {
            $orders = Order::whereBetween('updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->where('tinhtrang', $status)
            ->get();
        }
        foreach ($orders as $order) {
            $order->user = User::find($order['id_nguoidung'])->hoten;
            $order->total = number_format($order['thanhtien'],-3,',',',') . ' VND';
            $order->voucher = !is_null($order['id_khuyenmai']) ? $order['id_khuyenmai'] : 'Không có';
            $order->start_date = date('d/m/Y H:i:s',strtotime($order['created_at']));
            if ($order->tinhtrang === 0) {
                $status = 'Chờ xác nhận';
            } elseif ($order->tinhtrang === 1) {
                $status = 'Xác nhận';
            } elseif ($order->tinhtrang === 2) {
                $status = 'Hoàn thành';
            } else {
                $status = 'Hủy';
            }

            $order->status_order = $status;
            unset($order['id_nguoidung'], $order['created_at'], $order['updated_at'], $order['tinhtrang'],$order['id_khuyenmai']);
        }
        return $orders;
    }

    public function headings():array
    {
        return [
            'Mã đơn hàng',
            'Địa chỉ',
            'Thành tiền',
            'Khách hàng',
            'Thành tiền',
            'Mã khuyến mãi',
            'Ngày đặt hàng',
            'Trạng thái'
        ];
    }
}
