<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Đặt tên bảng, nếu bảng không theo quy ước
    protected $table = 'news';

    // Các thuộc tính có thể được gán đại diện cho cột trong bảng
    protected $fillable = [
        'title',
        'description',
        'priority'
    ];
}
