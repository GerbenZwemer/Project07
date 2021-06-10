<?php
session_start();
require_once('../autoloader.php');

if($_SESSION['rol'] != 3){
    $cliënt = $_SESSION['cliënt'];
    $chat = new Chat();
    $chat->getMessagesHap($cliënt);

}else{
    $gebruikersnaam =  $_SESSION['naam'];
    $id = $_SESSION['id'];
    $chat = new Chat();
    $chat->getMessagesCliënt($gebruikersnaam, $id);
}
?>
