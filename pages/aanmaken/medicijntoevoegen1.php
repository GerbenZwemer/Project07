<?php
session_start();
include('../../conn/db.php');

$sql = "SELECT * FROM medicijnen WHERE medicijn = ?";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['medicijn']));
$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultaat) {
    echo 1;
    
}else{
    $sql = "INSERT INTO `medicijnen`(`medicijn`) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['medicijn']));

    echo 2;
}
?>
