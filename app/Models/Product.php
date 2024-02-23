<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleImageTrait;

    // $fillable cổng kiểm soát để chỉ cho phép điền các trường an toàn từ dữ liệu người dùng
    protected $fillable = [
        'name',
        'description',
        'sale',
        'price'
    ];

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
