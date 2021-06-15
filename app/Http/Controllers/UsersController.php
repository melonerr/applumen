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
        $Users = Users::where('id', $id)->get();
        // $Users = Users::all()->where('id', $id);
        if (count($Users) === 1) {
            $data = [
                "status" => "success",
                "description" => "",
                "data" => [
                    "id" => $Users[0]['id'],
                    "name" => $Users[0]['name'],
                    "email" => $Users[0]['email'],
                    "github" => $Users[0]['github'],
                    "twitter" => $Users[0]['twitter'],
                    "location" => $Users[0]['location'],
                    "latest_article_published" => $Users[0]['latest_article_published'],
                    "created_at" => $Users[0]['created_at'],
                    "updated_at" => $Users[0]['updated_at']
                ],
                "about" => [
                    "Create by" => "melonerr",
                    "version" => "1.0.1"
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                "status" => "Error",
                "description" => "Cannot find data",
                "data" => [
                    "id" => null,
                    "name" => null,
                    "email" => null,
                    "github" => null,
                    "twitter" => null,
                    "location" => null,
                    "latest_article_published" => null,
                    "created_at" => null,
                    "updated_at" => null
                ],
                "about" => [
                    "Create by" => "melonerr",
                    "version" => "1.0.1"
                ]
            ];
            return response()->json($data);
        }

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
        if (!empty($users['id'])) {
            $data = [
                "status" => "success",
                "description" => "insert data seccess",
                "about" => [
                    "Create by" => "melonerr",
                    "version" => "1.0.1"
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                "status" => "Error",
                "description" => "Cannot insert data",
            ];
            return response()->json($data);
        }
    }

    public function UpdateUsers(Request $request)
    {
        //method PUT
        // insert to DB
        // return $request;
        $request = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'github' => $request->github,
                'twitter' => $request->twitter,
                'location' => $request->location,
                'latest_article_published' => $request->status,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        if ($request === 1) {
            $data = [
                "status" => "success",
                "description" => "Update data seccess",
                "about" => [
                    "Create by" => "melonerr",
                    "version" => "1.0.1"
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                "status" => "Error",
                "description" => "Cannot Update data",
            ];
            return response()->json($data);
        }
    }

    public function DeleteUser($id)
    {
        //method DELETE
        $res =  DB::table('users')->where('id', $id)->delete();

        if ($res === 1) {
            $data = [
                "status" => "success",
                "description" => "Delete data seccess",
                "about" => [
                    "Create by" => "melonerr",
                    "version" => "1.0.1"
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                "status" => "Error",
                "description" => "Cannot Delete data",
            ];
            return response()->json($data);
        }
    }
}
