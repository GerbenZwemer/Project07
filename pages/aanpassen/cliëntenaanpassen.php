<?php
session_start();
include('../../conn/db.php');

if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>

<table class="table" style="color:white; background-color: rgba(86, 188, 134, 0.5);">
    <span>Cliënten</span>

    <?php
        $sql = 'SELECT * FROM cliënten';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <form action="" method="POST">
        <tr>
        <thead>
            <th scope="col">Voornaam</th>
            <th scope="col">tussenvoegsel</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Woonplaats</th>
            <th scope="col">Straatnaam</th>
            </thead>
            </tr>
            <tr>
                <td><input type="text" name="voornaam" id="" size="20" value="<?php echo $resultaat['voornaam']; ?>"></td>
                <td><input type="text" name="tussenvoegsel" id="" size="20" value="<?php echo $resultaat['tussenvoegsel']; ?>"></td>
                <td><input type="text" name="achternaam" id="" size="20" value="<?php echo $resultaat['achternaam']; ?>"></td>
                <td><input type="text" name="woonplaats" id="" size="20" value="<?php echo $resultaat['woonplaats']; ?>"></td>
                <td><input type="text" name="straatnaam" id="" size="20" value="<?php echo $resultaat['straatnaam']; ?>"></td>
            </tr>
            <tr>
        <thead>
            <th scope="col">Huisnummer</th>
            <th scope="col">Postcode</th>
            <th scope="col">Bloedgroep</th>
            <th scope="col">Polisnummer</th>
            <th scope="col">Telefoonnummer</th>
        </thead>
        </tr>
            <tr>
                <td><input type="text" name="huisnummer" id="" size="20" value="<?php echo $resultaat['huisnummer']; ?>"></td>
                <td><input type="text" name="postcode" id="" size="20" value="<?php echo $resultaat['postcode']; ?>"></td>
                <td><input type="text" name="bloedgroep" id="" size="20" value="<?php echo $resultaat['bloedgroep']; ?>"></td>
                <td><input type="text" name="polisnummer" id="" size="20" value="<?php echo $resultaat['polisnummer']; ?>"></td>
                <td><input type="text" name="telefoonnummer" id="" size="20" value="<?php echo $resultaat['telefoonnummer']; ?>"></td>
                <input type="hidden" name="id" value="<?php echo $resultaat['id'] ?>">
                <td><input type="submit" name="wijzigen" value="wijzigen"><br>
                <input type="submit" name="verwijderen" value="Verwijderen"></td>
            </tr>
            </form>
        <?php }

        if(isset($_POST['wijzigen'])){
            $sql = "UPDATE cliënten SET voornaam=?,tussenvoegsel=?,achternaam=?,woonplaats=?,straatnaam=?,
            huisnummer=?,postcode=?,bloedgroep=?,polisnummer=?,telefoonnummer=? WHERE id =?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($_POST['voornaam'],$_POST['tussenvoegsel'],$_POST['achternaam'],$_POST['woonplaats'],
            $_POST['straatnaam'],$_POST['huisnummer'],$_POST['postcode'],$_POST['bloedgroep'],$_POST['polisnummer'],$_POST['telefoonnummer'],$_POST['id']));
            echo 'Cliënt is gewijzigd';
            ?>
            <script>
                location.replace("cliëntenaanpassen.php");
            </script>
    <?php
        }if(isset($_POST['verwijderen'])){
            $sql = "DELETE FROM `cliënten` WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($_POST['id']));
            echo 'Cliënt is verwijderd';
            ?>
            <script>
                location.replace("cliëntenaanpassen.php");
            </script>
    <?php
        }
    ?>
</body>
</html>