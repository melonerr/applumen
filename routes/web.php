<?php


$router->get('/', function () use ($router) {
    return view('docs');
});

$router->get('/key', 'TestController@GetSimpleData');
$router->get('/test', 'TestController@GetArrayAndJsonData');
$router->get('/test/{id}', 'TestController@GetDataID');
$router->get('/test/{id}/{name}', 'TestController@GetDataIDAndName');



// เรียกผ่าน Controller
$router->get('/users', 'UsersController@Users');
$router->get('/users/{id}', 'UsersController@UsersID');
$router->get('/create/users', 'UsersController@PostUpload');
$router->get('/update/users', 'UsersController@PutUpdate');
$router->get('/delete/users', 'UsersController@MethodDelete');

// insert data
// Query Params {name, email, github, twitter, location, status }
$router->post('/create/users', 'UsersController@InsertUser');

// insert data     
// Query Params {id, name, email, github, twitter, location, status }
$router->put('/update/users', 'UsersController@UpdateUsers');

// delete data
$router->delete('/delete/users', 'UsersController@DeleteUser');


// เรียกผ่า route
$router->get('users-all', function () {
    // Query ข้อมูลจาก Database
    $results = app('db')->select("SELECT * FROM users");
    // return ข้อมูลที่ Query จาก database ในรูปแบบ Json
    return response()->json($results);
});