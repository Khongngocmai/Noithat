<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index() {
        $product_slide_1 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->limit(3)->get();
        $product_slide_2 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->skip(3)->limit(3)->get();
        $product_top_sale_1 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('soluongban', 'DESC')->limit(3)->get();
        $product_top_sale_2 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('soluongban', 'DESC')->skip(3)->limit(3)->get();
        $product_top_sale_3 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('soluongban', 'DESC')->skip(6)->limit(3)->get();
        $product_top_rating_1 = DB::select(
            'SELECT b.*,avg(a.sosao) FROM danhgia a, sanpham b WHERE a.id_sp = b.id_sp and b.tinhtrang = 1 GROUP BY a.id_sp ORDER BY avg(a.sosao) DESC LIMIT 3'
        );
        $product_top_rating_2 = DB::select(
            'SELECT b.*,avg(a.sosao) FROM danhgia a, sanpham b WHERE a.id_sp = b.id_sp and b.tinhtrang = 1 GROUP BY a.id_sp ORDER BY avg(a.sosao) DESC LIMIT 3 OFFSET 3'
        );
        $product_top_rating_3 =  DB::select(
            'SELECT b.*,avg(a.sosao) FROM danhgia a, sanpham b WHERE a.id_sp = b.id_sp and b.tinhtrang = 1 GROUP BY a.id_sp ORDER BY avg(a.sosao) DESC LIMIT 3 OFFSET 6'
        );
        return view('client.home', compact('product_slide_1', 'product_slide_2', 'product_top_sale_1', 'product_top_sale_2', 'product_top_sale_3','product_top_rating_1','product_top_rating_2','product_top_rating_3'));
    }

    public function introduce()
    {
        return view('client.introduce');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function postContact(Request $request)
    {
        Contact::create([
            'hoten' => $request->name,
            'email' => $request->email,
            'noidung' => $request->content
        ]);
        return redirect()->route('client.contact')->with('success', 'Cảm ơn bạn đã gửi liên hệ cho chúng tôi, chúng tôi sẽ sớm phản hồi lại cho bạn qua hộp thư');
    }
}
