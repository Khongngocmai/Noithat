<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function product() {
        $products = Product::where('soluong','>',0)->where('tinhtrang',1)->paginate(12);
        $product_slide_1 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->limit(3)->get();
        $product_slide_2 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->skip(3)->limit(3)->get();
        return view('client.product-grid', compact('products', 'product_slide_1', 'product_slide_2'));
    }

    public function product_detail($id) {
        $rating = Evaluation::where('id_sp',$id)->avg('sosao');
        $rating = round($rating);
        $product = Product::where('sanpham.id_sp', $id)->where('sanpham.tinhtrang',1)->join('dmsp','sanpham.id_dmsp','=','dmsp.id_dmsp')
        ->join('ncc','ncc.id_ncc','=','sanpham.id_ncc')
        ->select(['sanpham.*','dmsp.ten_dmsp AS cate_title','ncc.ten_ncc AS supplier_title'])->first();
        $products = Product::where('id_dmsp',$product->id_dmsp)->where('tinhtrang',1)->where('soluong','>',0)->where('sanpham.id_sp','<>',$id)->limit(4)->get();
        return view('client.product-detail', compact('product', 'products', 'rating'));
    }

    public function search(Request $request)
    {
        $products = Product::where('soluong','>',0)->where('tinhtrang',1);
        $data = $request->all();

        // Filter name
        if (!is_null($data['q'])) {
            $products = $products->where('ten_sp','like','%'.$data['q'].'%');
        }

        // Filter category
        if (!is_null($data['category'])) {
            $products = $products->where('id_dmsp', $data['category']);
        }

        // Filter price
        if (!is_null($data['price'])) {
            if ($data['price'] == 0) {
                $products = $products->where('giatien','<',3 * pow(10,6));
            } elseif ($data['price'] == 1) {
                $products = $products->whereBetween('giatien',[3 * pow(10,6) + pow(10,5), 4 * pow(10,6)]);
            } elseif ($data['price'] == 2) {
                $products = $products->whereBetween('giatien',[4 * pow(10,6) + pow(10,5), 4 * pow(10,6) + 5 * pow(10,5)]);
            } elseif ($data['price'] == 3) {
                $products = $products->whereBetween('giatien',[4 * pow(10,6) + 6 * pow(10,5), 5 * pow(10,6)]);
            } elseif ($data['price'] == 4) {
                $products = $products->whereBetween('giatien',[5 * pow(10,6) + pow(10,5), 8 * pow(10,6)]);
            } else {
                $products = $products->where('giatien','>',8 * pow(10,6));
            }
        }
        $products = $products->paginate(12);
        $product_slide_1 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->limit(3)->get();
        $product_slide_2 = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('id_sp', 'DESC')->skip(3)->limit(3)->get();
        return view('client.search',compact('products', 'product_slide_1', 'product_slide_2'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id_sp);
        $request->session()->put('cart',$cart);
        return response()->json([
            'status' => 200,
            'qty'    => Session::get('cart')->totalQty,
            'price'  => Session::get('cart')->totalPrice
        ]);
    }

    public function deleteItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteItem($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function increaseItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseItemByOne($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function decreaseItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->decreaseItemByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function filter(Request $request)
    {
        if ($request->id != 0) {
            $products = Product::where('id_dmsp',$request->id)->where('soluong','>',0)->where('tinhtrang',1)->paginate(12);
        } else {
            $products = Product::where('soluong','>',0)->where('tinhtrang',1)->paginate(12);
        }
        return response()->json([
            'status' => 200,
            'data'   => view('client.includes.product-grid', compact('products'))->render()
        ]);
    }

    public function sort(Request $request)
    {
        if ($request->sort == 0) {
            $products = Product::where('soluong','>',0)->where('tinhtrang',1)->paginate(12);
        } elseif ($request->sort == 1) {
            $products = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('giatien','DESC')->orderBy('giakhuyenmai', 'DESC')->paginate(12);
        } else {
            $products = Product::where('soluong','>',0)->where('tinhtrang',1)->orderBy('giatien','ASC')->orderBy('giakhuyenmai', 'DESC')->paginate(12);
        }
        return response()->json([
            'status' => 200,
            'data'   => view('client.includes.product-grid', compact('products'))->render()
        ]);
    }

    public function category($category)
    {
        $products = Product::where('soluong','>',0)->where('tinhtrang',1)->where('id_dmsp',$category)->paginate(12);
        return view('client.product-category',compact('products', 'category'));
    }

    public function rating(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            Evaluation::create([
                'id_nguoidung' => Auth::user()->id_nguoidung,
                'id_sp' => $data['product_id'],
                'sosao' => $data['index']
            ]);
            return response()->json([
                'status' => 200
            ]);
        } else {
            return response()->json([
                'status' => 403
            ]);
        }
    }
}
