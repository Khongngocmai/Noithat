<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/categories', $request->image->getClientOriginalName());
                $category = Category::create([
                   'ten_dmsp' => $request->name
                ]);
                $category->image()->create(["url" => "storage/images/categories/". $request->image->getClientOriginalName()]);
                return redirect()->route('category.list')->with("success","Lưu thành công");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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
        $category = Category::find($id);
        $category->ten_dmsp = $request->name;
        $url = $category->image->first()->url;
        Media::where("url", $url)->delete();
        $url_parts = explode('/', $url);
        Storage::delete("images/categories/" . end($url_parts));
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/categories', $request->image->getClientOriginalName());
                $category->image()->create(["url" => "storage/images/categories/". $request->image->getClientOriginalName()]);
                return redirect()->route('category.list')->with("success","Lưu thành công");
            }
        }
        $category->save();
        return redirect()->route('category.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Product::where('id_dmsp', $id)->exists();
        if ($check) {
            return redirect()->route('category.list')->with("invalid","Hiện có một vài sản phẩm đang thuộc danh mục này, vui lòng xóa toàn bộ sản phẩm trước để có thể xóa danh mục");
        }
        $category = Category::find($id);
        $category->delete();
        $url = $category->image->first()->url;
        Media::where("url", $url)->delete();
        $url_parts = explode('/', $url);
        Storage::delete("images/categories/" . end($url_parts));
        return redirect()->route('category.list')->with("success","Xóa thành công");
    }

    public function updateStatus($id, $status)
    {
        $category = Category::find($id);
        $category->tinhtrang = $status;
        $category->save();
        return redirect()->route('category.list')->with("success","Cập nhật trạng thái thành công");
    }
}
