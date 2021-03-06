<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-sm-12">
        <div class="row">
            <div class="col">
                <div class="h4">
                Solicitud # <span id="numRequest">{{$request->id}}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            Fecha realizada la solicitud: <span id="dateRequest">{{$request->date_request}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
            Solicitud de tipo: <span id="typeRequest">{{$request->description}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Responsable de la solicitud.
            </div>
        </div>
        <div class="row">
            <div class="col">
                Nombre completo: {{$owner->name_person}} {{$owner->last_name_person}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Carrera y/o puesto: {{$owner->job}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Area: {{$owner->area}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Telefono de oficina: {{$owner->office_phone}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Telefono celular: {{$owner->cell_phone}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Nombre de la insititucion o unidad academica: {{$owner->name_institution}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Correo electronico: {{$owner->email}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Horario de la Actividad
            </div>
        </div>
        <div class="row" id="agregaHorarios">
            <div class="table-responsive" id="tablaHorarios">
              <table class="table tableSchedule" id="tableSchedule">
                <thead>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora ingreso</th>
                    <th scope="col">Hora salida</th>
                    <th scope="col">Hora inicial</th>
                    <th scope="col">Hora final</th>
                    <th scope="col">Transp Ingreso</th>
                    <th scope="col">Transp Salida</th>
                  </tr>
                </thead>
                <tbody id="listadoHorario">
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>
                                {{\Carbon\Carbon::parse($schedule->activity_date)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($schedule->entry_time)->format('g:i a')}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($schedule->departure_time)->format('g:i a')}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($schedule->start_time)->format('g:i a')}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($schedule->end_time)->format('g:i a')}}
                            </td>
                            <td>
                                @if ($schedule->transportation_entry_time != null)
                                    {{\Carbon\Carbon::parse($schedule->transportation_entry_time)->format('g:i a')}}
                                @else
                                    N/A
                                @endif

                            </td>
                            <td>
                                @if ($schedule->transportation_departure_time != null)
                                    {{\Carbon\Carbon::parse($schedule->transportation_departure_time)->format('g:i a')}}
                                @else
                                    N/A
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($activity->information != null)
                    Informacion adicional: {{$activity->information}}
                @else
                    Informacion adicional: N/A
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                Detalles de la actividad
            </div>
        </div>
        <div class="row">
            <div class="col">
                Nombre de la actividad: {{$activity->name_activity}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Numero de personas: {{$activity->number_people}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Objetivo de la actividad: {{$activity->objective}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($activity->artistic_description != null)
                    Presentacion artistica: {{$activity->artistic_description}}
                @else
                    Presentacion artistica: N/A
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                Detalles de seguridad
            </div>
        </div>
        @if (count($securityPeople) == 0)
        <div class="row">
            <div class="col">
                Participa de la actividad alguna persona de nombre, alta autoridad de la Universidad Nacioanl, persona privada de libertad o que su vida este amenazada: No
            </div>
        </div>
        @else
        <div class="row">
            <div class="col">
                Participa de la actividad alguna persona de nombre, alta autoridad de la Universidad Nacioanl, persona privada de libertad o que su vida este amenazada: Si, la siguiente lista.
            </div>
        </div>
        <div class="row" id="agregaPersonas">
            <div class="table-responsive" id="tablaPersonas">
              <table class="table tablePerson" id="tablePerson">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Puesto</th>
                  </tr>
                </thead>
                <tbody id="listado">
                    @foreach ($securityPeople as $securityPerson)
                        <tr>
                            <td>
                                {{$securityPerson->name_person}}
                            </td>
                            <td>
                                {{$securityPerson->last_name_person}}
                            </td>
                            <td>
                                {{$securityPerson->job}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        @endif
        <div class="row">
            <div class="col">
                Se requiere alguna atencion especial por parte de la seccion de seguridad institucional: {{$activity->security_reason}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($activity->open_public == 1)
                    La actividad es abierta a todo publico: si
                @else
                La actividad es abierta a todo publico: no
                @endif
            </div>
        </div>
        <p class="token" id="_token" hidden> {{csrf_token()}} </p>
    </div>
</div>
