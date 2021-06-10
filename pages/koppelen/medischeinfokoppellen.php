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
    <title>Document</title>
</head>
<body>
<a href="../home.php">Home</a>
<?php
if (isset($_POST['consult'])){ ?>
    <script type="text/javascript" src="../../js/consult.js"></script>
    <div class="formWrapper">
    <div id="message" style="color:white;">
    </div>
        <span style="color:white;">consult toevoegen bij cliënt</span>
        <span style="color:white;"><?php echo $_SESSION['voornaamcliënt']; ?></span>
        <form action="consulttoevoegen.php" method="post">
            <input type="text" name='titel' id="titel" placeholder="Titel"><br>
            <textarea name="consult" id="consult" cols="30" rows="10" placeholder="consult"></textarea><br>
            <input type="date" name="datum" id="datum"><br>
            <input type="hidden" name="cliënt_id" id="cliënt_id" value="<?php echo $_SESSION['cliëntId']; ?>">
            <input type="submit" name="consulttoevoegen" id="consulttoevoegen" value="toevoegen">
        </form>
        <script>
        var field = document.querySelector('#datum');
        var date = new Date();
        field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
</script>
    </div>
<?php }if(isset($_POST['medicijn'])){
    $sql = "SELECT * FROM medicijnen";
    $stmt = $conn->prepare($sql);
    $stmt->execute(); ?>
    <script type="text/javascript" src="../../js/medicijnkoppelen.js"></script>
    <div class="formWrapper">
        <div id="message" style="color:white;">
        </div>
        <span style="color:white;">Medicijn toevoegen bij cliënt</span>
        <span style="color:white;"><?php echo $_SESSION['voornaamcliënt']; ?></span>
        <form action="medicijnkoppelen.php" method="post">
            <input type="hidden" name="cliënt_id" id="cliënt_id" value="<?php echo $_SESSION['cliëntId']; ?>">
            <select name="medicijn" id="medicijn"> 
                <option value="Medicijn" selected='true' disabled>Medicijn</option>
                <?php
                while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $resultaat['medicijn_id']; ?>"><?php echo $resultaat['medicijn']; ?></option>
                <?php
                } ?> 
            </select><br>
            <input type="submit" name="toevoegen" id="toevoegen" value="toevoegen">
        </form>
    </div>
    <?php
}if(isset($_POST['aandoening'])){
    $sql = "SELECT * FROM aandoening";
    $stmt = $conn->prepare($sql);
    $stmt->execute(); ?>
    <script type="text/javascript" src="../../js/aandoeningkoppelen.js"></script>
    <div class="formWrapper">
        <div id="message" style="color:white;">
        </div>
        <span style="color:white;">Aandoening toevoegen bij cliënt</span>
        <span style="color:white;"><?php echo $_SESSION['voornaamcliënt']; ?></span>
        <form action="aandoeningkopellen.php" method="post">
            <input type="hidden" name="cliënt_id" id="cliënt_id" value="<?php echo $_SESSION['cliëntId']; ?>">
            <select name="aandoening" id="aandoening"> 
                <option value="Medicijn" selected='true' disabled>Aandoening</option>
                <?php
                while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $resultaat['aandoening_id']; ?>"><?php echo $resultaat['aandoening']; ?></option>
                <?php
                } ?> 
            </select><br>
            <input type="submit" name="toevoegen" id="toevoegen" value="toevoegen">
        </form>
    </div>
    <?php
}if(isset($_POST['profiel'])){
    ?>
    <div class="tableWrapper">
    <table class="table" style="color:white">
        <thead>
            <tr style="color:white;">
                <th scope="col">Titel</th>
                <th scope="col">Consult</th>
                <th scope="col">Datum</th>
            </tr>
        </thead>
    <?php
    $sql = "SELECT * FROM consulten WHERE cliënt_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['cliëntid']));

    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultaat as $res) {
        echo '<tr>';
        echo '<td>'.$res['Titel']."</td>";
        echo '<td>'.$res['consult']."</td>";
        echo '<td>'.$res['datum'].'</td>';
        echo '</tr>';
    } ?>
    </table>
    </div>
    <div class="tableWrapper">
    <table class="table" style="color:white">
        <thead>
            <tr style="color:white;">
                <th scope="col">Medicijn id</th>
                <th scope="col">Medicijn</th>
            </tr>
        </thead>
    <?php
    $sql = "SELECT medicijn_cliënt.*, medicijnen.* FROM medicijn_cliënt 
    INNER JOIN medicijnen ON medicijn_cliënt.medicijn_id = medicijnen.medicijn_id WHERE medicijn_cliënt.`cliënt_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['cliëntid']));
    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultaat as $res){
        echo '<tr>';
        echo '<td>'.$res['medicijn_id']."<td>";
        echo '<td>'.$res['medicijn']."</td>";
        echo '</tr>';
    } ?>
    </table>
    </div>
    <div class="tableWrapper">
    <table class="table" style="color:white">
        <thead>
            <tr style="color:white;">
                <th scope="col">Aandoening id</th>
                <th scope="col">Aandoening</th>
            </tr>
        </thead>
    <?php
    $sql = "SELECT aandoening_cliënt.*, aandoening.* FROM aandoening_cliënt 
    INNER JOIN aandoening ON aandoening_cliënt.aandoening_id = aandoening.aandoening_id WHERE aandoening_cliënt.`cliënt_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['cliëntid']));
    $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultaat as $res){
        echo '<td>'.$res['aandoening_id']."<td>";
        echo '<td>'.$res['aandoening']."</td>";
    }
    echo '</table>';
    echo '</div>';
}
?>
</body>
</html>