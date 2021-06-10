$(document).ready(function(){
    $("#inloggen").click(function(){
		event.preventDefault();
        var gebruikersnaam = $("#gebruikersnaam").val().trim();
        var wachtwoord = $("#wachtwoord").val().trim();
        if( gebruikersnaam != "" && wachtwoord != "" ){
            $.ajax({
                url:'pages/login.php',
                type:'post',
                data:{gebruikersnaam:gebruikersnaam,wachtwoord:wachtwoord},
                success:function(response){
                    var msg = "";
                    //als de response vanuit het bestand login.php 1 is
                    if(response == 1){
						msg = "wachtwoord en/of gebruikersnaam is incorrect.";
                    }
                    //als de response vanuit het bestand login.php 2 is                    
					if(response == 2){
						msg = "wachtwoord en/of gebruikersnaam is incorrect.";
                    }
                    //als de response vanuit het bestand login.php 0 is
                    if(response == 0){
                        window.location = "pages/home.php";
						$('#message').hide();
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});


