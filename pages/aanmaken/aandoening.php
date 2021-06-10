<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/aandoening.js"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <title>Document</title>
</head>
<body>
<div class="formWrapper">
<div id="message">

</div>
    <form action="medicijntoevoegen1.php" method="post">
        <span>Welke aandoening wilt u toevoegen?</span><br>
        <input type="text" name="aandoening" id="aandoening" placeholder="Aandoening"><br>
        <input type="submit" value="Toevoegen" id="toevoegen">
    </form>
</div>
</body>
</html>