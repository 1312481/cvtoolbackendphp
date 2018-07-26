<?php
class CV{
    private $conn;
    
    public function __construct($db){
        $this->conn = $db;
    }
    function changeTagName($data){
        $error = 'success';
        $sqluser = "SELECT n.iduser
        from nashtechuser n
        WHERE n.username = :a";
        $stmt = $this->conn->prepare($sqluser);
        $stmt->bindParam(":a", $data->user);
        if(!$stmt->execute()) $error = "fail select nashuser1";
        $result = $stmt->fetchAll();
        $resultid = $result[0]['iduser']; 



        
        $sqluser = "UPDATE jsonversion j
        set j.versionname = :a
        WHERE j.iduser = :b and j.versionname=:c"; 
        $stmt = $this->conn->prepare($sqluser);
        $stmt->bindParam(":a", $data->data);
        $stmt->bindParam(":b", $resultid);
        $stmt->bindParam(":c", $data->tagname);
        if(!$stmt->execute()) $error = "fail select nashuser2";

        return $error;
    }
    function json($data){
        $error = 'success';
        if($data != NULL){
          
            
            $sqluser2 = "SELECT n.iduser
            from nashtechuser n
            WHERE n.username = :a";
            $stmt2 = $this->conn->prepare($sqluser2);
            $stmt2->bindParam(":a", $data->user);
            if(!$stmt2->execute()) $error = "fail select nashuser";
            $result = $stmt2->fetchAll();
            // var_dump($result);
            $resultid = $result[0]['iduser']; 



            $sqluser3 = "SELECT * FROM nashtechuser as n, jsonversion as j 
            where n.iduser = j.iduser and n.username=:a and j.versionname=:b";  
            $stmt3 = $this->conn->prepare($sqluser3);
            $stmt3->bindParam(":a", $data->user);
            $stmt3->bindParam(":b", $data->tagname);
            if(!$stmt3->execute()) $error = "fail select nashuser";
            $result = $stmt3->fetchAll();
            if(count($result) == 0){

                $sqluser4 = "INSERT INTO jsonversion(idjson, iduser, versionname) VALUES (iduser,:a,:b)";
                $stmt4 = $this->conn->prepare($sqluser4);
                $filename = $data->tagname;
                $stmt4->bindParam(":a", $resultid );
                $stmt4->bindParam(":b", $filename );
                if(!$stmt4->execute()) $error = "fail insert json";
            }


           
            
        }
        else {
            return "mkmlkmlkm";
        }

        return $error;
       
  }

    function cv($data){
        $error = 'success';
        if($data != NULL){
            $sqluser = "INSERT INTO nashtechuser(iduser, username) VALUES (iduser,:a)";   
            $stmt = $this->conn->prepare($sqluser);
            $stmt->bindParam(":a", $data->user);
            if(!$stmt->execute()) {
                $error = "fail insert nashuser";
                return $error;
            }
            
            $sqluser2 = "SELECT n.iduser
            from nashtechuser n
            WHERE n.username = :a";
            $stmt2 = $this->conn->prepare($sqluser2);
            $stmt2->bindParam(":a", $data->user);
            if(!$stmt2->execute()) $error = "fail select nashuser";
            $result = $stmt2->fetchAll();
            // var_dump($result);
            $resultid = $result[0]['iduser']; 


            $sqluser3 = "INSERT INTO jsonversion(idjson, iduser, versionname) VALUES (iduser,:a,:b)";
            $stmt3 = $this->conn->prepare($sqluser3);
            $stmt3->bindParam(":a", $resultid );
            $stmt3->bindParam(":b", $data->tagname);
            if(!$stmt3->execute()) $error = "fail insert json";
            
        }
        else {
            return "mkmlkmlkm";
        }
        return $error;
       
  }

   
}