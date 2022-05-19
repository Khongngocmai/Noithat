<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'lienhe';

    protected $fillable = [
        'id_qtv',
        'noidung',
        'hoten',
        'email',
        'tinhtrang'
    ];
}
