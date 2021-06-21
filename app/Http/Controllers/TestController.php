<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use log;
use Laravel\Lumen\Application as LumenApplication;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

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
            'status' => 'success',
            'StatusCode' => 200,
            // array format
            'array' => $array,
            // array OBJ format
            'arrayOBJ' => $arrayobj,
            'data' => $data
        ]);
    }
    public function GetDataID($id)
    {

        return response()->json($id);
    }

    public function GetDataIDAndName($id, $name)
    {
        // return  "ID: " . $id . "<br> Name: " . $name;
        $data = "ID: " . $id . "<br> Name: " . $name;
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $this->sendRequest($data, $url);
    }

    protected function sendRequest($data, $url)
    {
        // $date = date("Y/m/d");
        // $log = [ $date=>[
        //     "url" => $url,
        //     "data" => $data,
        //     "status" =>""
        // ]];
        // $fh = fopen("logAPI.log","a");  
        // fwrite($fh, "aaa");
        // fclose($file); 
        return response()->json($data);
    }
}
