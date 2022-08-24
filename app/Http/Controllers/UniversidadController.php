<?php

namespace App\Http\Controllers;

use App\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:api')->except(['store']); //Exceptuamos las funciones login
    }
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
        $universidad = new Universidad();
        $universidad->id = $request->id;
        $universidad->nombre = $request->nombre;
        $universidad->save();
        return response()->json(['message' => 'Universidad creada correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function show(Universidad $universidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Universidad $universidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Universidad $universidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universidad $universidad)
    {
        //
    }
}
