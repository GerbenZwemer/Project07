$(document).ready(function(){
    $("#consulttoevoegen").click(function(){
		event.preventDefault();
        var titel = $("#titel").val().trim();
        var consult = $("#consult").val().trim();
        var datum = $("#datum").val().trim();
        var cliënt_id = $("#cliënt_id").val().trim();

        if( titel != "" && consult != "" ){
            $.ajax({
                url:'consulttoevoegen.php',
                type:'post',
                data:{titel:titel,consult:consult,datum:datum,cliënt_id:cliënt_id},
                success:function(response){
                    var msg = "";
                    //als de response vanuit het bestand login.php 1 is
                    if(response == 1){
						msg = "Consult is toegevoegd";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});


