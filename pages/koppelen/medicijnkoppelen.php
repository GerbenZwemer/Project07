<?php
session_start();
include('../../conn/db.php');

$sql = "INSERT INTO `medicijn_cliënt`(`medicijn_id`, `cliënt_id`, `opgehaald`) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['medicijn'],$_POST['cliënt_id'],'nee'));
echo 1;
?>