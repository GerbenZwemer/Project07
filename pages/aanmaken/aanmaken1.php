<?php
session_start();
include('../../conn/db.php');

if($_SESSION['loggedin'] != true){
    session_destroy();
    header("LOCATION: ../../");
    exit;
}
$rol = $_SESSION['rol'];
$rol = $_SESSION['rolnaam'];
if(isset($_POST['toevoegen'])){
    if($rol == 'cliënt'){
        $sql = "SELECT * FROM `cliënten` WHERE gebruikersnaam_gebruiker = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['gebruikersnaam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `cliënten`(`voornaam`, `tussenvoegsel`, `achternaam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `bloedgroep`, `polisnummer`, `telefoonnummer`, `gebruikersnaam_gebruiker`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
                $stmt->execute(array($_POST['voornaam'],$_POST['tussenvoegsel'],$_POST['achternaam'],
                $_POST['woonplaats'],$_POST['straat'],$_POST['huisnummer'],
                $_POST['postcode'],$_POST['bloedgroep'],$_POST['polisnummer'],$_POST['telefoonnummer'], $_POST['gebruikersnaam']));
                echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }

    if($rol == 'huisarts'){
        $sql = "SELECT * FROM `huisartsen` WHERE gebruikersnaam_gebruiker = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['gebruikersnaam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `huisartsen`(`voornaam`, `tussenvoegsel`, `achternaam`, `telefoonnummer`, `gebruikersnaam_gebruiker`) 
            VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
            $stmt->execute(array($_POST['voornaam'],$_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['telefoonnummer'], $_POST['gebruikersnaam']));
            echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }

    if($rol == 'specialist'){
        $sql = "SELECT * FROM `specialisten` WHERE gebruikersnaam_gebruiker = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['gebruikersnaam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `specialisten`(`voornaam`, `tussenvoegsel`, `achternaam`, `telefoonnummer`, `gebruikersnaam_gebruiker`) 
            VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
            $stmt->execute(array($_POST['voornaam'],$_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['telefoonnummer'], $_POST['gebruikersnaam']));
            echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }

    if($rol == 'ziekenhuis'){
        $sql = "SELECT * FROM `ziekenhuizen` WHERE naam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['naam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `ziekenhuizen`(`naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`) 
            VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
            $stmt->execute(array($_POST['naam'],$_POST['woonplaats'], $_POST['straat'], $_POST['huisnummer'], $_POST['postcode'], $_POST['telefoonnummer'], $_POST['email']));
            echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }

    if($rol == 'apotheek'){
        $sql = "SELECT * FROM `apotheek` WHERE naam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['naam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `apotheek`(`naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`, `gebruikersnaam_gebruiker`) 
            VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
            $stmt->execute(array($_POST['naam'],$_POST['woonplaats'], $_POST['straat'], $_POST['huisnummer'], $_POST['postcode'], $_POST['telefoonnummer'], $_POST['email'], $_POST['gebruikersnaam']));
            echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }
    
    if($rol == 'verzekering'){
        $sql = "SELECT * FROM `verzekering` WHERE naam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['naam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
            echo 1;
        }else{
            $sql = "INSERT INTO `verzekering`(`naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`, `gebruikersnaam_gebruiker`) 
            VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            try{
            $stmt->execute(array($_POST['naam'],$_POST['woonplaats'], $_POST['straat'], $_POST['huisnummer'], $_POST['postcode'], $_POST['telefoonnummer'], $_POST['email'], $_POST['gebruikersnaam']));
            echo 2;
            }catch(PDOException $e){
                echo 3;
            }
        }
    }

    if($rol == 'cliënt' || $rol == 'huisarts' || $rol == 'specialist' || $rol == 'apotheek' || $rol == 'verzekering'){
        if($rol == 'cliënt'){
            $rol = 3;
        }
        if($rol == 'huisarts'){
            $rol = 2;
        }
        if($rol == 'specialist'){
            $rol = 4;
        }
        if($rol == 'apotheek'){
            $rol = 6;
        }
        if($rol == 'verzekering'){
            $rol = 31;
        }
        $sql = "SELECT * FROM `users` WHERE gebruikersnaam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['gebruikersnaam']));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){
    
        }else{
            if($stmt = $conn->prepare("INSERT INTO `users`(`gebruikersnaam`, `wachtwoord`, `email`, `rol_id`) 
            VALUES (?,?,?,?)")){
                $wachtwoordH = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
                $rol;
                $stmt->bindParam(1, $_POST['gebruikersnaam'], PDO::PARAM_STR, 255);
                $stmt->bindParam(2, $wachtwoordH, PDO::PARAM_STR, 255);
                $stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR, 255);
                $stmt->bindParam(4, $rol, PDO::PARAM_INT);
                $stmt->execute();          
            }
        }
    }
} 
?>