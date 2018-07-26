<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/checkUser.php';


    $database = new Database();
    $db = $database->getConnection();

    $user = new CheckUser($db);
    $data = json_decode(file_get_contents("php://input"));

    switch ($user->cv($data)) {
        case 'user is existed':
        
            echo json_encode('user is existed');
            break;
        case 'user is not existed':
            
            echo json_encode('user is not existed');
            break;
            
        default:
             echo json_encode('unknown error');
            break;
    }
?>