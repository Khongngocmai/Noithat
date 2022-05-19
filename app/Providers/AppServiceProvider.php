<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $products = Product::join('dmsp', 'sanpham.id_dmsp', '=', 'dmsp.id_dmsp')
        ->join('ncc', 'sanpham.id_ncc', '=', 'ncc.id_ncc')
        ->where('sanpham.soluong','>',0)
        ->where('sanpham.tinhtrang',1)
        ->get(['sanpham.*', 'dmsp.ten_dmsp AS cate_title', 'ncc.ten_ncc AS supplier_title']);
        View::share('categories', Category::where('tinhtrang',1)->get());
        View::share('products', $products);
    }
}
