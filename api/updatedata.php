<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/cv.php';


    $database = new Database();
    $db = $database->getConnection();

    $user = new CV($db);
    $data = json_decode(file_get_contents("php://input"));
    $file_name= $data->user.$data->tagname.'.json';
    $path = '../resources/' . $file_name;
    $json = json_encode($data->data);
    if (file_put_contents($path, $json))
    echo json_encode("success");
    else 
    echo $path;
 

?>