$(document).ready(function(){
    $("#toevoegen").click(function(){
		event.preventDefault();
        var aandoening = $("#aandoening").val().trim();
        var cliënt_id = $("#cliënt_id").val().trim();

        if( aandoening != "" && cliënt_id != "" ){
            $.ajax({
                url:'aandoeningkopellen.php',
                type:'post',
                data:{aandoening:aandoening,cliënt_id:cliënt_id},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Aandoening is toegevoegd";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
