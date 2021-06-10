<?php
session_start();
include('../conn/db.php');

if($stmt = $conn->prepare("SELECT * FROM aanvraag WHERE voornaam = ? AND achternaam = ?")){
    $stmt->bindParam(1, $_POST['voornaam'], PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $_POST['achternaam'], PDO::PARAM_STR, 255);
	$stmt->execute();
	$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($resultaat){
        echo 1;
		}else{
			if($stmt = $conn->prepare("INSERT INTO `aanvraag`(`voornaam`, `achternaam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`) 
            VALUES (?,?,?,?,?,?)")){
                $stmt->bindParam(1, $_POST['voornaam'], PDO::PARAM_STR, 255);
                $stmt->bindParam(2, $_POST['achternaam'], PDO::PARAM_STR, 255);
                $stmt->bindParam(3, $_POST['woonplaats'], PDO::PARAM_STR, 255);
                $stmt->bindParam(4, $_POST['straatnaam'], PDO::PARAM_STR, 255);
                $stmt->bindParam(5, $_POST['huisnummer'], PDO::PARAM_STR, 255);
                $stmt->bindParam(6, $_POST['postcode'], PDO::PARAM_STR, 255);
                $stmt->execute();
                echo 2;
            }else{
                echo 3;
            }
		}
    }
?>