<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function shopping_cart() {
        return view('client.shopping-cart');
    }

    public function checkout() {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $row) {
            $product = Product::find($row['item']['id_sp']);
            if ($product->soluong < $row['qty']) {
                return redirect()->back()->with('invalid', 'Sản phẩm '. $product->ten_sp . ' chỉ còn ' . $product->soluong . ' cái, không đủ để mua');
            }
        }
        return view('client.checkout');
    }

    /**
     * Pay
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request){
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        try {
            if (isset($request->voucher)) {
                $voucher = Voucher::where('makhuyenmai',$request->voucher)->first();
                Voucher::where('makhuyenmai',$request->voucher)->update(['soluong' => $voucher->soluong -1]);
                $order = Order::create([
                    'id_donhang'      => 'order_' . random_int(100000, 999999),
                    'id_nguoidung' => Auth::user()->id_nguoidung,
                    'thanhtien'   => $request->total,
                    'diachi' => $request->address,
                    'id_khuyenmai' => $voucher->id_khuyenmai
                ]);
            } else {
                $order = Order::create([
                    'id_donhang'      => 'order_' . random_int(100000, 999999),
                    'id_nguoidung' => Auth::user()->id_nguoidung,
                    'thanhtien'   => $request->total,
                    'diachi' => $request->address
                ]);
            }
            foreach($cart->items as $row){
                OrderDetail::create([
                    'id_sp' => $row['item']['id_sp'],
                    'dongia' => $row['price'],
                    'soluong' => $row['qty'],
                    'id_donhang' => $order->id_donhang
                ]);
                $product = Product::find($row['item']['id_sp']);
                Product::where('id_sp',$row['item']['id_sp'])->update(['soluong' => $product['soluong'] - $row['qty']]);
                Product::where('id_sp',$row['item']['id_sp'])->update(['soluongban' => $product['soluongban'] + $row['qty']]);
                if ($product->soluong <= 0) {
                    Product::where('id_sp',$row['item']['id_sp'])->update(['tinhtrang' => 0]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('client.checkout')->with('invalid', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('thank');
    }

    public function thank()
    {
        return view('client.thank');
    }

    public function myOrder()
    {
        $orders = Order::where('id_nguoidung',Auth::user()->id_nguoidung)->get();
        return view('client.my-order',compact('orders'));
    }

    public function showMyOrder($id)
    {
        $orders = OrderDetail::where('id_donhang',$id)
        ->join('sanpham','sanpham.id_sp','=','chitietdonhang.id_sp')
        ->get(['chitietdonhang.*','sanpham.ten_sp','sanpham.giatien','sanpham.giakhuyenmai']);
        return view('client.show-my-order',compact('orders','id'));
    }

    public function checkVoucher(Request $request)
    {
        $voucher = Voucher::where('makhuyenmai',$request->code)->first();
        if (!is_null($voucher)) {
            return response()->json([
                'status' => 200,
                'total' => $request->total - $voucher->giatien,
                'code' => $request->code
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'msg'   => 'Voucher không tồn tại',
                'total' => $request->total
            ]);
        }
    }
}
