<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="../../js/jquery.datetimepicker.full.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/locales/nl.js"></script>
    <script src='../fullcalendar/lang/nl.js'></script>  

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'nl',
            initialView: 'dayGridMonth',
            headerToolbar:{
                start: 'title',
                center: 'dayGridMonth,timeGridWeek,timeGridDay',
                end: 'today prev,next',
            },
            businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5],
            startTime: '8:00',
            endTime: '18:00',
            },
            events:'load.php',
            selectable:true,
            nowIndicator:true,
            navLinks: true,
            weekNumbers: true,
            select: function(start, end, allDay){
                var title = prompt("Voer de titel van de afspraak in");
                if(title){
                    var start = $.fullCalendar.moment(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: "insert.php",
                        type: "post",
                        data: {title:title, afspraak:afspraak,start:start, end:end},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            swal(title,"Afspraak is toegevoegd", "success");
                        }
                    })
                }else{
                    swal(title,"Voeg een titel toe", "error");
                }
            },
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
        });
        calendar.render();
    });

    </script>
</head>
<body>
    <div class="container">
        <div id='calendar'></div>
    </div>
</body>
</html>