<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function GetSimpleData()
    {
        $pool = 'lorem10';
        return  $pool;
    }

    public function GetArrayAndJsonData()
    {
        // arry
        $array  = ["a", "b", "c"];
        // array obj
        $arrayobj = ["a" => 1, "b" => 2, "c" => 3];
        // response json
        $data = [
            ["id" => 1, "name" => "aa", "age" => 24, "position" => "studentA"],
            ["id" => 2, "name" => "bb", "age" => 25, "position" => "studentB"],
            ["id" => 3, "name" => "cc", "age" => 26, "position" => "studentC"],
        ];
        return response()->json([
            // json formay
            'status' => 'error',
            'StatusCode' => '404',
            // array format
            'array' => $array,
            // array OBJ format
            'arrayOBJ' => $arrayobj,
            'data' => $data
        ]);
    }
    public function GetDataID($id)
    {
        return  "user ID:" . $id;
    }

    public function GetDataIDAndName($id, $name)
    {
        return  "ID: " . $id . "<br> Name: " . $name;
    }
}
