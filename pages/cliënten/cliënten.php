<?php
session_start();
include('../../conn/db.php');

if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>
<?php
if($_SESSION['rol'] == 2){
?>
<table class="table" style="color:white; background-color: rgba(86, 188, 134, 0.5);">
    <tr>
        <thead>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Polisnummer</th>
            <th scope="col">Actie</th>
        </thead>
    </tr>
    <?php

    $gebruikersnaam = $_SESSION['naam'];

    $sql = "SELECT * FROM huisartsen WHERE gebruikersnaam_gebruiker = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($gebruikersnaam));

    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    $huisartsId = $resultaat['id'];

    $sql = "SELECT * FROM cliënten WHERE huisarts = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($huisartsId));
    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultaat as $res) {
        ?> 
        <tr><form action='../koppelen/medischeinfokoppellen.php' method='POST'>
            <td><?php echo $res['voornaam']; ?></td>
            <td><?php echo $res['achternaam']; ?></td>
            <td><?php echo $res['polisnummer']; ?></td>
            <td><input type='hidden' name='cliëntid' value=<?php echo $res['id']; ?>></td>
            <td><input type='hidden' name='voornaamcliënt' value=<?php echo $res['voornaam']; ?>></td>
            <td><input type='submit' name='consult' value='consult toevoegen'>
            <input type='submit' name='medicijn' value='Medicijnen toevoegen'>
            <input type='submit' name='aandoening' value='Aandoening toevoegen'>
            <input type='submit' name='profiel' value='Profiel'>
        </form>
        <form action="../agenda/afspraakmaken.php" method="post">
            <input type='hidden' name='cliëntid' value=<?php echo $res['id']; ?>>
            <input type="submit" name="agenda" value="Agenda">
        </form>
        <form action="../beeldbank/documenten.php" method="GET">
            <input type='hidden' name='cliëntid' value=<?php echo $res['id']; ?>>
            <input type="submit" name="document" value="Dms">
        </form>
        </td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
}if($_SESSION['rol'] == 31){ ?>
<div class="tableWrapper">
    <table class="table" style="color:white; background-color: rgba(86, 188, 134, 0.5);">
    <tr>
        <thead>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Polisnummer</th>
        </thead>
    </tr>
    <?php

    $gebruikersnaam = $_SESSION['naam'];

    $sql = "SELECT * FROM verzekering WHERE gebruikersnaam_gebruiker = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($gebruikersnaam));

    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    $verzekering_id = $resultaat['id'];

    $sql = "SELECT * FROM cliënten WHERE verzekering = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($verzekering_id));
    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultaat as $res) {
        ?> 
        <tr><form action='../koppelen/medischeinfokoppellen.php' method='POST'>
        <td><?php echo $res['voornaam']; ?></td>
        <td><?php echo $res['achternaam']; ?></td>
        <td><?php echo $res['polisnummer']; ?></td>
        <td><input type='hidden' name='cliëntid' value=<?php echo $res['id']; ?>></td>
        <td><input type='hidden' name='voornaamcliënt' value=<?php echo $res['voornaam']; ?>></td>

        </form>
        </tr>
    <?php
    }
    ?>
</table>
</div>
<?php
}
?>
</body>
</html>
