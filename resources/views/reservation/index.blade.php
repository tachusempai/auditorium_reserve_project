@extends('layouts.base')

@section('content')
<div id="generalForm">
<div class="row">
  <div class="col"></div><br><br>
</div>
<!-- Criterios de uso del Auditorio-->

<div class="row justify-content-center" id="cua">
  <div class="col-lg-8 col-sm-12">
    <div class="card text-center">
      <div class="h3 card-header">
        Criterios de uso del Auditorio Clodomiro Picado Twight
      </div>
      <div class="card-body">
        <h5 class="card-title">A continuacion se presentara los criterios de uso del Auditorio Clodomiro Picado Twight.
          Por favor leerlo detenidamente.</h5>
        <p class="card-text">
                <iframe src="storage/Reglamento.pdf#toolbar=0" width="100%" height="500px"></iframe>
          {{-- <i class="fa fa-eye fa-lg" aria-hidden="true"> Ver</i> --}}
          <br>
          <a  href="storage/Reglamento.pdf" download><i class="fas fa-download fa-lg"> Descargar</i></a>
        </p>
        <form class="needs-validation vali1" id="terminos" name="terminos" novalidate>
          <div class="card-footer text-muted alert alert-secondary">
            <b>
              <div class="form-check custom-control custom-checkbox">
                <input type="checkbox" class="form-check-input custom-control-input" name="chkTermino" id="invalidCheck"
                  required>
                <label class="form-check-label custom-control-label" for="invalidCheck">
                  Estoy de acuerdo que he leido los criterios de uso del auditorio y me comprometo a cumplir y acatar lo
                  dicho en este.
                </label>
                <div class="invalid-tooltip">
                  Por favor aceptar los criterios de uso del auditorio
                </div>
              </div>
            </b>
          </div>
          <button class="btn btn-primary" id="btnTerminos" onClick="aceptaTerminos()" type="button">Aceptar</button>
          <br>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Tipo de uso del Audvb itorio-->
<div class="row justify-content-center" id="tipAc">
  <div class="col-lg-8 col-sm-12">
    <div class="card text-center">
      <div class="h3 card-header">
        Formulario para el prestamo del Auditorio Clodomorio Picado Twight
      </div>
      <div class="card-body">
        <h4 class="card-title">Numero de solicitud: AUD -
          <span name="_numeroSolicitud" id="_numeroSolicitud"> {{$lastRequest}}</span> Fecha de solicitud: <span
        name="fechaSol">{{date('d-m-Y')}}</span>
        </h4>
        <p class="h5 card-text">A continuacion se ofrecen tres modelos de uso </p>
        <div style="font-size:16px;" class="alert alert-warning">
          <b>Interna:</b> Poblacion especificamente de la Universidad Nacional de Costa Rica. <br>
          <b>Mixta:</b> Poblacion tanto de la Universidad Nacional de Costa Rica como publico externo.<br>
          <b>Externa:</b> Actividad de entidades externas a la Universidad Nacional de Costa Rica.<br>
        </div><br>
        <form class="needs-validation" name="tiposA" id="tiposA" novalidate action="/reservation" method="POST">
          @csrf
          <div class="form-check form-check-inline">
            <div class="custom-control custom-radio">
              <input class="form-check-input custom-control-input" type="radio" name="_tipoActividad" id="_interna" value="1"
                required>
              <label class="h5 form-check-label custom-control-label" for="_interna"> Interna &nbsp;
              </label>
              <div class="invalid-tooltip">Favor ingresar el tipo de actividad</div>
            </div>
            <div class="custom-control custom-radio">
              <input class="form-check-input custom-control-input" type="radio" name="_tipoActividad" id="_mixta" value="2"
                required>
              <label class="h5 form-check-label custom-control-label" for="_mixta"> Mixta &nbsp;
              </label>
            </div>
            <div class="custom-control custom-radio">
              <input class="form-check-input custom-control-input" type="radio" name="_tipoActividad" id="_externa" value="3"
                required>
              <label class="h5 form-check-label custom-control-label" for="_externa"> Externa &nbsp;
              </label>
            </div>

          </div>
        </form>
        <br>
        <br>
      </div>
      <div class="card-footer text-muted alert alert-danger">
        <b>
          Nota: La solicitud quedara sujeta a la revision de su solicitud por lo cual su autorizacion y confirmacion se
          enviara por medio del correo electronico. Muchas gracias.
        </b>

      </div>
      <div class="card-footer text-muted text-center">
        <button class="btn btn-primary" id="btnTipo" onClick="confirmaTipo()" type="button">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- Formulario-->
<div class="row justify-content-center" id="formularioReserva">
  <div class="col-lg-8 col-sm-12">
    <div class="card">
      <div class="h3 card-header text-center">
        Formulario para el prestamo del Auditorio Clodomorio Picado Twight
      </div>
      <div class="card-body">
        <div class="alert alert-info" role="alert">
          INFORMACION: El auditorio cuenta con una capacidad de 230 personas debidamente con asiento y para 6 personas
          con discapacidad.
        </div>

        <!--Datos del responsable-->
        <div id="_datosResponsable">
          <form class="needs-validation formResponsable" id="formResponsable" novalidate action="/reservation"
            method="POST">
            @csrf
            <div class="text-danger">
              <i class="fas fa-user-edit fa-lg align-baseline"></i>
              <div class="card-title iwt h4">
                <p class="align-text-bottom">Datos del responsable</span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="_nombre" name="_nombre"  placeholder="Nombre" required>
                <div class="invalid-tooltip">
                  Favor ingresar nombre.
                </div>
              </div>
              <div class="form-group col">
                <label for="ape">Apellidos</label>
                <input type="text" class="form-control" id="_apellidos" name="_apellidos" placeholder="Apellidos" required>
                <div class="invalid-tooltip">
                  Favor ingresar apellidos.
                </div>
              </div>
              <div class="form-group col">
                <label for="pues">Carrera y/o puesto</label>
                <input type="text" class="form-control" id="_puesto" name="_puesto" placeholder="Carrera y/o puesto" required>
                <div class="invalid-tooltip">
                  Favor ingresar carrera o puesto.
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="_area" name="_area" placeholder="Area" required>
                <div class="invalid-tooltip">
                  Favor ingresar Area.
                </div>
              </div>
              <div class="form-group col">
                <label for="teOfi">Telefono de oficina</label>
                <input type="number" class="form-control" id="_telOficina" name="_telOficina"  placeholder="Telefono de oficina" required>
                <div class="invalid-tooltip">
                  Favor ingresar telefono de oficina.
                </div>
              </div>
              <div class="form-group col">
                <label for="cel">Celular</label>
                <input type="number" class="form-control" id="_celular" name="_celular" placeholder="Celular" required>
                <div class="invalid-tooltip">
                  Favor ingresar celular.
                </div>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col">
                <label for="nameIns">Nombre de la institucion o unidad academica</label>
                <input type="text" class="form-control" id="_unidad" name="_unidad" placeholder="Nombre de la institucion" required>
                <div class="invalid-tooltip">
                  Favor ingresar el nombre respectivo.
                </div>
              </div>
              <div class="form-group col">
                <label for="corr">Correo electronico</label>
                <input type="email" class="form-control" id="_correo" name="_correo" placeholder="Correo electronico" required>
                <div class="invalid-tooltip">
                  Favor ingresar correo electronico.
                </div>
              </div>
            </div>
          </form>
        </div>
        <!--Horario de la actividad-->
        <div id="_horarioActividad">
          <form class="needs-validation formHorario" id="formHorario" novalidate action="/reservation" method="POST">
            @csrf
            <div class="text-danger">
              <i class="fas fa-calendar-alt fa-lg align-baseline"></i>
              <div class="card-title iwt h4">
                <span class="align-text-bottom"> Horario de la actividad</span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="name">Fecha</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" id="_fecha"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                <div class="invalid-tooltip">
                  Favor ingresar fecha.
                </div>
              </div>
              <div class="form-group col">
                <label for="_horaIng">Hora de ingreso al auditorio</label>
                {{-- <div class="input-group date" id="datetimepicker2" data-target-input="nearest"> --}}
                    {{-- <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" id="_horaIng"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div> --}}
                    <select class="form-control custom-select" id="_horaIng" onchange="hourInitChange()">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                    </select>
                {{-- </div> --}}
              </div>
              <div class="form-group col">
                <label for="_horaSal">Hora de salida del auditorio</label>
                {{-- <div class="input-group date" id="datetimepicker3" data-target-input="nearest"> --}}
                    {{-- <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" id="_horaSal"/>
                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div> --}}
                    <select class="form-control custom-select" id="_horaSal" onchange="hourFinalChange()" disabled>
                        <option selected value="8:30 AM">8:30 AM</option>
                    </select>
                {{-- </div> --}}
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="_horaIni">Hora inicial exacta del evento</label>
                {{-- <div class="input-group date" id="datetimepicker4" data-target-input="nearest"> --}}
                    {{-- <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" id="_horaIni"/>
                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div> --}}
                    <select class="form-control custom-select" id="_horaIni" disabled>
                        <option value="8:00 AM">8:00 AM</option>
                    </select>
                {{-- </div> --}}
              </div>
              <div class="form-group col">
                <label for="_horaFin">Hora final exacta del evento</label>

                {{-- <div class="input-group date" id="datetimepicker5" data-target-input="nearest"> --}}
                    {{-- <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker5" id="_horaFin"/>
                    <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div> --}}
                    <select class="form-control custom-select" id="_horaFin" disabled>
                        <option selected value="8:30 AM">8:30 AM</option>
                    </select>
                {{-- </div> --}}
              </div>
            </div>



            <div class="form-row">
              <div> Segun el horario anterior descrito, necesita que ingrese previamente o despues de la actividad alguna unidad de transporte o de servicio de alimentacion? </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta4" id="pr4" value="_previamente" required
                    onclick="veriTransporte()">
                  <label class="form-check-label custom-control-label" for="pr4"> Previamente de la actividad
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta4" id="pr4-1" value="_despues" required
                    onclick="veriTransporte()">
                  <label class="form-check-label custom-control-label" for="pr4-1"> Despues de la actividad
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta4" id="pr4-2" value="_ambas" required
                    onclick="veriTransporte()">
                  <label class="form-check-label custom-control-label" for="pr4-2"> Ambas veces
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta4" id="pr4-3" value="_no" required
                    onclick="veriTransporte()">
                  <label class="form-check-label custom-control-label" for="pr4-3"> No
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col" id="previo">
                <label for="horaIn">Hora previa de ingreso</label>
                <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker6" id="_horaIngTrans"/>
                    <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
              </div>
              <div class="form-group col" id="despues">
                <label for="horaIn">Hora posterior de ingreso</label>
                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7" id="_horaSalTrans"/>
                    <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
              </div>

            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-info " type="button" id="guardarHorario" onclick="javascript:validateSchedule();">Agregar horario</button>
                </div>
            </div>

            <br>
            <div class="row d-flex justify-content-center">
                <div class="col d-flex justify-content-center">
                    <div class="h2">
                        Resumen del horario de la actividad
                    </div>
                </div>
            </div>
            <div class="form-row" id="agregaHorarios">
              <div class="table-responsive" id="tablaHorarios">
                <table class="table tableSchedule" id="tableSchedule">
                  <thead>
                    <tr>
                      <th scope="col">Fecha</th>
                      <th scope="col">Hora ingreso</th>
                      <th scope="col">Hora salida</th>
                      <th scope="col">Hora inicio</th>
                      <th scope="col">Hora final</th>
                      <th scope="col">Transp Ingreso</th>
                      <th scope="col">Transp Salida</th>
                      <th scope="col">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody id="listadoHorario">

                  </tbody>

                </table>
              </div>
            </div>
            <div class="row" id="alertSchedule" hidden>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Favor llenar los datos antes de agregar
                    </div>
                </div>
            </div>
            <div class="row" id="alertScheduleSame" hidden>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Este horario ya esta ocupado
                    </div>
                </div>
            </div>


            <div class="form-row">
              <div class="form-group col">
                <label for="_areaExtra">Favor indique en este espacio si ocupa dias anteriores o posteriores al evento o si
                  requiere algun apoyo especial.</label>
                <textarea class="form-control" id="_areaExtra"></textarea>
              </div>
            </div>
          </form>
        </div>
        <!-- Detalles de la actividad-->
        <div id="_detallesActividad">
          <form class="needs-validation formActividad" id="formActividad" novalidate action="/reservation"
            method="POST">
            @csrf
            <div class="text-danger">
              <i class="fas fa-theater-masks fa-lg align-baseline"></i>
              <div class="card-title iwt h4">
                <span class="align-text-bottom">Detalles de la actividad</span>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-row">
                  <div class="form-group col">
                    <label for="nameActividad">Nombre de la actividad</label>
                    <input type="text" class="form-control" id="_nameActividad" placeholder="Nombre de la actividad"
                      required>
                    <div class="invalid-tooltip">
                      Favor ingresar nombre de la actividad.
                    </div>
                  </div>
                  <div class="form-group col">
                    <label for="numPersonas">Numero de personas</label>
                    <select class="form-control custom-select" id="_numPersonas">

                    </select>
                  </div>
                </div>
                <div class="for-row">
                  <div class="form-group col">
                    <label for="_areaArtistica">Si la actividad incluye presentacion artistica favor especificar en este espacio,
                      de lo contrario no se dara soporte tecnico.</label>
                    <textarea class="form-control" id="_areaArtistica"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-4 col-sm-12 ">
                <span class="card-text ">Objetivo de la actividad</span>
                <div class="form-check form-check-inline form-row">
                  <div class="custom-control custom-radio ">
                    <input class="form-check-input custom-control-input" type="radio" name="objActividad" id="rad1"
                      required value="administrativa">
                    <label class="form-check-label custom-control-label" for="rad1"> Administrativa &nbsp;
                    </label>
                    <div class="invalid-tooltip">Favor ingresar el objetivo de la actividad</div>
                  </div>
                  &nbsp;&nbsp;&nbsp;
                  <div class="custom-control custom-radio">
                    <input class="form-check-input custom-control-input" type="radio" name="objActividad" id="rad2"
                      required value="academica">
                    <label class="form-check-label custom-control-label" for="rad2"> Academica &nbsp;
                    </label>
                    <div class="invalid-tooltip">Favor ingresar el objetivo de la actividad</div>
                  </div>
                </div>
                <div class="form-check form-check-inline form-row">
                  <div class="custom-control custom-radio">
                    <input class="form-check-input custom-control-input" type="radio" name="objActividad" id="rad3"
                      required value="cultural">
                    <label class="form-check-label custom-control-label" for="rad3"> Cultural &nbsp;
                    </label>
                    <div class="invalid-tooltip">Favor ingresar el objetivo de la actividad</div>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="form-check-input custom-control-input" type="radio" name="objActividad" id="rad4"
                      required value="otro">
                    <label class="form-check-label custom-control-label" for="rad4"> Otro &nbsp;
                    </label>
                    <input type="text" class="form-control" id="oth" placeholder="Otro" required>
                    <div class="invalid-tooltip">Favor ingresar el objetivo de la actividad</div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Detalles de seguridad -->
        <div id="_detallesSeguridad">
          <form class="needs-validation formSeguridad" id="formSeguridad" novalidate action="/reservation"
            method="POST">
            @csrf
            <div class="text-danger">
              <i class="fas fa-user-shield fa-lg align-baseline"></i>
              <div class="card-title iwt h4">
                <span class="align-text-bottom"> Detalles de seguridad</span>
              </div>
            </div>
            <div class="form-row">
              <div class="col font-weight-bolder">
                A continuacion se brindara una serie de preguntas las cuales son de suma importancia para el equipo de
                seguridad de la Universidad Nacional.
              </div>
            </div>
            <br>
            <div class="form-row">
              <div> <i class="fas fa-circle fa-xs"></i>&nbsp; Participa de la actividad alguna persona de nombre, alta
                autoridad de la Universidad Nacional, persona privada de libertad o que su vida este amenazada? </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta1" id="pr1" value="si" required
                    onclick="veri()">
                  <label class="form-check-label custom-control-label" for="pr1"> Si
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta1" id="pr1-1" value="no" required
                    onclick="veri()">
                  <label class="form-check-label custom-control-label" for="pr1-1"> No
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>
              </div>
            </div>
            <!-- aqui va lo de las personas -->

            <div class="form-row" id="agregaPersonas">
              <div class="table-responsive" id="tablaPersonas">
                <table class="table tablePerson" id="tablePerson">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Puesto</th>
                      <th scope="col">...</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control" id="inname">
                      </td>
                      <td>
                         <input type=" text" class="form-control" id="inlastname">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="injob">
                      </td>
                      <td>
                        <button type='button' id='save' class='btn btn-light' onclick='javascript:addPerson();'
                          >Agregar</button>
                      </td>
                    </tr>

                  </thead>
                  <tbody id="listado">

                  </tbody>

                </table>
              </div>
            </div>
            <div class="row" id="alertPerson" hidden>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Favor llenar los datos antes de agregar
                    </div>
                </div>
            </div>
            <br>
            <div class="form-row">
              <div><i class="fas fa-circle fa-xs"></i>&nbsp; Considera usted que necesita alguna atencion especial por
                parte de la seccion de seguridad institucional? </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta2" id="pr2" value="si" required>
                  <label class="form-check-label custom-control-label" for="pr2"> Si
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta2" id="pr2-1" value="no"
                    required>
                  <label class="form-check-label custom-control-label" for="pr2-1"> No
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div><i class="fas fa-circle fa-xs"></i>&nbsp; La actividad es abierta a todo publico? </div>
              <div class="form-check form-check-inline">
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta3" id="pr3" value="si" required>
                  <label class="form-check-label custom-control-label" for="pr3"> Si
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="form-check-input custom-control-input" type="radio" name="pregunta3" id="pr3-1" value="no"
                    required>
                  <label class="form-check-label custom-control-label" for="pr3-1"> No
                  </label>
                  <div class="invalid-tooltip">Favor ingresar la respuesta</div>
                </div>
              </div>
            </div>
            <br>
            <br>
            <br>
            <div class="card-footer text-muted alert alert-danger">
              <b>
                Nota: Favor enviar lo mas pronto posible la placa de vehiculo(s) de los organizadores que ingresarian y
                que requieran espacio de parque o de lo contrario no se garantiza su acceso, favor enviar al correo
                seguridad@una.ac.cr indicando ademas el numero de gestion en proceso.
                La solicitud del parqueo se rige segun normatica de la UNA por lo cual solo se habilitara el mismo si
                hay espacios disponibles la fecha y hora de su evento.
              </b>

            </div>


          </form>
        </div>


      </div>
      <div class="card-footer text-muted alert alert-dark text-center">
        <button class="btn btn-primary" type="button" id="_btnAtrasResponsable" onClick="atrasResponsable()"> Atras
        </button>
        <button class="btn btn-primary" type="button" id="_btnAtrasHorario" onClick="atrasHorario()"> Atras </button>
        <button class="btn btn-primary" type="button" id="_btnAtrasActividad" onClick="atrasActividad()"> Atras
        </button>
        <button class="btn btn-primary" type="button" id="_btnAtrasSeguridad" onClick="atrasSeguridad()"> Atras
        </button>
        &nbsp;
        <button class="btn btn-primary" id="_btnSiguienteResponsable" type="button" onClick="siguienteResponsable()">
          Siguiente </button>
        <button class="btn btn-primary" id="_btnSiguienteHorario" type="button" onClick="siguienteHorario()"> Siguiente
        </button>
        <button class="btn btn-primary" id="_btnSiguienteActividad" type="button" onClick="siguienteActividad()">
          Siguiente </button>
        <button class="btn btn-danger" id="_btnSiguienteSeguridad" type="button" onClick="siguienteSeguridad()">
          Confirmar </button>

      </div>
    </div>
  </div>
</div>
</div>
<p class="token" id="_token" hidden> {{csrf_token()}} </p>
<div id="successfulMsg">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card text-center">
                <div class="card-header">
                    <div class="h4">
                        ¡Reservación exitosa!
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Solicitud
                        <span id="successfulNumSol"></span>
                    </h5>
                    <p class="card-text">Su solicitud fue registrada exitosamente, por favor espere a que el administrador la revise.</p>
                </div>
                <div class="card-footer text-muted">
                    ¡Gracias!
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/main.js"></script>

@endsection
