<?php

namespace App\Http\Controllers;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
