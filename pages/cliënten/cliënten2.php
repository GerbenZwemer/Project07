<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
    <?php
    $_SESSION['cliëntId'] = $_POST['cliëntid'];
    $_SESSION['voornaamcliënt'] = $_POST['voornaam'];
    $_SESSION['achternaam'] = $_POST['achternaam'];
    ?>
    <div class="formCliënt">
    <?php echo "Account van ".$_SESSION['voornaamcliënt']." ".$_SESSION['achternaam']; ?>
        <div class="formCliëntBtn">
            <form action='../koppelen/medischeinfokoppellen.php' method='POST'>
                <input type='hidden' name='cliëntid' value=<?php echo $_SESSION['cliëntId']; ?>>
                <td><input type='submit' name='consult' value='consult toevoegen'><br>
                <input type='submit' name='medicijn' value='Medicijnen toevoegen'><br>
                <input type='submit' name='aandoening' value='Aandoening toevoegen'><br>
                <input type='submit' name='profiel' value='Profiel'><br>
            </form>
            <form action="../agenda/afspraakmaken.php" method="GET">
                <input type='hidden' name='cliëntid' value=<?php echo $_SESSION['cliëntId']; ?>>
                <input type='hidden' name='voornaamCliënt' value=<?php echo $_SESSION['voornaamcliënt']; ?>>
                <input type="submit" name="agenda" value="Agenda"><br>
            </form>
            <form action="../beeldbank/documenten.php" method="GET">
                <input type='hidden' name='cliëntid' value=<?php echo $_SESSION['cliëntId']; ?>>
                <input type="submit" name="document" value="Dms"><br>
            </form>
        </div>
    </div>
</body>
</html>