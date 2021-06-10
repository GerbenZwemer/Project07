<?php
session_start();
include('../conn/db.php');
//selecteerd de nodige data in het database
if($stmt = $conn->prepare("SELECT gebruiker_id, wachtwoord, rol_id FROM users WHERE gebruikersnaam = :gebruikersnaam")){
	$stmt->bindParam(':gebruikersnaam', $_POST['gebruikersnaam'], PDO::PARAM_STR, 255);
	$stmt->execute();
	$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
//gebruiker word ingelogd als het gebruikersnaam en wachtwoord in het database staan	
	if($resultaat){
        $id = $resultaat['gebruiker_id'];
        $password = $resultaat['wachtwoord'];
		if(password_verify($_POST['wachtwoord'], $password)){
			$_SESSION['loggedin'] = true;
			$_SESSION['naam'] = $_POST['gebruikersnaam'];
			$_SESSION['id'] = $id;
			$_SESSION['rol'] = $resultaat['rol_id'];
			echo'0';
		}else{
			echo'2';
		}
	}else{
		echo'1';
	}
}
?>