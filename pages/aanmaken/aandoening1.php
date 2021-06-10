<?php
session_start();
include('../../conn/db.php');

$sql = "SELECT * FROM aandoening WHERE aandoening = ?";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['aandoening']));
$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultaat) {
    echo 1;
    
}else{
    $sql = "INSERT INTO `aandoening`(`aandoening`) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['aandoening']));

    echo 2;
}
?>
