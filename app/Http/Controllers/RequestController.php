<?php

namespace App\Http\Controllers;

use Request;
/* use Illuminate\Http\Request; */

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = \DB::table('requests')->count() + 1;
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
    public function store(Request $request)
    {
        $input = Request::all();
        dd($input);
        /* dd(request) */
        /* $var1 = $this->addPriceDetails1($request->form1);

        $var2 = $this->addProductDetails1($request->form2);
        $var3 = $this->addAdditionalInformation1($request->form3); */
            //$var4 = $this->addImages($imagesform);//you dont't have
        /* $imagesform */
        return response()->json(["response"=>"success"]);
        /* $input = Request::all();
        dd($input); */
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
