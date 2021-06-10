<?php
session_start();
require_once('../autoloader.php');

if($_SESSION['rol'] != 3){
    $user_id =  $_SESSION['gebruiker_id'];
    $huisarts_id = $_SESSION['huisarts'];
    $agenda = new Agenda();
    $agenda->getEventsClient($user_id, $huisarts_id);
}else{
    $user_id = $_SESSION['id'];
    $agenda = new Agenda();
    $agenda->getEvents($user_id);
}

?>