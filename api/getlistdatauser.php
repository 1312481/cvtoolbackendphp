<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/getdata.php';
    
    $idUser = isset($_GET['user']) ? $_GET['user'] : die();
    
    $database = new Database();
    $db = $database->getConnection();

    $user = new GetData($db);
    $task = array();
    $result= $user->cv($idUser);
    for ((int) $i = 0; $i < count($result); $i++){
        $file_name= $result[$i]["versionname"].'.json';
        $path = '../resources/' . $file_name;
        $file = file_get_contents($path, FILE_USE_INCLUDE_PATH);
 
        $task_item = array(
            "data" => json_decode($file),
            "tagName" => $result[$i]["versionname"]
        );
        array_push($task, $task_item);
    }
   

    sleep(3);
    echo json_encode($task);

?>