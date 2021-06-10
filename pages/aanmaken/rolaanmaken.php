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
    <link rel="stylesheet" href="../../css/home.css">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../../js/rolaanmaken.js"></script>
    <title>Rol aanmaken</title>
</head>
<body>
<div class="formWrapper" style="margin-top:40px;">
    <div id="message" style="color:white;">
        
    </div>
    <form action="rolaanmaken1.php" method="post">
        <span style="color:white;">Welke rol wilt u aanmaken?</span><br>
        <input type="text" name="rol" id="rol" placeholder="Naam rol"><br>
        <input type="submit" value="Aanmaken" id="aanmaken">
    </form>
</div>
</body>
</html>