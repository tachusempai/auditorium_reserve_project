<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Mail\RequestEmail;
use App\Request as AppRequest;
use App\RequestPerson;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = AppRequest::select('requests.id','requests.date_request', 'requests.type_request_id', 'type_requests.description', 'state_requests.description_state')
        ->join('type_requests','requests.type_request_id', '=', 'type_requests.id')
        ->join('state_requests', 'requests.state_request_id', '=', 'state_requests.id')
        ->get();
        return view('reservation.indexAll', [
            'activities'=> $activities
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = AppRequest::select('requests.id','requests.date_request', 'requests.type_request_id', 'type_requests.description', 'state_requests.description_state', 'requests.state_request_id')
        ->join('type_requests','requests.type_request_id', '=', 'type_requests.id')
        ->join('state_requests', 'requests.state_request_id', '=', 'state_requests.id')
        ->where('requests.id', $id)
        ->first();
        $owner = RequestPerson::select('request_people.name_person', 'request_people.last_name_person', 'request_people.job', 'request_people.area', 'request_people.office_phone', 'request_people.cell_phone', 'request_people.name_institution', 'request_people.email')
        ->where([
            ['request_people.request_id', '=', $id],
            ['request_people.type_people_id', '=', 1]
        ])
        ->first();
        $schedules = Schedule::select('schedules.activity_date', 'schedules.entry_time', 'schedules.departure_time', 'schedules.start_time', 'schedules.end_time', 'schedules.transportation_entry_time', 'schedules.transportation_departure_time')
        ->where('schedules.activity_id', $id)
        ->get();
        $activity = Activity::select('activities.name_activity', 'activities.number_people', 'activities.information', 'activities.objective', 'activities.artistic_description', 'activities.security_reason', 'activities.open_public')
        ->where('activities.request_id', $id)
        ->first();
        $securityPeople = RequestPerson::select('request_people.name_person', 'request_people.last_name_person', 'request_people.job')
        ->where([
            ['request_people.request_id', '=', $id],
            ['request_people.type_people_id', '=', 2]
        ])
        ->get();

        return view('reservation.show', [
            'request' => $request,
            'owner' => $owner,
            'schedules' => $schedules,
            'activity' => $activity,
            'securityPeople' => $securityPeople
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $input, $id)
    {
        $request = AppRequest::find($id);
        $request->state_request_id = $input['state'];
        $request->save();
        return response()->json(["response"=>"success"]);

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function state(Request $input, $id)
    {
        $request = AppRequest::find($id);
        $request->state_request_id = $input['state'];
        $request->save();
        return response()->json(["response"=>"success"]);

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
    /**
     * Display a listing of the schedules.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadSchedules(){
        $schedules = Schedule::select('schedules.activity_id','schedules.activity_date', 'schedules.entry_time', 'schedules.departure_time', 'activities.name_activity', 'activities.request_id','requests.id', 'requests.state_request_id', 'request_people.name_person', 'request_people.last_name_person', 'request_people.office_phone')
        ->join('activities','schedules.activity_id', '=', 'activities.id')
        ->join('requests','activities.request_id', '=', 'requests.id')
        ->join('request_people','requests.id', '=', 'request_people.request_id')
        ->where('request_people.type_people_id', 1)
        ->where('requests.state_request_id', 2)
        ->get();
        return view('reservation.calendar', [
            'schedules' => $schedules
        ]);
        /* return response()->json(["response"=>"success"]); */
    }
    public function sendMail($id){
        $request = AppRequest::select('requests.id','requests.date_request', 'requests.type_request_id', 'type_requests.description', 'state_requests.description_state', 'requests.state_request_id')
        ->join('type_requests','requests.type_request_id', '=', 'type_requests.id')
        ->join('state_requests', 'requests.state_request_id', '=', 'state_requests.id')
        ->where('requests.id', $id)
        ->first();
        $owner = RequestPerson::select('request_people.name_person', 'request_people.last_name_person', 'request_people.job', 'request_people.area', 'request_people.office_phone', 'request_people.cell_phone', 'request_people.name_institution', 'request_people.email')
        ->where([
            ['request_people.request_id', '=', $id],
            ['request_people.type_people_id', '=', 1]
        ])
        ->first();
        $schedules = Schedule::select('schedules.activity_date', 'schedules.entry_time', 'schedules.departure_time', 'schedules.start_time', 'schedules.end_time', 'schedules.transportation_entry_time', 'schedules.transportation_departure_time')
        ->where('schedules.activity_id', $id)
        ->get();
        $activity = Activity::select('activities.name_activity', 'activities.number_people', 'activities.information', 'activities.objective', 'activities.artistic_description', 'activities.security_reason', 'activities.open_public')
        ->where('activities.request_id', $id)
        ->first();
        $securityPeople = RequestPerson::select('request_people.name_person', 'request_people.last_name_person', 'request_people.job')
        ->where([
            ['request_people.request_id', '=', $id],
            ['request_people.type_people_id', '=', 2]
        ])
        ->get();

        Mail::to('david110794@gmail.com')->send(new RequestEmail($request, $owner, $schedules, $activity, $securityPeople));

        return response()->json(["response"=>"success"]);
    }
}
