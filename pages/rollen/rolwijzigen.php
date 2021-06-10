<?php
session_start();
include('../../conn/db.php');
if(isset($_POST['toevoegen'])){
    $rol = $_SESSION['rol'];


    foreach ($_POST['rechten'] as $rechten) {
        $sql = "DELETE FROM `gebruikers_rechten` WHERE rol = ?";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($rol));
        }catch(PDOException $e){
            $e->getMessage();
        } 
    }


    foreach ($_POST['rechten'] as $recht) {
        $sql = "INSERT INTO `gebruikers_rechten`(`rol`, `recht_id`) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($rol,$recht));
            echo 'recht is toegevoegd ';
        }catch(PDOException $e){
            echo 'er is iets fout gegaan ';
        } 
    }

}elseif(isset($_POST['Verwijderen'])){
    $rol = $_SESSION['rol'];

    foreach ($_POST['rechten'] as $recht) {
        $sql = "DELETE FROM `gebruikers_rechten` WHERE rol = ? and recht_id = ?";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($rol,$recht));
            echo 'recht is toegevoegd ';
        }catch(PDOException $e){
            echo 'er is iets fout gegaan';
        }
    }
}

?>