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
    <title>Cliënten kaart</title>
</head>
<body>
<a href="../home.php">Home</a>
<?php
if($_SESSION['rol'] == 2){
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

    foreach($resultaat as $res){
        echo '<div class="cliënten">';
        echo $res['voornaam'];
        echo '<div class="cliënten">';
    }
}
?>
</body>
</html>