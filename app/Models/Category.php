<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'dmsp';

    protected $primaryKey = "id_dmsp";

    protected $fillable = [
        'ten_dmsp',
        'tinhtrang'
    ];

    public function image() {
        return $this->morphMany(Media::class, 'imageable');
    }
}
