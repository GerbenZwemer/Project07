<?php
session_start();
include('../../conn/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" name="wijzigenRol">
    <?php
    $sql = $conn->prepare("SELECT * FROM users");
    $sql->execute();

    while ($row = $sql->fetch(PDO::FETCH_ASSOC))
    {
        echo '<input type="text" value="'.$row["gebruiker_id"].'">';
        echo '<input type="text" value="'.$row["gebruikersnaam"].'">';
        echo '<input type="text" value="'.$row["email"].'">';
        echo '<input type="text" value="'.$row["rol_id"].'">';
        echo '<input type="submit" value="Bijwerken"><br>';
    }
    ?>
</form><br>
</body>
</html>