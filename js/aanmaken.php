<?php 
session_start();
?>
$(document).ready(function(){
    $("#toevoegen").click(function(){
		event.preventDefault();
        var rol = "<?php echo $_SESSION['rol']; ?>";
        var rol = "<?php echo $_SESSION['rolnaam']; ?>";
        if(rol == 'cliënt'){
            var voornaam = $("#voornaam").val().trim();
            var tussenvoegsel = $("#tussenvoegsel").val().trim();
            var achternaam = $("#achternaam").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var email = $("#email").val().trim();
            var gebruikersnaam = $("#gebruikersnaam").val().trim();
            var wachtwoord = $("#wachtwoord").val().trim();
            var woonplaats = $("#woonplaats").val().trim();
            var straat = $("#straat").val().trim();
            var huisnummer = $("#huisnummer").val().trim();
            var postcode = $("#postcode").val().trim();
            var bloedgroep = $("#bloedgroep").val().trim();
            var polisnummer = $("#polisnummer").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{voornaam:voornaam,tussenvoegsel:tussenvoegsel,achternaam:achternaam,telefoonnummer:telefoonnummer,
                    email:email,gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord,
                    woonplaats:woonplaats,straat:straat,huisnummer:huisnummer,postcode:postcode,bloedgroep:bloedgroep,polisnummer:polisnummer,rol:rol,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "cliënt bestaat al.";
					}
					if(response == 2){
                        msg = "Cliënt is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }

        if(rol == 'huisarts'){
            var voornaam = $("#voornaam").val().trim();
            var tussenvoegsel = $("#tussenvoegsel").val().trim();
            var achternaam = $("#achternaam").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var email = $("#email").val().trim();
            var gebruikersnaam = $("#gebruikersnaam").val().trim();
            var wachtwoord = $("#wachtwoord").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{voornaam:voornaam,tussenvoegsel:tussenvoegsel,achternaam:achternaam,telefoonnummer:telefoonnummer,email:email,gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord,rol:rol,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Huisarts bestaat al";
					}
					if(response == 2){
                        msg = "Huisarts is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }

        if(rol == 'specialist'){
            var voornaam = $("#voornaam").val().trim();
            var tussenvoegsel = $("#tussenvoegsel").val().trim();
            var achternaam = $("#achternaam").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var email = $("#email").val().trim();
            var gebruikersnaam = $("#gebruikersnaam").val().trim();
            var wachtwoord = $("#wachtwoord").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{voornaam:voornaam,tussenvoegsel:tussenvoegsel,achternaam:achternaam,telefoonnummer:telefoonnummer,email:email,gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord,rol:rol,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Medisch specialist bestaat al";
					}
					if(response == 2){
                        msg = "Medisch specialist is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }

        if(rol == 'ziekenhuis'){
            var naam = $("#naam").val().trim();
            var woonplaats = $("#woonplaats").val().trim();
            var straat = $("#straat").val().trim();
            var huisnummer = $("#huisnummer").val().trim();
            var postcode = $("#postcode").val().trim();
            var email = $("#email").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{naam:naam,woonplaats:woonplaats,straat:straat,huisnummer:huisnummer,postcode:postcode,
                    telefoonnummer:telefoonnummer,email:email,rol:rol,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Ziekenhuis bestaat al";
					}
					if(response == 2){
                        msg = "Ziekenhuis is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }

        if(rol == 'apotheek'){
            var naam = $("#naam").val().trim();
            var woonplaats = $("#woonplaats").val().trim();
            var straat = $("#straat").val().trim();
            var huisnummer = $("#huisnummer").val().trim();
            var postcode = $("#postcode").val().trim();
            var email = $("#email").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var gebruikersnaam = $("#gebruikersnaam").val().trim();
            var wachtwoord = $("#wachtwoord").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{naam:naam,woonplaats:woonplaats,straat:straat,huisnummer:huisnummer,postcode:postcode,
                    telefoonnummer:telefoonnummer,email:email,rol:rol,gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Apotheek bestaat al";
					}
					if(response == 2){
                        msg = "Apotheek is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }

        if(rol == 'verzekering'){
            var naam = $("#naam").val().trim();
            var woonplaats = $("#woonplaats").val().trim();
            var straat = $("#straat").val().trim();
            var huisnummer = $("#huisnummer").val().trim();
            var postcode = $("#postcode").val().trim();
            var email = $("#email").val().trim();
            var telefoonnummer = $("#telefoonnummer").val().trim();
            var gebruikersnaam = $("#gebruikersnaam").val().trim();
            var wachtwoord = $("#wachtwoord").val().trim();
            var toevoegen = $("#toevoegen").val().trim();
            $.ajax({
                url:'aanmaken1.php',
                type:'post',
                data:{naam:naam,woonplaats:woonplaats,straat:straat,huisnummer:huisnummer,postcode:postcode,
                    telefoonnummer:telefoonnummer,email:email,rol:rol,gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord,toevoegen:toevoegen},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "verzekering bestaat al";
					}
					if(response == 2){
                        msg = "verzekering is toegevoegd";
                    }
                    if(response == 3){
						msg = "Er is iets fout gegaan probeer het later nog een keer opnieuw";
					}
                    $("#message").html(msg);
                }
            });
        }
        
    });
});
