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
    switch ($user->changeTagName($data)) {
        case 'fail select nashuser1':
        
            # code...
            echo json_encode('fail insert nashuser1');
            break;
        case 'fail select nashuser2':
        # code...
            echo json_encode('fail select nashuser2');
            break;
        case 'fail insert json':
        # code...
            echo json_encode('fail insert json');
            break;
        case 'success':
            # code...
            $oldnamefile = "../resources/".$data->user.$data->tagname.".json";
            $newnamefile = "../resources/".$data->user.$data->data.".json";
            rename($oldnamefile,$newnamefile);
            echo json_encode('success');
            break;
        default:
             echo json_encode('unknown error');
            break;
    }