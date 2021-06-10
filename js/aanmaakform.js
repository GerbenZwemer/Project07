$(document).ready(function(){
    $("#laden").click(function(){
		event.preventDefault();
        var rol = $("#rol").val().trim();
        var submit = $("#laden").val();
        if( rol != ""){
            $.ajax({
                url:'aanmaakForm.php',
                type:'post',
                data:{rol:rol, submit:submit}
                }).done(function(response){ 
                $("#aanmaakForm").html(response);
            });
        }
    });
});

