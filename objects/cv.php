<?php
class CV{
    private $conn;
    
    public function __construct($db){
        $this->conn = $db;
    }
    function cv($data){
        $error = 'success';
        if($data != NULL){
            $sqluser = "INSERT INTO nashtechuser(iduser, username) VALUES (iduser,:a)";   
            $stmt = $this->conn->prepare($sqluser);
            $stmt->bindParam(":a", $data->user);
            if(!$stmt->execute()) $error = "fail insert nashuser";
            
            $sqluser2 = "SELECT n.iduser
            from nashtechuser n
            WHERE n.username = :a";
            $stmt2 = $this->conn->prepare($sqluser2);
            $stmt2->bindParam(":a", $data->user);
            if(!$stmt2->execute()) $error = "fail select nashuser";
            $result = $stmt2->fetchAll();
            // var_dump($result);
            $resultid = $result[0]['iduser']; 


            $sqluser3 = "INSERT INTO jsonversion(idjson, iduser, versionname) VALUES (iduser,:a,'Sang')";
            $stmt3 = $this->conn->prepare($sqluser3);
            $stmt3->bindParam(":a", $resultid );
            if(!$stmt3->execute()) $error = "fail insert json";
            
        }
        else {
            return "mkmlkmlkm";
        }
        return $error;
       
  }

   
}