<?php
session_start();
include('../../conn/db.php');

$sql = "INSERT INTO `aandoening_cliënt`(`aandoening_id`, `cliënt_id`) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['aandoening'],$_POST['cliënt_id']));
echo 1;
?>