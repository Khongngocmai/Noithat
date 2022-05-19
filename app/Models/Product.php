<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    protected $primaryKey = "id_sp";

    protected $fillable = [
        'id_dmsp',
        'id_ncc',
        'loai_sp',
        'ten_sp',
        'mota',
        'giatien',
        'giakhuyenmai',
        'thoigianbatdau',
        'thoigianketthuc',
        'soluong',
        'soluongban',
        'tinhtrang'
    ];

    public function image() {
        return $this->morphMany(Media::class, 'imageable');
    }
}
