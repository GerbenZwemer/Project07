<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    require_once('../autoloader.php');

    $grafiek = new Grafiek;
    $grafiek->getWoonplaast();

    if(isset($_POST['woonplaats'])){
        $woonplaats = $_POST['woonplaats'];
        $grafiek->getAllergie($woonplaats);
    }
    ?>
</body>
</html>