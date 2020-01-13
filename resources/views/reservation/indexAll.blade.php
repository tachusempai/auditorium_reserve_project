@extends('layouts.app')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <div class="h4">
                    Solicitudes
                </div>
            </div>
            <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th scope="col">Numero de solicitud</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>
                                    {{ $activity->id }}
                                </td>
                                <td>
                                    {{ $activity->date_request }}
                                </td>
                                <td>
                                    {{ $activity->description }}
                                </td>
                                <td>
                                    {{ $activity->description_state }}
                                </td>
                                <td class="pl-4">
                                    <a href="/activities/{{$activity->id}}"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
    </div>
</div>
@endsection
