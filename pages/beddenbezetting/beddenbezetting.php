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
<div id="content">
    <a href="../home.php">Home</a>
    <?php
        $stmt = $conn->prepare("SELECT * FROM cliënten");
        $stmt->execute();
        $optcliënt = "<select name='cliënt'>";
        $optcliënt .= "<option disabled selected>Cliënt</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $optcliënt .= '<option value="'.$row['id'].'">'.$row['voornaam']." ".$row['achternaam'].'</option>';
        }
        $optcliënt .= "</select>";

        $stmt = $conn->prepare("SELECT * FROM bed");
        $stmt->execute();
        $optbed = "<select name='bed' class='bed'>";
        $optbed .= "<option disabled selected>Bed</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $optbed .= '<option value="'.$row['id'].'">'.$row['omschrijving'].'</option>';
        }
        $optbed .= "</select>";

        $stmt = $conn->prepare("SELECT * FROM kamer");
        $stmt->execute();
        $optkamer = "<select name='kamer' class='kamer'>";
        $optkamer .= "<option disabled selected>Kamer</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $optkamer .= '<option value="'.$row['id'].'">'.$row['kamer'].'</option>';
        }
        $optkamer .= "</select>";
    ?>
    <div class="formWrapper">
    <form action="beddenbezetting1.php" method="post">
        Cliënt <?php echo $optcliënt; ?><br>
        Bed <?php echo $optbed; ?><br>
        Kamer <?php echo $optkamer; ?><br>
        Begindatum <input type="date" name='begindatum' required><br>
        Begintijd <input type="time" name='begintijd' required><br>
        Einddatum <input type="date" name='einddatum' required><br>
        Eindtijd <input type="time" name='eindtijd' required><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
    </div>
</div>
</body>
</html>