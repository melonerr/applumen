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
        $Users = Users::where('id', addslashes($id))->get();
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
    public function PostUpload()
    {
        return "<center style='padding-top:10%'>ไป POST ข้อมูลมา</center>";
    }
    public function PutUpdate()
    {
        return "<center style='padding-top:10%'>ไป PUT ข้อมูลมา</center>";
    }
    public function MethodDelete()
    {
        return "<center style='padding-top:10%'>ไป DELETE ข้อมูลมา</center>";
    }
    public function InsertUser(Request $request)
    {
        //method POST
        //ตรวจสอบข้อมุล
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'github' => 'required|url',
                'twitter' => 'required|url',
                'location' => 'required',
                'status' => 'required|boolean',
            ],
            [
                //ตรวจสอบข้อมุล name
                'name.required' => 'กรุณากรอกข้อมุล name',
                //ตรวจสอบข้อมุล email
                'email.required' => 'กรุณากรอกข้อมุล email',
                'email.regex' => 'กรุณากรอกข้อมุล Email ให้ถูกต้อง',
                //ตรวจสอบข้อมุล github
                'github.required' => 'กรุณากรอกข้อมุล github',
                'github.url' => 'กรุณากรอกข้อมุล github เป็น url (มี http:// หรือ https://)',
                //ตรวจสอบข้อมุล twitter
                'twitter.required' => 'กรุณากรอกข้อมุล twitter',
                'twitter.url' => 'กรุณากรอกข้อมุล twitter เป็น url (มี http:// หรือ https://)',
                //ตรวจสอบข้อมุล location
                'location.required' => 'กรุณากรอกข้อมุล location',
                //ตรวจสอบข้อมุล status
                'status.required' => 'กรุณากรอกข้อมุล status',
                'status.boolean' => 'กรุณากรอกข้อมุล status 0 หรือ 1 เท่านั้น',
            ]
        );
        // insert data
        $users = new Users();
        $users->name = addslashes($request->name);
        $users->email = addslashes($request->email);
        $users->github = addslashes($request->github);
        $users->twitter = addslashes($request->twitter);
        $users->location = addslashes($request->location);
        $users->latest_article_published = addslashes($request->status);
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
        //ตรวจสอบข้อมุล
        $this->validate(
            $request,
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                'github' => 'required|url',
                'twitter' => 'required|url',
                'location' => 'required',
                'status' => 'required|boolean',
            ],
            [
                //ตรวจสอบข้อมุล id
                'id.required' => 'กรุณากรอกข้อมุล id',
                'id.numeric' => 'กรุณากรอกข้อมุล id ให้ถูกต้อง',
                //ตรวจสอบข้อมุล name
                'name.required' => 'กรุณากรอกข้อมุล name',
                //ตรวจสอบข้อมุล email
                'email.required' => 'กรุณากรอกข้อมุล email',
                'email.regex' => 'กรุณากรอกข้อมุล Email ให้ถูกต้อง',
                //ตรวจสอบข้อมุล github
                'github.required' => 'กรุณากรอกข้อมุล github',
                'github.url' => 'กรุณากรอกข้อมุล github เป็น url (มี http:// หรือ https://)',
                //ตรวจสอบข้อมุล twitter
                'twitter.required' => 'กรุณากรอกข้อมุล twitter',
                'twitter.url' => 'กรุณากรอกข้อมุล twitter เป็น url (มี http:// หรือ https://)',
                //ตรวจสอบข้อมุล location
                'location.required' => 'กรุณากรอกข้อมุล location',
                //ตรวจสอบข้อมุล status
                'status.required' => 'กรุณากรอกข้อมุล status',
                'status.boolean' => 'กรุณากรอกข้อมุล status 0 หรือ 1 เท่านั้น',
            ]
        );
        // insert to DB
        $request = DB::table('users')
            ->where('id', addslashes($request->id))
            ->update([
                'name' => addslashes($request->name),
                'email' => addslashes($request->email),
                'github' => addslashes($request->github),
                'twitter' => addslashes($request->twitter),
                'location' => addslashes($request->location),
                'latest_article_published' => addslashes($request->status),
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

    public function DeleteUser(Request $request)
    {
        //ตรวจสอบข้อมุล
        $this->validate(
            $request,
            [
                'id' => 'required|numeric',
            ],
            [
                //ตรวจสอบข้อมุล id
                'id.required' => 'กรุณากรอกข้อมุล id',
                'id.numeric' => 'กรุณากรอกข้อมุล id ให้ถูกต้อง',
            ]
        );

        //method DELETE
        $res =  DB::table('users')->where('id', addslashes($request->id))->delete();

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
