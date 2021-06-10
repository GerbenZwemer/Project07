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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/medicijngehaald.js"></script>
    <title>Medicijnen</title>
</head>
<body>
<a href="../home.php">Home</a>
<div class="tableWrapper">
<table class="table">
    <tr>
        <thead>
            <th scope="col">Cliënt</th>
            <th scope="col">Medicijn</th>
        </thead>
    </tr>
    <?php
        $sql = "SELECT medicijn_cliënt.*, medicijnen.* FROM medicijn_cliënt 
        INNER JOIN medicijnen ON medicijn_cliënt.medicijn_id = medicijnen.medicijn_id WHERE medicijn_cliënt.opgehaald = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('nee'));
        $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultaat as $res) {
            $sql = "SELECT medicijn_cliënt.*, cliënten.* FROM medicijn_cliënt 
            INNER JOIN cliënten ON medicijn_cliënt.cliënt_id = cliënten.id WHERE cliënten.id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($res['cliënt_id']));
            $resultaat1 = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<tr>";
            echo "<td>".$resultaat1['voornaam']." ".$resultaat1['achternaam']."</td>";
            echo "<td>".$res['medicijn']."</td>";
            echo "<td>
            </td>";
            echo "</tr>";

        }

        if(isset($_POST['aanpassen'])){
            $sql = "UPDATE `medicijn_cliënt` SET opgehaald = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($_POST['opgehaald'],$_POST['id']));

            $page = $_SERVER['PHP_SELF'];
            $sec = "0";
            header("Refresh: $sec; url=$page");
        }
       
    ?>
</table>
</div>
</body>
</html>