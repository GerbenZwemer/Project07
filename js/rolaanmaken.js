$(document).ready(function(){
    $("#aanmaken").click(function(){
		event.preventDefault();
        var rol = $("#rol").val().trim();
        if( rol != "" ){
            $.ajax({
                url:'rolaanmaken1.php',
                type:'post',
                data:{rol:rol},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "De rol die u probeert aan te maken staat al in het systeem";
					}else{
                        msg = response;
                    }
                    $("#message").html(msg);
                }
            });
        }else{
            msg = "U moet iets invullen";
            $("#message").html(msg);
        }
    });
});


