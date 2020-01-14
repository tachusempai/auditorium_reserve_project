<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Request as AppRequest;
use App\RequestPerson;
use App\Schedule;
use DateTime;
/* use Request; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = DB::table('requests')->count() + 1;
        return view('reservation.index', [
            'lastRequest' => $last
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {

        $request = new AppRequest();
        $activity = new Activity();
        $requestPerson = new RequestPerson();

        // Request
        $request->date_request = date('Y-m-d');
        $request->type_request_id = $input['formTipo']['tipoActividad'];
        $request->state_request_id = 1;
        $request->save();

        // Activity
        $activity->request_id = $input['formTipo']['numeroSolicitud'];
        $activity->name_activity = $input['formActividad']['_nameActividad'];
        $activity->number_people = $input['formActividad']['_numPersonas'];
        $activity->information = $input['formHorario']['_areaExtra'];
        $activity->objective = $input['formActividad']['_objActividad'];
        $activity->artistic_description = $input['formActividad']['_areaArtistica'];
        $activity->security_reason = $input['formSeguridad']['_atencionEspecial'];
        $openP =  $input['formSeguridad']['_abiertaPublico'];
        if ($openP == 'si'){
            $activity->open_public = 1;
        } else{
            $activity->open_public = 0;
        }

        $activity->save();

        // RequestPerson
        // Request Owner
        $requestPerson->name_person = $input['formResponsable']['_nombre'];
        $requestPerson->last_name_person = $input['formResponsable']['_apellidos'];
        $requestPerson->job = $input['formResponsable']['_puesto'];
        $requestPerson->area = $input['formResponsable']['_area'];
        $requestPerson->office_phone = $input['formResponsable']['_telOficina'];
        $requestPerson->cell_phone = $input['formResponsable']['_celular'];
        $requestPerson->name_institution = $input['formResponsable']['_unidad'];
        $requestPerson->email = $input['formResponsable']['_correo'];
        $requestPerson->request_id = $input['formTipo']['numeroSolicitud'];
        $requestPerson->type_people_id = 1;
        $requestPerson->save();

        $scheduleCount = count($input['formHorario']['_horarios']);
        for ($i = 0; $i < $scheduleCount; $i++){
            $schedule = new Schedule();
            $date = DateTime::createFromFormat('d/m/Y',$input['formHorario']['_horarios'][$i][0]);
            $schedule->activity_date = $date->format('Y-m-d');
            $timeET = $input['formHorario']['_horarios'][$i][1];
            $schedule->entry_time = date('H:i:s',strtotime($timeET));
            $timeDT = $input['formHorario']['_horarios'][$i][2];
            $schedule->departure_time = date('H:i:s',strtotime($timeDT));
            $timeST = $input['formHorario']['_horarios'][$i][3];
            $schedule->start_time = date('H:i:s',strtotime($timeST));
            $timeEndT = $input['formHorario']['_horarios'][$i][4];
            $schedule->end_time = date('H:i:s',strtotime($timeEndT));
            if ($input['formHorario']['_horarios'][$i][5] != 'N/A'){
                $timeTEntryT = $input['formHorario']['_horarios'][$i][5];
                $schedule->transportation_entry_time = date('H:i:s',strtotime($timeTEntryT));
            }
            if ($input['formHorario']['_horarios'][$i][6] != 'N/A'){
                $timeTDepartureT = $input['formHorario']['_horarios'][$i][6];
                $schedule->transportation_departure_time = date('H:i:s',strtotime($timeTDepartureT));
            }


            $schedule->activity_id = $input['formTipo']['numeroSolicitud'];
            $schedule->save();
        }
        if ($input['formSeguridad']['_personasSeguridad'] != null){
            $securityPeopleCount = count($input['formSeguridad']['_personasSeguridad']);
            for ($j = 0; $j < $securityPeopleCount; $j++){
                $requestPerson = new RequestPerson();
                $requestPerson->name_person = $input['formSeguridad']['_personasSeguridad'][$j][0];
                $requestPerson->last_name_person = $input['formSeguridad']['_personasSeguridad'][$j][1];
                $requestPerson->job = $input['formSeguridad']['_personasSeguridad'][$j][2];
                $requestPerson->area = 'N/A';
                $requestPerson->office_phone = 'N/A';
                $requestPerson->cell_phone = 'N/A';
                $requestPerson->name_institution ='N/A';
                $requestPerson->email = 'N/A';
                $requestPerson->request_id = $input['formTipo']['numeroSolicitud'];
                $requestPerson->type_people_id = 2;
                $requestPerson->save();
            }
        }

        return response()->json(["response"=>"success"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
