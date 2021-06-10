<?php
session_start();
include('../../conn/db.php');
if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}
if(isset($_POST['submit'])){
    $cliënt = $_POST['cliënt'];
    $bed = $_POST['bed'];
    $kamer = $_POST['kamer'];
    $begingdatum = $_POST['begindatum'];
    $begintijd = $_POST['begintijd'];
    $einddatum = $_POST['einddatum'];
    $eindtijd = $_POST['eindtijd'];

    $sql = "INSERT INTO `bedbezetting`(`bed_id`, `kamer_id`, `begindatum`, `begintijd`, `einddatum`, `eindtijd`) 
    VALUES (?,?,?,?,?,?)";  
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($bed,$kamer,$begingdatum, $begintijd, $einddatum, $eindtijd));

    $sql = "SELECT * FROM bedbezetting  WHERE bed_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($bed));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    $beddenbezettingId = $resultaat['id'];

    $sql = "UPDATE `cliënten` SET `beddenbezetting_id`=? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($beddenbezettingId, $cliënt));
}  
?>