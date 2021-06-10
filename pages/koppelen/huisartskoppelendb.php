<?php
    session_start();
    include('../../conn/db.php');

    if($_SESSION['loggedin'] != true){
        session_destroy();
        header("LOCATION: ../../");
        exit;
    }

    if($stmt = $conn->prepare("UPDATE cliënten SET huisarts = ? WHERE id = ?")){
        $stmt->bindParam(1, $_POST['huisarts'], PDO::PARAM_STR, 255);
        $stmt->bindParam(2, $_POST['id'], PDO::PARAM_STR, 255);
        $stmt->execute();
        echo 'Huisarts is gekoppeld';
    }else{
        echo 'Er is iets fout gegaan';
    }

?>