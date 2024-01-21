<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // $fillable cổng kiểm soát để chỉ cho phép điền các trường an toàn từ dữ liệu người dùng
    protected $fillable = [
        'name',
        'description',
        'sale',
        'price'
    ];
}
