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
        $sql = 'SELECT users.*, rollen.* FROM users 
        INNER JOIN rollen ON users.rol_id = rollen.rol_id';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        

        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <form action="" method="POST">
        <tr>
        <thead>
            <th scope="col">Gebruikersnaam</th>
            <th scope="col">Wachtwoord</th>
            <th scope="col">email</th>
            <th scope="col">rol</th>
            <th scope="col">rol_id</th>
            </thead>
            </tr>
            <tr>
                <td><input type="text" name="gebruikersnaam" id="" size="20" value="<?php echo $resultaat['gebruikersnaam']; ?>"></td>
                <td><input type="text" name="wachtwoord" id="" size="20" value="<?php echo $resultaat['wachtwoord']; ?>"></td>
                <td><input type="text" name="email" id="" size="20" value="<?php echo $resultaat['email']; ?>"></td>
                <td><?php echo $resultaat['rol']; ?></td>
                <td><input type="text" name="rol_id" id="" size="20" value="<?php echo $resultaat['rol_id']; ?>"></td>
                <input type="hidden" name="id" value="<?php echo $resultaat['gebruiker_id'] ?>">
                <td><input type="submit" name="wijzigen" value="wijzigen">                
                <input type="submit" name="verwijderen" value="Verwijderen"></td>

            </tr>
            </form>
        <?php }

       
if(isset($_POST['wijzigen'])){
    $sql = "UPDATE users SET gebruikersnaam=?,wachtwoord=?,email=?,rol_id=? WHERE gebruiker_id =?";
    $stmt = $conn->prepare($sql);
    $wachtwoordH = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $stmt->execute(array($_POST['gebruikersnaam'],$wachtwoordH,$_POST['email'],$_POST['rol_id'],$_POST['id']));
    echo 'Gebruiker is gewijzigd';
    ?>
    <script>
        location.replace("gebruikersaanpassen.php");
    </script>
<?php
}if(isset($_POST['verwijderen'])){
    $sql = "DELETE FROM `users` WHERE gebruiker_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['id']));
    echo 'Gebruiker is verwijderd';
    ?>
    <script>
        location.replace("gebruikersaanpassen.php");
    </script>
<?php
}
?>
</body>
</html>