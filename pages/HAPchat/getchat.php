<?php
session_start();
require_once('../autoloader.php');
if($_SESSION['rol'] != 3){
$gebruikersnaam = $_POST['cliënt'];
$_SESSION['cliënt'] = $_POST['cliënt']; 

$berichten = new Chat();
$berichten->getMessagesHap($gebruikersnaam);
}
?>

