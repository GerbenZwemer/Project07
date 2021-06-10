<?php
session_start();
include('../../conn/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
<div class="formWrapper">
<div id="message">

</div>
    <form action="" method="post">
        <span>Welke allergie wilt u toevoegen?</span><br>
        <input type="text" name="allergie" id="allergie" placeholder="Allergie"><br>
        <input type="submit" name='toevoegen' value="Toevoegen" id="toevoegen">
    </form>
</div>
</body>
<?php
if(isset($_POST['toevoegen'])){
    $sql = "SELECT * FROM allergie WHERE allergie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['allergie']));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultaat) {
        echo "Allergie staat al in het systeem";
        
    }else{
        $sql = "INSERT INTO `allergie`(`allergie`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($_POST['allergie']));

        echo 'Allergie is toegevoegd';
    }
}
?>
</html>

