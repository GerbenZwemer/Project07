<?php
session_start();
include('../../conn/db.php');

if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}
if(isset($_POST['toevoegen'])){
    $kamer  = $_SESSION['kamer'];


    foreach ($_POST['bed'] as $bed) {
        $sql = "DELETE FROM `bedden_kamer` WHERE kamer_id = ?";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($kamer));
        }catch(PDOException $e){
            $e->getMessage();
        } 
    }


    foreach ($_POST['bed'] as $bed) {
        $sql = "INSERT INTO `bedden_kamer`(`kamer_id`, `bed_id`) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        try{
            $stmt->execute(array($kamer,$bed));
            echo 'Bed is toegevoegd';
        }catch(PDOException $e){
            echo 'er is iets fout gegaan';
        } 
    }

}

?>