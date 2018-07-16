<?php
class CV{
    private $conn;
    
    public function __construct($db){
        $this->conn = $db;
    }
    function cv($data){
        echo $data->profile;
        $sql = "insert into nashtechuser set username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data->profile);
        $stmt->execute();
  }

   
}