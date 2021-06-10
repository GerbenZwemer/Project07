<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale-all.js"></script>    
    <script>
    $(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            locale: 'nl',
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:'load.php',
            selectable:true,
            selectHelper:true,
            businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5],
            startTime: '8:00',
            endTime: '18:00',
            },
            nowIndicator:true,
            navLinks: true,
            weekNumbers: true,

            <?php 
            if($_SESSION['rol'] != 3){
            ?>
            select: function(start, end, allDay){
                var title = prompt("Voer de titel van de afspraak in");
                var afspraak = prompt("Voer de details van de afspraak in");
                if(title){
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: "insert.php",
                        type: "post",
                        data: {title:title, afspraak:afspraak, start:start, end:end},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            swal(title,"Afspraak is toegevoegd", "success");
                        }
                    })
                }else{
                    swal(title,"Voeg een titel toe", "error");
                }
            },
            <?php
            }else{
            ?>
            select: function(start, end, allDay){
                var title = prompt("Voer de titel van de afspraak in");
                if(title){
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: "insert.php",
                        type: "post",
                        data: {title:title, start:start, end:end},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            swal(title,"Afspraak is toegevoegd", "success");
                        }
                    })
                }else{
                    swal(title,"Voeg een titel toe", "error");
                }
            },
            <?php
            }
            ?>
            editable:true,
            eventResize:function(event){
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                url:"update.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function(){
                calendar.fullCalendar('refetchEvents');
                swal(title,"Afspraak is gewijzigd", "success");
                    }
                })
            },
            eventDrop:function(event){
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                        swal(title,"Afspraak is gewijzigd", "success");
                    }
                });
            },
            <?php 
            if($_SESSION['rol'] != 3){
            ?>
            eventClick:function(event){
                if(confirm("Are You sure you want to remove it?")){
                    var id = event.id;
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data:{id:id},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            swal("Verwijderd","Afspraak is verwijderd", "error");
                        }
                    })
                }
            },
            <?php
            }
            ?>
            <?php 
            if($_SESSION['rol'] == 3){
            ?>
            eventClick:function(event){
                    var id = event.id;
                    $.ajax({
                        url:"infoAfspraak.php",
                        type:"POST",
                        data:{id:id},
                        success:function(data){
                            if(!$.trim(data)){
                                swal("Er is geen extra informatie aan deze afspraak verbonden");
                            }else{
                                swal(data);
                            }
                        }
                    })
            },
            <?php
            }
            ?>
        });    
    });
    </script>
</head>
<body>
    <h2 class="d-flex justify-content-center"><?php echo 'Agenda van '.$_SESSION['naam']; ?></h2>
    <div class="container">
        <div id="calendar"></div>
    </div>
</body>
</html>