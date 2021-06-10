<?php
require_once('../autoloader.php');

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$id = $_POST['id'];

$agenda = new Agenda();
$agenda->updateEvents($title, $start, $end, $id);
?>