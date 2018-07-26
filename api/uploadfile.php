<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection

    include_once '../file/upload.php';
    

    $upload = new File();
    
    // get posted data


    if($upload->addResource()){
        echo json_encode("Upload Success");
    }   
    else{
        echo json_encode("Upload Fail");
    }



    // if($user->cv($data->user)){
    //     echo json_encode('sucesss');
    // }
    // else {
    //     echo json_encode('failed');
    // }

    // var_dump($data);
  
  
?>