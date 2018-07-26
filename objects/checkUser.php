<?php
class CheckUser{
    private $conn;
    
    public function __construct($db){
        $this->conn = $db;
    }
    function cv($data){
        $error = 'success';
        if($data != NULL){
            $sqluser = "SELECT * FROM `nashtechuser` WHERE username =:a";   
            $stmt = $this->conn->prepare($sqluser);
            $stmt->bindParam(":a", $data->user);
            $stmt->execute();
            $result= $stmt->fetchAll();
            if(count($result) == 1)  {
                $error = "user is existed";
                return $error;
            }
            else{
                $error = "user is not existed";
                return $error;
            }
                        
        }
        else {
            return "mkmlkmlkm";
        }
        return $error;
       
  }

   
}