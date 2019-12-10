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
    var name = $('#inname').val();
    var lastname = $('#inlastname').val();
    var injob = $('#injob').val();
    var code = name + lastname + injob;
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

function fetchFormTipo() {
    var tipoActividad = $('#tiposA input[name=_tipoActividad]:checked').val();
    return form1 = {
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
    var _fecha = $('#_fecha').val();
    var _horaIng = $('#_horaIng').val();
    var _horaSal = $('#_horaSal').val();
    var _horaIni = $('#_horaIni').val();
    var _horaFin = $('#_horaFin').val();
    var _areaExtra = $('#_areaExtra').val();
    return form3 = {
        _fecha: _fecha,
        _horaIng: _horaIng,
        _horaSal: _horaSal,
        _horaIni: _horaIni,
        _horaFin: _horaFin,
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

function submitTotal() {
    var formTipo = fetchFormTipo();
    var formResponsable = fetchFormResponsable();
    var formHorario = fetchFormHorario();
    var formActividad = fetchFormActividad();
    var form5 = $('.formSeguridad').serialize();
    var token = $('#_token').text();
    $.ajax({
        url: '/reservation',
        type: 'POST',
        data: {
            formTipo: formTipo,
            formResponsable: formResponsable,
            formHorario: formHorario,
            formActividad: formActividad,
            form5: form5,
            _token: token
        },
        dataType: 'json',
        success: function (data) {
            alert(data);

        }
    });
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



document.addEventListener("DOMContentLoaded", loaded);
