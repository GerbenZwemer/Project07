$(document).ready(function(){
    setInterval(function(){
        $.ajax({
            url:"getchatRealTime.php",
            method: "POST",
            success:function(data){
                $("#Messages").html(data);
            }
        });
    }, 5000);
});