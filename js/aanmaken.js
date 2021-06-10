$(document).ready(function(){
    $("#toevoegen").click(function(){
        event.preventDefault();
        var huisarts = $("#patiënt").val().trim();
       if(huisarts != ""){
            var voornaamHuisarts = $("#voornaamHuisarts").val().trim();
            var achternaamHuisarts = $("#achternaamHuisarts").val().trim();
            var telefoonummerHuisarts = $("#telefoonummerHuisarts").val().trim();
            var emailHuisarts = $("#emailHuisarts").val().trim();
            var gebruikersnaamHuisarts = $("#gebruikersnaamHuisarts").val().trim();
            var wachtwoordHuisarts = $("#wachtwoordHuisarts").val().trim();

            $.ajax({
                url:'aanmaken.php',
                type:'post',
                data:{voornaamHuisarts:voornaamHuisarts,achternaamHuisarts:achternaamHuisarts,
                    telefoonummerHuisarts:telefoonummerHuisarts,emailHuisarts:emailHuisarts,
                    gebruikersnaamHuisarts:gebruikersnaamHuisarts,wachtwoordHuisarts:wachtwoordHuisarts},
                success:function(response){
                    var msg = "";
                    console.log(response);
                    msg = response;
                    //als de response vanuit het bestand login.php 1 is
                    if(response == 1){
						msg = "Huisarts bestaat al";
                    }
                    //als de response vanuit het bestand login.php 2 is                    
					if(response == 2){
						msg = "Er is iets fout gegaan";
                    }
                    //als de response vanuit het bestand login.php 0 is
                    if(response == 0){
						msg = "Huisarts is toegevoegd"
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});


