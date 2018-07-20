<?php




  class File{
    private $conn;
    public function __construct(){
      //  $this->conn = $db;
    }
    function addResource(){
      return 
       move_uploaded_file($_FILES['file']['tmp_name'],
      "../resources/" . $_FILES['file']['name']) ;
      // move_uploaded_file($_FILES['version']['tmp_name'],
      // "../resources/" . $_FILES['version']['name']) ;
      //  $sql = "UPDATE quest SET (resource = '" . $_FILES["resource"]["name"] ."') 
      //  WHERE (id = '" . $_FILES["id"]["name"] ."') ";
      //  $stmt = $this->conn->prepare($sql);
      //  $stmt->execute();
    }
  }
?>
    