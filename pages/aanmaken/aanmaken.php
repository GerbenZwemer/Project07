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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/aanmaakform.js"></script>   
    <link rel="stylesheet" href="../../css/home.css">        
    <title>Aanmaken</title>
</head>
<body>
<a href="../home.php">Home</a>
    <form action="aanmaakForm.php" method="post">
        <div class="formWrapper">
        <div id="message">

        </div>
        <strong><label for="rol">Wat voor soort gebruiker wilt u toevoegen?</label><strong><br>
        <select name="rol" id="rol" class="rolOption">
            <option value="cliënt">Cliënt</option>
            <option value="huisarts">Huisarts</option>
            <option value="specialist">Medisch specialist</option>
            <option value="ziekenhuis">Ziekenhuis</option>
            <option value="apotheek">Apotheek</option>
            <option value="verzekering">Verzekering</option>
        </select>
        <input type="submit" name="laden" id="laden" value="Aanmaak formulier laden">
    </form>
    <div id="aanmaakForm">

    </div>
</div>
</body>
</html>