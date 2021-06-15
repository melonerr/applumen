<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UsersController extends Controller
{
    public function Users()
    {
        //method GET
        // ใช้ Model
        $Users = Users::all();
        return response()->json($Users);

        // แบบไม่ใช้ Model
        // Query ข้อมูลจาก Database
        // $results = app('db')->select("SELECT * FROM users");
        // or
        // $Users = DB::table('users')->get();
        // return ข้อมูลที่ Query จาก database ในรูปแบบ Json
        // return response()->json($results);


    }

    public function UsersID($id)
    {
        //method GET
        // ใช้ Model
        // $Users = Users::where('id', $id)->get();
        $Users = Users::all()->where('id', $id);
        return response()->json($Users);

        // แบบไม่ใช้ Model
        // Query ข้อมูลจาก Database
        // $results = app('db')->select("SELECT * FROM users Where id=$id");
        // return ข้อมูลที่ Query จาก database ในรูปแบบ Json
        // return response()->json($results);

    }

    public function InsertUser(Request $request)
    {
        //method POST
        //ตรวจสอบข้อมุล

        $users = new Users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->github = $request->github;
        $users->twitter = $request->twitter;
        $users->location = $request->location;
        $users->latest_article_published = $request->status;
        $users->save();
        return response()->json($users);
    }

    public function UpdateUsers(Request $request)
    {
        //method PUT
        // insert to DB
        $request = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'github' => $request->github,
                'twitter' => $request->twitter,
                'location' => $request->location,
                'latest_article_published' => $request->latest_article_published,
                'updated_at' => date("Y-m-d H:i:s")  
            ]);

        if ($request === 1) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'Error',
            ]);
        }
    }

    public function DeleteUser($id)
    {
        //method DELETE
        $res =  DB::table('users')->where('id', $id)->delete();
        
        if ($res === 1) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'Error',
            ]);
        }
    }
}
