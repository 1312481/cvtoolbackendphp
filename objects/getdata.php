<?php
class GetData{
    private $conn;
    
    public function __construct($db){
        $this->conn = $db;
    }
    function cv($data){
        $error = 'success';
        if($data != NULL){
            $sqluser = "SELECT * FROM nashtechuser as n, jsonversion as j 
            where n.iduser = j.iduser and n.username=:a";   
            $stmt = $this->conn->prepare($sqluser);
            $stmt->bindParam(":a", $data);
            $stmt->execute();
            $result= $stmt->fetchAll();
            return $result;      
        }
        else {
            return "mkmlkmlkm";
        }
        return $error;
       
  }

   
}