<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.list', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create([
            'ten_ncc' => $request->name,
            'diachi' => $request->address,
            'sdt' => $request->phone,
            'email' => $request->email
        ]);
        return redirect()->route('supplier.list')->with("success","Lưu thành công");
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
        $supplier = Supplier::find($id);
        return view('admin.suppliers.edit', compact('supplier'));
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
        $supplier = Supplier::find($id);
        $supplier->ten_ncc = $request->name;
        $supplier->diachi = $request->address;
        $supplier->sdt = $request->phone;
        $supplier->email = $request->email;
        $supplier->save();
        return redirect()->route('supplier.list')->with("success","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Product::where('id_ncc', $id)->exists();
        if ($check) {
            return redirect()->route('supplier.list')->with("invalid","Hiện có một vài sản phẩm đang thuộc nhà cung cấp này, vui lòng xóa toàn bộ sản phẩm trước để có thể xóa nhà cung cấp");
        }
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.list')->with("success","Cập nhật thành công");
    }
}
