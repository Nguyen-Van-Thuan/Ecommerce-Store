<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class Permisson extends Permission
{
    use HasFactory;

    #TODO: $fillable giúp xác định các trường có thể tự động điền dữ liệu trong mô hình Laravel, ngăn chặn nguy cơ gán giá trị không an toàn.

    // Trong trường hợp này, chỉ có 'name', 'display_name', và 'group' được phép. $fillable là bắt buộc.
    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];
}
