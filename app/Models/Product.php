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

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function assignCategory($categoryIds)
    {
        return $this->categories()->sync($categoryIds);
    }

    public function getBy($dataSearch, $categoryId)
    {
        return $this->whereHas('categories', fn ($q) => $q->where('category_id', $categoryId))->paginate(10);
    }

    public function getImagePathAttribute()
    {
        return asset($this->images->count() > 0 ? 'upload/' . $this->images()->first()->url : 'upload/default.png');
    }

    public function getSalePriceAttribute()
    {
        return $this->attributes['sale'] ? $this->attributes['price'] - ($this->attributes['sale'] * 0.01 * $this->attributes['price']) : 0;
    }
}
