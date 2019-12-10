<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS 4.4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-rfs/bootstrap-rfs.css" media="screen and (max-width: 1200px)">
  <style>
        .iwt{
        display:inline-block;
        }
      </style>
  <title>Solicitud</title>
</head>
<body>
<div class="container">
    @yield('content')
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

<script type="text/javascript">
    $(function (){
        for(var i = 1; i<=230; i++){
        $('#_numPersonas')
         .append($("<option></option>")
                    .attr("value",i)
                    .text(i));
        }
    });
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'L',
            locale: 'es',
            format:'DD/MM/YYYY'
        });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $(function () {
        $('#datetimepicker5').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $(function () {
        $('#datetimepicker6').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $(function () {
        $('#datetimepicker7').datetimepicker({
            format: 'LT',
            stepping: 30,
            enabledHours: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        });
    });
    $('.tablePerson tbody').on('click','.btn', function() {
        $(this).closest('tr').remove();
    });
</script>
</body>
</html>
