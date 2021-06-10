$(document).ready(function(){
    $("#toevoegen").click(function(){
		event.preventDefault();
        var aandoening = $("#aandoening").val().trim();
        if( aandoening != "" ){
            $.ajax({
                url:'aandoening1.php',
                type:'post',
                data:{aandoening:aandoening},
                success:function(response){
                    var msg = "";
                    console.log(response);
                    if(response == 1){
						msg = "Deze aandoening al in ons systeem";
					}
					if(response == 2){
                        msg = "De aandoening is toegevoegd";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});

