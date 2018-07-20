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
   
    switch ($user->cv($data)) {
        case 'fail insert nashuser':
        
            # code...
            echo json_encode('fail insert nashuser');
            break;
        case 'fail select nashuser':
        # code...
            echo json_encode('fail select nashuser');
            break;
        case 'fail insert json':
        # code...
            echo json_encode('fail insert json');
            break;
        case 'success':
        # code...
            echo json_encode('success');
            break;
        default:
             echo json_encode('unknown error');
            break;
    }
?>