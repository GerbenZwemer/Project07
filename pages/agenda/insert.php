<?php
session_start();
require_once('../autoloader.php');

if($_SESSION['rol'] != 3){
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $afspraak = $_POST['afspraak'];
    $user_id = $_SESSION['id'];
    $cliënt_id = $_SESSION['gebruiker_id'];
    $huisarts =  $_SESSION['huisarts'];

    $agenda = new Agenda();
    $agenda->addEventsClient($title, $start, $end, $afspraak, $cliënt_id, $huisarts);
}else{
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $user_id = $_SESSION['id'];

    $agenda = new Agenda();
    $agenda->addEvents($title, $start, $end, $user_id);
}

?>