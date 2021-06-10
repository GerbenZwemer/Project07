$(document).ready(function(){
    $("#aanvragen").click(function(){
		event.preventDefault();
        var voornaam = $("#voornaam").val().trim();
        var achternaam = $("#achternaam").val().trim();
        var woonplaats = $("#woonplaats").val().trim();
        var straatnaam = $("#straatnaam").val().trim();
        var huisnummer = $("#huisnummer").val().trim();
        var postcode = $("#postcode").val().trim();
        if( voornaam, achternaam, woonplaats, straatnaam, huisnummer, postcode != "" ){
            $.ajax({
                url:'pages/register.php',
                type:'post',
                data:{voornaam:voornaam, 
                    achternaam:achternaam, 
                    woonplaats:woonplaats, 
                    straatnaam:straatnaam,
                    huisnummer:huisnummer,
                    postcode:postcode},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Uw gegevens staan al in ons systeem, als dit niet klopt neem dan contact op met 0612345678 of mail naar 123@gmail.com";
					}
					if(response == 2){
                        msg = "Uw aanvraag wordt verwerkt u krijgt binnenkort meer informatie.";
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


