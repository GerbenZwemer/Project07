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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>

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

    $sql = "SELECT * FROM cliënten";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultaat as $res) {
        ?> 
        <tr><form action='../koppelen/medischeinfokoppellen.php' method='POST'>
        <td><?php echo $res['voornaam']; ?></td>
        <td><?php echo $res['achternaam']; ?></td>
        <td><?php echo $res['polisnummer']; ?></td>
        <td><input type='hidden' name='cliëntid' value=<?php echo $res['id']; ?>></td>
        <td><input type='hidden' name='voornaamcliënt' value=<?php echo $res['voornaam']; ?>></td>
        <td><input type='submit' name='consult' value='Behandeling toevoegen'>
        </form>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>