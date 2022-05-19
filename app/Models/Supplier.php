<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'ncc';

    protected $primaryKey = "id_ncc";

    protected $fillable = [
        'ten_ncc',
        'diachi',
        'sdt',
        'email'
    ];
}
