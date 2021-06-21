<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Authorization;

class AuthenController extends Controller
{
    public function All()
    {
        //method GET
        // ใช้ Model
        $token_key = '098f6bcd4621d373cade4e832627b4f6';
        $user = 'test';
        $pass = '098f6bcd4621d373cade4e832627b4f6';

        $token = Authorization::where([['token_key','=', $token_key], ['username','=', $user], ['password','=', $pass], ['status','=', 1]])->first();
        // $data = count($token);
        return $token;

    }
}
