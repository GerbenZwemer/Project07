<?php
session_start();
include('../../conn/db.php');

$sql = "INSERT INTO `consulten`(`Titel`, `consult`, `datum`, `cliënt_id`) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['titel'],$_POST['consult'],$_POST['datum'],$_POST['cliënt_id']));
echo 1;
?>