function buttonclick($i){
        var cliënt = $($i).val();
            $.ajax({
                url:'getchat.php',
                type:'post',
                data:{cliënt:cliënt}, 
                success:function(response){
                    var msg = response;
                    $("#Messages").html(msg);
                }
            });

}