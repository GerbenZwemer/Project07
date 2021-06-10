$(document).ready(function(){
    $("#toevoegen").click(function(){
		event.preventDefault();
        var medicijn = $("#medicijn").val().trim();
        if( medicijn != "" ){
            $.ajax({
                url:'medicijntoevoegen1.php',
                type:'post',
                data:{medicijn:medicijn},
                success:function(response){
                    var msg = "";
                    console.log(response);
                    if(response == 1){
						msg = "Dit medicijn staat al in ons systeem";
					}
					if(response == 2){
                        msg = "Het medicijn is toegevoegd";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});

