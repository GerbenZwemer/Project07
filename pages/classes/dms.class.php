<?php
class Dms extends db{
    public function insertDocument($cliëntId){
        if (isset($_POST['upload'])) {       
            $target = "files/".basename($_FILES['file']['name']);
        
            $file = $_FILES['file']['name'];
    
            $fileExtention = pathinfo($file, PATHINFO_EXTENSION); 
    
            $sql = "INSERT INTO files (`file`, client_id, `type`)
            values (?,?,?)";
            $this->execute($sql, array($file, $cliëntId, $fileExtention));
    
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
              $msg = "Image uploaded successfully";
            }else{
              $msg = "Failed to upload image";
            }
          
        }
    }
}
?>