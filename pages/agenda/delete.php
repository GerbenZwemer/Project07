<?php
require_once('../autoloader.php');

$id = $_POST['id'];

$agenda = new Agenda();
$agenda->deleteEvents($id);
?>