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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/aanmaken.php"></script>           
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
    <body>
    <?php
    if(isset($_POST['submit'])){
        $_SESSION['rol'] = $_POST['rol'];
        $rol = $_POST['rol'];
    }else{
        $rol = $_GET['rol'];
        echo '<a href="../home.php">Home</a>';
        echo '<div class="formWrapper">';
        echo $rol;
        $_SESSION['rolnaam'] = $rol;
    }
    ?>
    <div id="message">

    </div>
        <form action="aanmaken1.php" id="patiënt" method="POST">
            <?php
            if($rol == 'ziekenhuis' || $rol == 'apotheek' || $rol == 'verzekering'){
            ?>
                <input type="text" id="naam" name="naam" placeholder="Naam"><br>                  
            <?php
            }
            if($rol == 'cliënt' || $rol == 'huisarts' || $rol == 'specialist'){
            ?>
                <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam">
                <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="tussenvoegsel">
                <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam"><br>
            <?php
            }
            if($rol == 'cliënt' || $rol == 'ziekenhuis' || $rol == 'apotheek' || $rol == 'verzekering'){
            ?>
                <input type="text" id="woonplaats" name="woonplaats" placeholder="Woonplaats">
                <input type="text" id="straat" name="straat" placeholder="Straatnaam"><br>
                <input type="text" id="huisnummer" name="huisnummer" placeholder="Huisnummer">
                <input type="text" id="postcode" name="postcode" placeholder="Postcode"><br>
                    <?php
                    if($rol == 'cliënt'){
                    ?>
                        <select id="bloedgroep" name="bloedgroep">
                            <option selected="true" disabled>Bloedgroep</option>
                            <option value="a+">A+</option>
                            <option value="a-">A-</option>
                            <option value="ab+">AB+</option>
                            <option value="ab-">AB-</option>
                            <option value="o+">O+</option>
                            <option value="o-">O-</option>
                            <option value="b+">B+</option>
                            <option value="b-">B-</option>
                        </select>
                        <input type="text" id="polisnummer" name="polisnummer" placeholder="Polisnummer"><br>
            <?php
                }
            }
            ?>
            <input type="text" id="telefoonnummer" name="telefoonnummer" placeholder="Telefoonnummer">
            <input type="text" id="email" name="email" placeholder="E-mail"><br>
            <?php
            if($rol == 'cliënt' || $rol == 'huisarts' || $rol == 'specialist' || $rol == 'apotheek' || $rol == 'verzekering'){
            ?>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam">
                <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord"><br>
            <?php
            }
            ?>
            <input type="submit" name="toevoegen" id="toevoegen" value="Toevoegen">
        </form>
        <div>
    </body>
</html>