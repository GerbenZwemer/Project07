<?php
require_once('../autoloader.php');
require_once('agenda.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afspraak maken</title>
</head>
<body>
    <?php
    $huisarts = $_SESSION['naam'];
    ?>
    <?php
    $db = new db();
    $query = "SELECT cliënten.*, users.* FROM cliënten INNER JOIN users on cliënten.gebruikersnaam_gebruiker = users.gebruikersnaam WHERE cliënten.voornaam = ?";
    $cliënt = $db->execute($query, array($_GET['voornaamCliënt']));
    foreach($cliënt as $clnt){
        echo $_SESSION['gebruiker_id'] = $clnt['gebruiker_id'];
    }
    $query = "SELECT * FROM huisartsen WHERE gebruikersnaam_gebruiker = ?";
    $huisartsen = $db->getAll($query, array($huisarts));
    foreach($huisartsen as $huisarts){
        echo $_SESSION['huisarts'] = $huisarts['id'];
    }
    ?>
</body>
</html>