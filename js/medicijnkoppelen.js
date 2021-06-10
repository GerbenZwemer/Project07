$(document).ready(function(){
    $("#toevoegen").click(function(){
		event.preventDefault();
        var medicijn = $("#medicijn").val().trim();
        var cliënt_id = $("#cliënt_id").val().trim();

        if( medicijn != "" && cliënt_id != "" ){
            $.ajax({
                url:'medicijnkoppelen.php',
                type:'post',
                data:{medicijn:medicijn,cliënt_id:cliënt_id},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						msg = "Medicijn is toegevoegd";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
