<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Media;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('dmsp', 'sanpham.id_dmsp', '=', 'dmsp.id_dmsp')
        ->join('ncc', 'sanpham.id_ncc', '=', 'ncc.id_ncc')
        ->get(['sanpham.*', 'dmsp.ten_dmsp AS cate_title', 'ncc.ten_ncc AS supplier_title']);
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.add', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('thumbnail')) {
            $validated = $request->validate([
                'name' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required'
            ]);
            if ($request->type == 0) {
                $product = Product::create([
                    'ten_sp' => $validated['name'],
                    'giatien' => $request->input('price'),
                    'id_dmsp' => $validated['category_id'],
                    'id_ncc' => $validated['supplier_id'],
                    'mota' => $request->input('description'),
                    'loai_sp' => $request->input('type'),
                    'soluong' => $request->input('qty')
                ]);
            } else {
                $product = Product::create([
                    'ten_sp' => $validated['name'],
                    'id_dmsp' => $validated['category_id'],
                    'id_ncc' => $validated['supplier_id'],
                    'mota' => $request->input('description'),
                    'giakhuyenmai' => $request->input('price_sale'),
                    'thoigianbatdau' => $request->input('start_date'),
                    'thoigianketthuc' => $request->input('end_date'),
                    'loai_sp' => $request->input('type'),
                    'soluong' => $request->input('qty')
                ]);
            }
            foreach($request->thumbnail as $image) {
                $name = $image->getClientOriginalName();
                $image->storeAs('/public/images/products', $name);
                $product->image()->create(["url" => "storage/images/products/". $name]);
            }
            return redirect()->route('product.list')->with("success","Lưu thành công");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('categories', 'suppliers', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        $delete_images_src = [];
        if($request->has('thumbnail_src')) {
            foreach($product->image as $product_thumbnail_src) {
                $is_delete = true;
                foreach($request->thumbnail_src as $request_thumbnail_src) {
                    if(trim($product_thumbnail_src->url) == trim($request_thumbnail_src)) {
                        $is_delete = false;
                        break;
                    }
                }
                if($is_delete) {
                    array_push($delete_images_src, $product_thumbnail_src->url);
                }
            }
        } else {
            foreach($product->image as $product_thumbnail_src) {
                array_push($delete_images_src, $product_thumbnail_src->url);
            }
        }
        Media::whereIn("url", $delete_images_src)->delete();
        foreach($delete_images_src as $product_thumbnail_src) {
            Storage::delete("images/products/$product_thumbnail_src");
        }
        if($request->has('thumbnail')) {
            foreach($request->thumbnail as $image) {
                $name = $image->getClientOriginalName();
                $image->storeAs('/public/images/products', $name);
                $product->image()->create(["url" => "storage/images/products/". $name]);
            }
        }
        $product->ten_sp = $request->input('name');
        $product->giatien = $request->input('price');
        $product->id_dmsp = $request->input('category_id');
        $product->id_ncc = $request->input('supplier_id');
        $product->mota = $request->input('description');
        $product->loai_sp = $request->input('type');
        $product->soluong = $request->input('qty');
        if ($request->type == 1) {
            $product->giakhuyenmai = $request->input('price_sale');
            $product->thoigianbatdau = $request->input('start_date');
            $product->thoigianketthuc = $request->input('end_date');
        }
        $product->save();
        return redirect()->route('product.list')->with("success","Sửa thành công");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderDetails = OrderDetail::where('id_sp', $id)->get();
        foreach ($orderDetails as $orderDetail) {
            $check = Order::where('id_donhang', $orderDetail->id_donhang)->where('tinhtrang','<>',3)->exists();
            if ($check) {
                return redirect()->route('product.list')->with("invalid","Hiện có một vài đơn hàng đang có sản phẩm này, bạn chỉ có thể xóa đối với những đơn hàng bị hủy");
            }
        }
        $product = Product::find($id);
        $product->delete();
        $url = $product->image->first()->url;
        Media::where("url", $url)->delete();
        $url_parts = explode('/', $url);
        Storage::delete("images/products/" . end($url_parts));
        return redirect()->route('product.list')->with("success","Xóa thành công");
    }

    public function updateStatus($id, $status)
    {
        $product = Product::find($id);
        $product->tinhtrang = $status;
        $product->save();
        return redirect()->route('product.list')->with("success","Cập nhật trạng thái thành công");
    }
}
