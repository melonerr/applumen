<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // ชื่อ ตาราง
    protected $table   = 'users';
    // คอลัมน์ที่ทำการแก้ไขได้
    protected $fillable = [
        'name',
        'email',
        'github',
        'twitter',
        'location',
        'latest_article_published',
        'created_at',
        'updated_at'
    ];
    
}
