<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', 'TestController@GetSimpleData');
$router->get('/test', 'TestController@GetArrayAndJsonData');
$router->get('/test/{id}', 'TestController@GetDataID');
$router->get('/test/{id}/{name}', 'TestController@GetDataIDAndName');



// เรียกผ่าน Controller
$router->get('/users', 'UsersController@Users');
$router->get('/users/{id}', 'UsersController@UsersID');

// insert data
$router->post('/users/create', 'UsersController@InsertUser');

// insert data 
$router->put('/users/update/{id}', 'UsersController@UpdateUsers');

// delete data
$router->delete('/users/delete/{id}', 'UsersController@DeleteUser');


// เรียกผ่า route
$router->get('users-all', function () {
    // Query ข้อมูลจาก Database
    $results = app('db')->select("SELECT * FROM users");
    // return ข้อมูลที่ Query จาก database ในรูปแบบ Json
    return response()->json($results);
});