<?php
session_start();
require_once('../autoloader.php');

$user_id = $_SESSION['id'];

$agenda = new Agenda();
$agenda->moreInfo($user_id);
?>