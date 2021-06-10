<?php
session_start();
include('../../conn/db.php');

$sql = "SELECT * FROM allergie";
$stmt = $conn->prepare($sql);
$stmt->execute(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>
<div class="formWrapper">
    <div id="message" style="color:white;">
    </div>
    <span style="color:white;">Allergie toevoegen bij cliënt</span>
    <span style="color:white;"><?php echo $_SESSION['voornaamcliënt']; ?></span>
    <form action="" method="post">
        <input type="hidden" name="cliënt_id" id="cliënt_id" value="<?php echo $_SESSION['cliëntId']; ?>">
        <select name="allergie" id="allergie"> 
            <option value="allergie" selected='true' disabled>Allergie</option>
            <?php
            while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $resultaat['allergie_id']; ?>"><?php echo $resultaat['allergie']; ?></option>
            <?php
            } 
            ?> 
        </select><br>
        <input type="submit" name="toevoegen" id="toevoegen" value="toevoegen">
    </form>
</div>
<?php
    $query = 'SELECT * FROM cliënten WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->execute(array($_SESSION['cliëntId']));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
    $woonplaats = $resultaat['woonplaats'];
 

if(isset($_POST['toevoegen'])){
    $sql = "INSERT INTO allergie_woonplaats (allergie_id, woonplaats, cliënt_id) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['allergie'],$woonplaats,$_POST['cliënt_id']));
    echo "Allergie is toegevoegd";
}
?>
</body>