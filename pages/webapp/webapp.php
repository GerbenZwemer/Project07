<?php
session_start();
include('../../conn/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webapp</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<div data-role="page" id="home" data-theme="b">
		<div data-role="header" data-theme="b">
			<h1>Medische web app</h1>
			<div class="ui-nodisc-icon" data-theme="b">
			</div>
        </div>
        <div data-role="main" class="ui-content" data-theme="b">
			<a href="#medicatie" class="ui-btn ui-corner-all ui-btn-b">Medicatie</a>
			<a href="#aandoeningen" class="ui-btn ui-corner-all">Aandoeningen</a>
			<a href="#consulten" class="ui-btn ui-corner-all">Consulten</a>
		</div>		
        <div data-role="footer" data-position="fixed">
        </div>
</div>
<!--Pages-->
<div data-role="page" id="medicatie" data-theme="b">
		<div data-role="header" data-theme="b">
			<h1>Medicatie</h1>
			<div class="ui-nodisc-icon" data-theme="b">
            <a href="#home" class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-back 
				ui-btn-left ui-shadow ui-btn-icon-notext ui-corner-all ui-btn-c" data-theme="c">Option</a>
			</div>
        </div>
        <div data-role="main" class="ui-content" data-theme="b">

        <table data-role="table" class="ui-responsive table-stroke">
        <thead>
            <tr>
                <th>Medicatie in bezit</th>
            </tr>
        </thead>
        <?php
        $sql = "SELECT users.*, cliënten.* FROM users INNER JOIN cliënten ON users.gebruikersnaam = cliënten.gebruikersnaam_gebruiker WHERE users.gebruiker_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($_SESSION['id']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $resultaat['id'];

        $sql = "SELECT medicijn_cliënt.*, medicijnen.* FROM medicijn_cliënt 
        INNER JOIN medicijnen ON medicijn_cliënt.medicijn_id = medicijnen.medicijn_id WHERE cliënt_id = ? AND opgehaald = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id, 'ja'));
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$resultaat['medicijn']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
        <table data-role="table" class="ui-responsive table-stroke">
        <thead>
            <tr>
                <th>Nog op te halen medicatie</th>
            </tr>
        </thead>
        <?php
        $sql = "SELECT medicijn_cliënt.*, medicijnen.* FROM medicijn_cliënt 
        INNER JOIN medicijnen ON medicijn_cliënt.medicijn_id = medicijnen.medicijn_id WHERE cliënt_id = ? AND opgehaald = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id, 'nee'));
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$resultaat['medicijn']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
			<a href="#aandoeningen" class="ui-btn ui-corner-all">Aandoeningen</a>
			<a href="#consulten" class="ui-btn ui-corner-all">Consulten</a>
		</div>		
        <div data-role="footer" data-position="fixed">
        </div>
</div>

<div data-role="page" id="aandoeningen" data-theme="b">
		<div data-role="header" data-theme="b">
        <a href="#home" class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-back 
				ui-btn-left ui-shadow ui-btn-icon-notext ui-corner-all ui-btn-c" data-theme="c">Option</a>
			<h1>Aandoeningen</h1>
			<div class="ui-nodisc-icon" data-theme="b">
			</div>
        </div>
        <div data-role="main" class="ui-content" data-theme="b">
        <table data-role="table" class="ui-responsive table-stroke">
        <thead>
            <tr>
                <th>Aandoeningen</th>
            </tr>
        </thead>
        <?php
        $sql = "SELECT aandoening_cliënt.*, aandoening.* FROM aandoening_cliënt 
        INNER JOIN aandoening ON aandoening_cliënt.aandoening_id = aandoening.aandoening_id WHERE cliënt_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id));
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$resultaat['aandoening']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
			<a href="#medicatie" class="ui-btn ui-corner-all ui-btn-b">Medicatie</a>
			<a href="#consulten" class="ui-btn ui-corner-all">Consulten</a>
		</div>		
        <div data-role="footer" data-position="fixed">
        </div>
</div>

<div data-role="page" id="consulten" data-theme="b">
		<div data-role="header" data-theme="b">
        <a href="#home" class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-back 
				ui-btn-left ui-shadow ui-btn-icon-notext ui-corner-all ui-btn-c" data-theme="c">Option</a>
			<h1>Consulten</h1>
			<div class="ui-nodisc-icon" data-theme="b">
			</div>
        </div>
        <div data-role="main" class="ui-content" data-theme="b">
        <table data-role="table" class="ui-responsive table-stroke">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Omschrijving</th>
                <th>Datum</th>
            </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM `consulten` WHERE cliënt_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id));
        while ($resultaat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$resultaat['Titel']."</td>";
            echo "<td>".$resultaat['consult']."</td>";
            echo "<td>".$resultaat['datum']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
			<a href="#medicatie" class="ui-btn ui-corner-all ui-btn-b">Medicatie</a>
			<a href="#aandoeningen" class="ui-btn ui-corner-all">Aandoeningen</a>
		</div>		
        <div data-role="footer" data-position="fixed">
        </div>
</div>
</body>
</html>