<?php


$router->get('users/db', function () {
    // Query ข้อมูลจาก Database
    $results = app('db')->select("SELECT * FROM users");
    // return ข้อมูลที่ Query จาก database ในรูปแบบ Json
    return response()->json($results);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    $pool = 'lorem10';
    return  $pool;
});

$router->get('/users', function () {
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
});


$router->get('/users/{id}', function ($id) {
    return  "user ID:" . $id;
});

$router->get('/users/{id}/{name}', function ($id, $name) {
    return  "ID: " . $id . "<br> Name: " . $name;
});
