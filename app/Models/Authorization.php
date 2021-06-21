<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    // ชื่อ ตาราง
    protected $table   = 'authorization';
    // คอลัมน์ที่ทำการแก้ไขได้
    protected $fillable = [
        'id',
        'token_key',
        'username',
        'password',
        'status',
        'token_date',
    ];
    
}
