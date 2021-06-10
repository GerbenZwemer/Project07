<?php
session_start();
require_once('../autoloader.php');
if($_SESSION['rol'] != 3){
    if(isset($_POST['message'])){
    $message = $_POST['message'];
    $cliënt = $_SESSION['cliënt'];

    $berichten = new Chat();
    $berichten->sendMessageHap($message, $cliënt);
    }
    if(isset($_POST['info'])){
        $cliënt = $_SESSION['cliënt'];
        $berichten = new Chat();
        $berichten->getClientInfo($cliënt);
    }
}elseif($_SESSION['rol'] == 3){
    $message = $_POST['message'];
    $cliënt_id = $_SESSION['id'];

    $berichten = new Chat();
    $berichten->sendMessageCliënt($message, $cliënt_id);
}
?>

