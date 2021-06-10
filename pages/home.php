<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/01280dcfc0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home.css">
    <title>Dashboard</title>
</head>
<body>
    <div id="wrapper">
        <?php
        session_start();
        include('../conn/db.php');

        if($_SESSION['loggedin'] != true){
            session_destroy();
            header("LOCATION: ../");
            exit;
        }else{
            $id = $_SESSION['id'];
                $sql = "SELECT users.gebruiker_id, users.gebruikersnaam, users.rol_id, gebruikers_rechten.rol, gebruikers_rechten.recht_id FROM users 
                INNER JOIN gebruikers_rechten ON users.rol_id = gebruikers_rechten.rol WHERE users.gebruiker_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount()===0){
                
            }else{
                ?>
                <input type="checkbox" id="toggle">  
                <div id="header">
                    <label for="toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <img src="../img/logo.png" class="logo" alt="">
                </div>
                <div id="content">
                    <a href="uitloggen.php">Uitloggen</a>
                    <h1>Hallo <?php echo $_SESSION['naam']; ?> welkom op de applicatie</h1>
                </div> 
                <div id="menu">
                    <ul>
                        <li><a href="">Home</a></li>
                        <?php
                        foreach ($resultaat as $res) {
                            $rechten =  $res ['recht_id'];
                            $_SESSION['rechten'] = $rechten;
                            $rol = $res ['rol_id'];
                            $_SESSION['rol'] = $rol;
                            if($rechten == 1){
                                $rol = 'cliënt';
                                echo '<li><a href="aanmaken/aanmaakForm.php?rol=cliënt">Cliënt toevoegen</a></li>';
                            }if($rechten == 2){
                                echo '<li><a href="aanmaken/aanmaakForm.php?rol=huisarts">Huisarts toevoegen</a></li>';
                            }if($rechten == 3){
                                echo '<li><a href="aanmaken/aandoening.php">aandoening toevoegen</a></li>';
                            }if($rechten == 4){
                                echo '<li><a href="cliënten/behandeling.php">Behandeling toevoegen</a></li>';
                            }if($rechten == 8){
                                echo '<li><a href="apotheek/medicijnAanvraag.php">Medicatie per patiënt zien</a></li>';
                            }   
                            if($rechten == 9){
                                echo '<li><a href="rollen/gebruikersgroep.php">Rechten aanpassen</a></li>';
                            } 
                            if($rechten == 11){
                                echo '<li><a href="aanmaken/aanmaken.php">Gebruikers toevoegen</a></li>';
                            }
                            if($rechten == 12){
                                echo '<li><a href="koppelen/huisartskoppelen.php">Huisarts koppelen</a></li>';
                            }
                            if($rechten == 13){
                                echo '<li><a href="aanmaken/aanmaken.html">Verzekering koppelen</a></li>';
                            }
                            if($rechten == 14){
                                echo '<li><a href="aanmaken/aanmaken.html">Medicatie toevoegen</a></li>';
                            }
                            if($rechten == 15){
                                echo '<li><a href="aanmaken/aanmaken.html">Apotheek toevoegen</a></li>';
                            }
                            if($rechten == 16){
                                echo '<li><a href="aanmaken/aanmaken.html">Ziekenhuis toevoegen</a></li>';
                            }
                            if($rechten == 17){
                                echo '<li><a href="cliënten/cliënten1.php">Cliënten</a></li>';
                            }
                            if($rechten == 18){
                                echo '<li><a href="webapp/webapp.php">Web app</a></li>';
                            }
                            if($rechten == 19){
                                echo '<li><a href="cliënten/medicatie.php">Medicatie per patiënt</a></li>';
                            }
                            if($rechten == 20){
                                echo '<li><a href="aanpassen/cliëntenaanpassen.php">Cliënt aanpassen</a></li>';
                            }
                            if($rechten == 21){
                                echo '<li><a href="aanpassen/huisartsenaanpassen.php">Huisartsen aanpassen</a></li>';
                            }
                            if($rechten == 22){
                                echo '<li><a href="aanpassen/medischspecialistaanpassen.php">Medisch specialist aanpassen</a></li>';
                            }
                            if($rechten == 23){
                                echo '<li><a href="aanpassen/apotheekaanpassen.php">Apotheek aanpassen</a></li>';
                            }
                            if($rechten == 24){
                                echo '<li><a href="aanpassen/ziekenhuisaanpassen.php">Ziekenhuis aanpassen</a></li>';
                            }
                            if($rechten == 25){
                                echo '<li><a href="aanmaken/rolaanmaken.php">Gebruikersgroep toevoegen</a></li>';
                            }
                            if($rechten == 26){
                                echo '<li><a href="beddenbezetting/infobedden.php">info beddenbezetting</a></li>';
                            }
                            if($rechten == 27){
                                echo '<li><a href="beddenbezetting/beddenbezetting.php">Bedden bezetten</a></li>';
                            }
                            if($rechten == 28){
                                echo '<li><a href="aanpassen/gebruikersaanpassen.php">Gebruikers aanpassen</a></li>';
                            }
                            if($rechten == 29){
                                echo '<li><a href="HAPchat/chat.php">HAP chat</a></li>';
                            }
                        }
                        ?>      
                    </ul>
                </div>
                <?php
            }

            ?>
    </div>
    </body>
    </html>
    <?php
}
?>
