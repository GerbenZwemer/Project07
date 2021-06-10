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
    <title>Huisarts koppelen</title>
</head>
<body>
<a href="../home.php">Home</a>
    <?php
        $rol = $_SESSION['rol'];

        $stmt = $conn->prepare("SELECT * FROM huisartsen");
        $stmt->execute();
        $opt = "<select name='huisarts'>";
        $opt .= "<option disabled selected>Huisarts</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $opt .="<option value='".$row['id']."'>{$row['voornaam']}</option>";
        }
        $opt .= "</select>";

        ?>
        <div class="tableWrapper">
        <table class="table">
            <tr>
                <thead>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Huisarts</th>
                </thead>
            </tr>
        <?php
        $stmt = $conn->prepare("SELECT * FROM cliënten");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><form action='' method='POST'>";
            echo "<td>".$row['voornaam']."</td>";
            echo "<td>".$row['achternaam']."</td>";
            echo "<td>".$row['huisarts']."</td>";

            echo "<td>".$opt."</td>";
            echo "<input type=hidden name='id' value='".$row['id']."'>";
            echo "<td><input type='submit' name='submit' value='huisarts koppelen'></td>";
            echo "</form>";
            echo "</tr>";
        }
        if(isset($_POST['submit'])){
            if($stmt = $conn->prepare("UPDATE cliënten SET huisarts = ? WHERE id = ?")){
                $stmt->bindParam(1, $_POST['huisarts'], PDO::PARAM_STR, 255);
                $stmt->bindParam(2, $_POST['id'], PDO::PARAM_STR, 255);
                $stmt->execute();
                echo 'Huisarts is gekoppeld';
            }else{
                echo 'Er is iets fout gegaan';
            }

        }
    ?>
    </table>
    </div>
</body>
</html>