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


    <?php
        $sql = 'SELECT * FROM apotheek';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <form action="" method="POST">
        <tr>
        <thead>
            <th scope="col">Naam</th>
            <th scope="col">Woonplaats</th>
            <th scope="col">Straat</th>
            <th scope="col">Huisnummer</th>
            <th scope="col">Postcode</th>
            <th scope="col">Telefoonnummer</th>
            <th scope="col">email</th>

            </thead>
            </tr>
            <tr>
                <td><input type="text" name="naam" id="" size="" value="<?php echo $resultaat['naam']; ?>"></td>
                <td><input type="text" name="woonplaats" id="" size="20" value="<?php echo $resultaat['woonplaats']; ?>"></td>
                <td><input type="text" name="straatnaam" id="" size="20" value="<?php echo $resultaat['straatnaam']; ?>"></td>
                <td><input type="text" name="huisnummer" id="" size="20" value="<?php echo $resultaat['huisnummer']; ?>"></td>
                <td><input type="text" name="postcode" id="" size="20" value="<?php echo $resultaat['postcode']; ?>"></td>
                <td><input type="text" name="telefoonnummer" id="" size="20" value="<?php echo $resultaat['telefoonnummer']; ?>"></td>
                <td><input type="text" name="email" id="" size="20" value="<?php echo $resultaat['email']; ?>"></td>

                <input type="hidden" name="id" value="<?php echo $resultaat['id'] ?>">
                <td><input type="submit" name="wijzigen" value="wijzigen">                
                <input type="submit" name="verwijderen" value="Verwijderen"></td>

            </tr>
            </form>
        <?php }

       
if(isset($_POST['wijzigen'])){
    $sql = "UPDATE apotheek SET naam=?,woonplaats=?,straatnaam=?,huisnummer=?,postcode=?,telefoonnummer=?,telefoonnummer=? WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['naam'],$_POST['woonplaats'],$_POST['straatnaam'],$_POST['huisnummer'],$_POST['postcode'],$_POST['telefoonnummer'],$_POST['email'],$_POST['id']));
    echo 'Apotheek is gewijzigd';
    ?>
    <script>
        location.replace("apotheekaanpassen.php");
    </script>
<?php
}if(isset($_POST['verwijderen'])){
    $sql = "DELETE FROM `apotheek` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['id']));
    echo 'Apotheek is verwijderd';
    ?>
    <script>
        location.replace("apotheekaanpassen.php");
    </script>
<?php
}
?>
</body>
</html>