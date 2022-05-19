<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'donhang';

    protected $primaryKey = "id_donhang";

    public $incrementing = false;

    protected $fillable = [
        'id_donhang',
        'id_nguoidung',
        'id_khuyenmai',
        'diachi',
        'thanhtien',
        'tinhtrang'
    ];
}
