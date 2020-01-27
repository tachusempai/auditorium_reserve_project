  function veriTransporte() {
    if ($('#pr4').is(":checked")) {
        $('#previo').show();
        $('#despues').hide();
    }
    if ($('#pr4-1').is(":checked")) {
        $('#despues').show();
        $('#previo').hide();
    }
    if ($('#pr4-2').is(":checked")) {
        $('#despues').show();
        $('#previo').show();
    }
    if ($('#pr4-3').is(":checked")) {
        $('#despues').hide();
        $('#previo').hide();
    }

}

function addPerson(){
    $("#alertPerson").attr("hidden",true);
    var name = $('#inname').val();
    var lastname = $('#inlastname').val();
    var injob = $('#injob').val();
    if (name != '' && lastname != '' && injob != ''){
        $('#tablePerson').append(
            "<tr>"
                + "<td>" + name + "</td>"
                + "<td>" + lastname + "</td>"
                + "<td>" + injob + "</td>"
                + "<td> <button type='button' class='btn btn-dark'>Eliminar</button> </td>" +
            "</tr>"
        );
        $('#inname').val('');
        $('#inlastname').val('');
        $('#injob').val('');
    } else{
        $("#alertPerson").attr("hidden",false);
    }

}

function addSchedule(){
    /* $("#alertSchedule").attr("hidden",true); */
    var _fecha = $('#_fecha').val();
    var _horaIng = $('#_horaIng').val();
    var _horaSal = $('#_horaSal').val();
    var _horaIni = $('#_horaIni').val();
    var _horaFin = $('#_horaFin').val();
    var _opcionSeguridad = $('#formHorario input[name=pregunta4]:checked').val();
    if (_fecha != '' && _horaIng != '' && _horaSal != '' && _horaIni != '' && _horaFin != '' && _opcionSeguridad != undefined){
        if(_opcionSeguridad == '_no'){
            $('#tableSchedule').append(
                "<tr>"
                    + "<td>" + _fecha + "</td>"
                    + "<td>" + _horaIng + "</td>"
                    + "<td>" + _horaSal + "</td>"
                    + "<td>" + _horaIni + "</td>"
                    + "<td>" + _horaFin + "</td>"
                    + "<td>" + "N/A" + "</td>"
                    + "<td>" + "N/A" + "</td>"
                    + "<td> <button type='button' class='btn btn-dark'>Eliminar</button> </td>" +
                "</tr>"
            );
        } else {
            if(_opcionSeguridad == '_previamente'){
                var _previamente = $('#_horaIngTrans').val();
                $('#tableSchedule').append(
                    "<tr>"
                         + "<td>" + _fecha + "</td>"
                        + "<td>" + _horaIng + "</td>"
                        + "<td>" + _horaSal + "</td>"
                        + "<td>" + _horaIni + "</td>"
                        + "<td>" + _horaFin + "</td>"
                        + "<td>" + _previamente + "</td>"
                        + "<td>" + "N/A" + "</td>"
                        + "<td> <button type='button' class='btn btn-dark'>Eliminar</button> </td>" +
                    "</tr>"
                );
            } else {
                if(_opcionSeguridad == '_despues'){
                    var _despues = $('#_horaSalTrans').val();
                    $('#tableSchedule').append(
                        "<tr>"
                             + "<td>" + _fecha + "</td>"
                            + "<td>" + _horaIng + "</td>"
                            + "<td>" + _horaSal + "</td>"
                            + "<td>" + _horaIni + "</td>"
                            + "<td>" + _horaFin + "</td>"
                            + "<td>" + "N/A" + "</td>"
                            + "<td>" + _despues + "</td>"
                            + "<td> <button type='button' class='btn btn-dark'>Eliminar</button> </td>" +
                        "</tr>"
                    );
                } else {
                    if(_opcionSeguridad == '_ambas'){
                        var _previamente = $('#_horaIngTrans').val();
                        var _despues = $('#_horaSalTrans').val();
                        $('#tableSchedule').append(
                            "<tr>"
                                 + "<td>" + _fecha + "</td>"
                                + "<td>" + _horaIng + "</td>"
                                + "<td>" + _horaSal + "</td>"
                                + "<td>" + _horaIni + "</td>"
                                + "<td>" + _horaFin + "</td>"
                                + "<td>" + _previamente + "</td>"
                                + "<td>" + _despues + "</td>"
                                + "<td> <button type='button' class='btn btn-dark'>Eliminar</button> </td>" +
                            "</tr>"
                        );
                    }
                }
            }
        }
        $('#_fecha').val('');
        $('#_horaIng').val('');
        $('#_horaSal').val('');
        $('#_horaIni').val('');
        $('#_horaFin').val('');
        $('#formHorario input[name=pregunta4]').prop('checked', false);
        $('#despues').hide();
        $('#previo').hide();
    } else{
        $("#alertSchedule").attr("hidden",false);
    }

}
var schedule = [];
function getTableSchedule(){
    let arrayGeneral = [];
    let horario = [];
    $('#tablaHorarios > table > tbody > tr').each(function() {
        horario = [];
        $(this).children('td').each(function(){
          horario.push($(this).html());
        })
        arrayGeneral.push(horario);
      });
      console.log(arrayGeneral);
      schedule = arrayGeneral;
}

var securityPeople = [];
function getTableSecurityPeople(){
    let arrayGeneral = [];
    let people = [];
    $('#tablaPersonas > table > tbody > tr').each(function() {
        people = [];
        $(this).children('td').each(function(){
            people.push($(this).html());
        })
        arrayGeneral.push(people);
      });
      console.log(arrayGeneral);
      securityPeople = arrayGeneral;
}

function eliminar(code){
    codes = '#'+code;
    $(codes).remove();
}

function veri() {
    if ($('#pr1').is(":checked")) {
        $('#agregaPersonas').show();
    } else {
        $('#agregaPersonas').hide();
    }
}

var prueba;

function loaded(event) {
    $('#successfulMsg').hide();
    $('#tipAc').hide();
    $('#formularioReserva').hide();
    $('#_datosResponsable').hide();
    $('#_horarioActividad').hide();
    $('#_detallesActividad').hide();
    $('#formularioReserva').hide();
    $('#_detallesSeguridad').hide();
    $('#_btnSiguienteHorario').hide();
    $('#_btnAtrasHorario').hide();
    $('#_btnSiguienteActividad').hide();
    $('#_btnAtrasActividad').hide();
    $('#_btnSiguienteSeguridad').hide();
    $('#_btnAtrasSeguridad').hide();
    $('#agregaPersonas').hide();
    $('#despues').hide();
    $('#previo').hide();
}

function aceptaTerminos() {
    if ($('#invalidCheck').is(":checked")) {
        $('#cua').hide();
        $('#tipAc').show();
        $('#_horaIng').val('');
        $('#_horaSal').val('');
        $('#_horaIni').val('');
        $('#_horaFin').val('');
    } else {
        $('#terminos').addClass("was-validated");
    }
}

function confirmaTipo() {
    if ($('[name="_tipoActividad"]').is(':checked')) {
        quitaValidacionResponsable();
        $("#formResponsable")[0].reset();
        $('#tipAc').hide();
        $('#formularioReserva').show();
        $('#_datosResponsable').show();
        $('#_btnSiguienteResponsable').show();
        $('#_btnAtrasResponsable').show();
    } else {
        $('#tiposA').addClass(" was-validated");
    }
}

function atrasResponsable() {
    $('input[name="_tipoActividad"]').prop('checked', false);
    $('#tiposA').removeClass("was-validated");
    $('#tipAc').show();
    $('#formularioReserva').hide();
    $('#_datosResponsable').hide();

}

function siguienteResponsable() {
    validaResponsable();
    if (prueba != 1) {
        quitaValidacionHorario();
        $('#_datosResponsable').hide();
        $('#_horarioActividad').show();
        $('#_btnSiguienteResponsable').hide();
        $('#_btnAtrasResponsable').hide();
        $('#_btnSiguienteHorario').show();
        $('#_btnAtrasHorario').show();
    }
}

function atrasHorario() {
    $('#formResponsable').removeClass("was-validated");
    $('#_btnSiguienteResponsable').show();
    $('#_btnAtrasResponsable').show();
    $('#_btnSiguienteHorario').hide();
    $('#_btnAtrasHorario').hide();
    $('#_datosResponsable').show();
    $('#_horarioActividad').hide();
}

function siguienteHorario() {
    getTableSchedule();
    if (schedule.length != 0){
        $('#pr4').prop('required',false);
        $('#pr4-1').prop('required',false);
        $('#pr4-2').prop('required',false);
        $('#pr4-3').prop('required',false);
        validaHorario();
        if (prueba != 1) {
            quitaValidacionActividad();
            $('#_horarioActividad').hide();
            $('#_detallesActividad').show();
            $('#_btnSiguienteHorario').hide();
            $('#_btnAtrasHorario').hide();
            $('#_btnSiguienteActividad').show();
            $('#_btnAtrasActividad').show();
        }
    }
    else {
        alert ('favor agregar al menos un horario');
    }
}

function atrasActividad() {
    $('#formHorario').removeClass("was-validated");
    $('#_btnSiguienteHorario').show();
    $('#_btnAtrasHorario').show();
    $('#_btnSiguienteActividad').hide();
    $('#_btnAtrasActividad').hide();
    $('#_horarioActividad').show();
    $('#_detallesActividad').hide();
}

function siguienteActividad() {
    validaActividad();
    if (prueba != 1) {
        quitaValidacionSeguridad();
        $('#_detallesActividad').hide();
        $('#_detallesSeguridad').show();
        $('#_btnSiguienteActividad').hide();
        $('#_btnAtrasActividad').hide();
        $('#_btnSiguienteSeguridad').show();
        $('#_btnAtrasSeguridad').show();
    }
}

function atrasSeguridad() {
    $('#formActividad').removeClass("was-validated");
    $('#_btnSiguienteActividad').show();
    $('#_btnAtrasActividad').show();
    $('#_btnSiguienteSeguridad').hide();
    $('#_btnAtrasSeguridad').hide();
    $('#_detallesActividad').show();
    $('#_detallesSeguridad').hide();
}



function siguienteSeguridad() {
    getTableSecurityPeople();
    var _participaSeguridad =  $('input[name=pregunta1]:checked').val();
    if ((securityPeople.length !=0 && _participaSeguridad == 'si') || _participaSeguridad == 'no'){
        if (_participaSeguridad == 'no'){
            securityPeople = null;
        }
        validaSeguridad();
        if (prueba != 1) {
            quitaValidacionSeguridad();
            $('#_detallesActividad').hide();
            $('#_detallesSeguridad').show();
            $('#_btnSiguienteActividad').hide();
            $('#_btnAtrasActividad').hide();
            $('#_btnSiguienteSeguridad').show();
            $('#_btnAtrasSeguridad').show();
            submitTotal();
        }
    }
    else {
        alert ('favor agregar al menos una persona si requiere seguridad');
    }


}

function fetchFormTipo() {
    var tipoActividad = $('#tiposA input[name=_tipoActividad]:checked').val();
    var numeroSolicitud = $('#_numeroSolicitud').text();
    return form1 = {
        numeroSolicitud: numeroSolicitud,
        tipoActividad: tipoActividad
    }
}

function fetchFormResponsable() {
    var _nombre = $("#_nombre").val();
    var _apellidos = $("#_apellidos").val();
    var _puesto = $("#_puesto").val();
    var _area = $("#_area").val();
    var _telOficina = $("#_telOficina").val();
    var _celular = $("#_celular").val();
    var _unidad = $("#_unidad").val();
    var _correo = $("#_correo").val();
    return form2 = {
        _nombre: _nombre,
        _apellidos: _apellidos,
        _puesto: _puesto,
        _area: _area,
        _telOficina: _telOficina,
        _celular: _celular,
        _unidad: _unidad,
        _correo: _correo
    }
}

function fetchFormHorario() {
    var _areaExtra = $('#_areaExtra').val();
    return form3 = {
        _horarios: schedule,
        _areaExtra: _areaExtra
    }
}

function fetchFormActividad() {
    var _nameActividad = $('#_nameActividad').val();
    var _numPersonas = $("#_numPersonas option:selected").val();
    var _areaArtistica = $('#_areaArtistica').val();
    var _objActividad = $('input[name=objActividad]:checked').val();
    if (_objActividad == 'otro') {
        _objActividad = $('#oth').val();
    }
    return form4 = {
        _nameActividad: _nameActividad,
        _numPersonas: _numPersonas,
        _areaArtistica: _areaArtistica,
        _objActividad: _objActividad
    }
}

function fetchFormSeguridad(){
    var _atencionEspecial = $('input[name=pregunta2]:checked').val();
    var _abiertaPublico = $('input[name=pregunta3]:checked').val();
    return form5 = {
        _personasSeguridad: securityPeople,
        _atencionEspecial: _atencionEspecial,
        _abiertaPublico: _abiertaPublico
    }


}

function validateSchedule(){
    $("#alertScheduleSame").attr("hidden",true);
    $("#alertSchedule").attr("hidden",true);
    var _fecha = $('#_fecha').val();
    var _horaIng = $('#_horaIng').val();
    var _horaSal = $('#_horaSal').val();
    var _horaIni = $('#_horaIni').val();
    var _horaFin = $('#_horaFin').val();
    var _opcionSeguridad = $('#formHorario input[name=pregunta4]:checked').val();
    var token = $('#_token').text();
    if (_fecha != '' && _horaIng != '' && _horaSal != '' && _horaIni != '' && _horaFin != '' && _opcionSeguridad != undefined){
        $.ajax({
            headers: {
                'X-CSRF-Token': token
            },
            url: '/reservation/schedule',
            type: 'POST',
            data: {
                fecha: _fecha,
                horaIng: _horaIng,
                horaSal: _horaSal,
                _token: token
            },
            dataType: 'json',
            success: function (data) {
                //alert(data);
                console.log(data);
                if(data['response'] == "aceptado"){
                    addSchedule();
                }
                else $("#alertScheduleSame").attr("hidden",false);
            }
        });
    } else{
        $("#alertSchedule").attr("hidden",false);
    }

}

function submitTotal() {
    var formTipo = fetchFormTipo();
    var formResponsable = fetchFormResponsable();
    var formHorario = fetchFormHorario();
    var formActividad = fetchFormActividad();
    var formSeguridad = fetchFormSeguridad();
    var token = $('#_token').text();
    $.ajax({
        headers: {
            'X-CSRF-Token': token
        },
        url: '/reservation',
        type: 'POST',
        data: {
            formTipo: formTipo,
            formResponsable: formResponsable,
            formHorario: formHorario,
            formActividad: formActividad,
            formSeguridad: formSeguridad,
            _token: token
        },
        dataType: 'json',
        success: function (data) {
            //alert(data);
            console.log(data);
            successful(data['response']);
        }
    });
}

function successful(num) {
    /* var numeroSolicitud = $('#_numeroSolicitud').text(); */
    var numeroSolicitud = num;
    $('#successfulNumSol').text( numeroSolicitud);
    $('#generalForm').remove();
    $('#successfulMsg').show();
}

function quitaValidacionSeguridad() {
    var forms = document.getElementsByClassName('formSeguridad');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.classList.remove('was-validated');
    });
}

function quitaValidacionActividad() {
    var forms = document.getElementsByClassName('formActividad');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.classList.remove('was-validated');
    });
}

function quitaValidacionResponsable() {
    var forms = document.getElementsByClassName('formResponsable');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.classList.remove('was-validated');
    });
}

function quitaValidacionHorario() {
    var forms = document.getElementsByClassName('formHorario');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.classList.remove('was-validated');
    });
}

function validaResponsable() {
    var forms = document.getElementsByClassName('formResponsable');
    var validation = Array.prototype.filter.call(forms, function (form) {

        if (form.checkValidity() === false) {
            prueba = 1;
            form.classList.add('was-validated');
        } else prueba = 0;
    });
}

function validaHorario() {
    var forms = document.getElementsByClassName('formHorario');
    var validation = Array.prototype.filter.call(forms, function (form) {

        if (form.checkValidity() === false) {
            prueba = 1;
            form.classList.add('was-validated');
        } else prueba = 0;
    });
}

function validaActividad() {
    var obj = $('input[name=objActividad]:checked').val();
    if (obj == 'otro' || obj == undefined) {
        $("#oth").prop('required', true);
    } else {
        $("#oth").prop('required', false);
    }
    var forms = document.getElementsByClassName('formActividad');
    var validation = Array.prototype.filter.call(forms, function (form) {

        if (form.checkValidity() === false) {
            prueba = 1;
            form.classList.add('was-validated');
        } else prueba = 0;
    });
}

function validaSeguridad() {
    var forms = document.getElementsByClassName('formSeguridad');
    var validation = Array.prototype.filter.call(forms, function (form) {

        if (form.checkValidity() === false) {
            prueba = 1;
            form.classList.add('was-validated');
        } else prueba = 0;
    });
}


const convertTime12to24 = (time12h) => {
    const [time, modifier] = time12h.split(' ');

    let [hours, minutes] = time.split(':');

    if (hours === '12') {
      hours = '00';
    }

    if (modifier === 'PM') {
      hours = parseInt(hours, 10) + 12;
    }

    return `${hours}:${minutes}`;
  }

function tConvert(timeString) {
    /* // Check correct time format and split into components
    time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1) { // If time format correct
      time = time.slice(1); // Remove full string match value
      time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
      time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join(''); // return adjusted time or original string */
    var hourEnd = timeString.indexOf(":");
    var H = +timeString.substr(0, hourEnd);
    var h = H % 12 || 12;
    var ampm = H < 12 ? " AM" : " PM";
    return h + timeString.substr(hourEnd, 3) + ampm;
  }


function hourInitChange(){
    // borrar select
    $('#_horaSal').empty();
    $('#_horaSal').prop('disabled', false);
    var _horaIng = convertTime12to24($('#_horaIng').val());
    var _horaMax = 20;
    var arrayHour = _horaIng.split(':');
    var arrayNewHour = [];
    var k = 0;
    var opt;
    for(i=parseInt(arrayHour[0]); i<=_horaMax; i = i + 1){
        arrayNewHour[0] = parseInt(arrayHour[1]);
        if(i != 12){
            if (arrayNewHour[0] == 0){
                /* arrayHour[1] = 30;
                console.log(arrayHour[1]); */
                arrayNewHour[0] = i;
                arrayNewHour[1] = 30;
                /* console.log(tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString())) */
                opt = tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString());
                $('#_horaSal').append(new Option(opt,opt));
            }
            else{
                if (k == 0){
                    i++;
                    arrayNewHour[0] = i;
                    arrayNewHour[1] = 30
                    /* console.log(tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString())) */
                    opt = tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString());
                    $('#_horaSal').append(new Option(opt,opt));
                } else {
                    /* console.log(arrayHour[1]); */
                    arrayNewHour[0] = i;
                    arrayNewHour[1] = 30
                    /* console.log(tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString())) */
                    opt = tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString());
                    $('#_horaSal').append(new Option(opt,opt));
                }
                k++;
            }
        }
    }
}
function hourFinalChange(){
    // borrar select
    $('#_horaIni').empty();
    $('#_horaIni').prop('disabled', false);
    $('#_horaFin').empty();
    $('#_horaFin').prop('disabled', false);
    var _horaSal = convertTime12to24($('#_horaSal').val());
    var _horaIng = convertTime12to24($('#_horaIng').val());;
    var arrayHourIng = _horaIng.split(':');
    var arrayHourSal = _horaSal.split(':');
    var arrayNewHour = [];
    arrayNewHour = arrayHourIng;
    var k = 0;
    var opt;
    for(i=parseInt(arrayHourIng[0]); i<=parseInt(arrayHourSal[0]); i = i + 1){
        if(i != 12){
            if (parseInt(arrayNewHour[1]) == 0){
                    arrayNewHour[0] = i;
                    arrayNewHour[1] = '00';
                    opt = tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString());
                    $('#_horaIni').append(new Option(opt,opt));
                    $('#_horaFin').append(new Option(opt,opt));
                    arrayNewHour[1] = parseInt(arrayNewHour[1]) + 30;
                    opt = tConvert(arrayNewHour[0].toString() + ':' + arrayNewHour[1].toString());
                    $('#_horaIni').append(new Option(opt,opt));
                    $('#_horaFin').append(new Option(opt,opt));
                    arrayNewHour[1] = '00';

            }
        }
    }
}


document.addEventListener("DOMContentLoaded", loaded);
