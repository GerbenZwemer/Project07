<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/home.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="../../js/chat.js"></script>
    <?php
        session_start();
        require_once('../autoloader.php');
        $rol = $_SESSION['rol'];
    ?>
</head>
<body>
<a href="../home.php">Home</a>
<div id="informatie"></div>
<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Chats</h4>
                    </div>
                </div>
                <div class="inbox_chat">
                    <?php
                    if($rol != 3){
                    $clienten = new Chat();
                    $clienten->getCliënt();
                    }
                    ?>
                </div>
            </div>
            <div class="mesgs">
                <div id="Messages" class="msg_history">
                    <?php
                if($rol == 3){  
                    ?>
                    <script src="../../js/getchat.js"></script>
                    <?php                      
                        $gebruikersnaam =  $_SESSION['naam'];
                        $id = $_SESSION['id'];
                        $berichten = new Chat();
                        $berichten->getMessagesCliënt($gebruikersnaam, $id);
                    }
                    ?>
                </div>
                <div class="type_msg">
                    <form class="input_msg_write" method="POST" action="">
                        <input type="text" class="write_msg" name="message" id="message" placeholder="Type a message">
                        <button type="submit" class='medischeInfo' type="submit" id="info" name="info"><i class='fa fa-info-circle medischeInfoLink' aria-hidden='true'></i></button>
                        <button type="submit" class="msg_send_btn" id="send" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $("#send").click(function(){
            event.preventDefault();
            var message = $("#message").val().trim();
                $.ajax({
                    url:'sendchat.php',
                    type:'post',
                    data:{message:message},
                    success:function(response){
                        $("#message").html(response);
                        document.getElementById("message").value = "";
                    }
                });
        });
        $("#info").click(function(){
            event.preventDefault();
            var info = $("#info").val().trim();
                $.ajax({
                    url:'sendchat.php',
                    type:'post',
                    data:{info:info},
                    success:function(response){
                    var msg = response;
                    $("#informatie").html(msg);
                    }
                });
        });
    </script>   
</body>
</html>