<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css">
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/bootstrap@4.3.0/main.min.css">
    <title>Calendario</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 pt-2 mt-4">
                <div id="calendar"></div>
            </div>
        </div>

    </div>
    <!-- calendar modal -->
    <div id="modal-view-event" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
                    <div class="event-body"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/list@4.3.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.3.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/core@4.3.1/locales/es.js"></script>
    <script>

        function buildData(){
            var schedules = {!! json_encode($schedules->toArray(), JSON_HEX_TAG) !!};
            console.log(schedules);

            var arrayData = [];
            var scheduleLength = Object.keys(schedules).length;
            Object.values(schedules).map(schedule => {
                var data = {};
                data.title = schedule.name_activity;
                var _start = schedule.activity_date + 'T' + schedule.entry_time;
                var _end = schedule.activity_date + 'T' + schedule.departure_time;
                var _description = 'Responsable: '+schedule.name_person+ ' '+ schedule.last_name_person+ ' <br>Telefono: '+ schedule.office_phone;
                data.start = _start;
                data.end = _end;
                data.description = _description;
                arrayData.push(data);
            });
            console.log(arrayData);
            return arrayData;
        }
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'bootstrap'],
            defaultView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            /* FORMATO DEL DATO
            title: 'Prueba de evento 1',
            start: '2020-01-15T08:00:00',
            end: '2020-01-15T12:00:00',
            description: 'Responsable: Nombre <br> Telefono: Numer' */
            events: buildData(),
            eventClick: function(info) {
                    $('.event-title').html(info.event.title);
                    $('.event-body').html(info.event.extendedProps.description);
                    $('#modal-view-event').modal();
            }
        });
        calendar.render();
        });
    </script>
</body>
</html>
