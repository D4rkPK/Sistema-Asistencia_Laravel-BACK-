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
        $this->middleware('auth:api')->except(['index','store', 'show', 'update', 'destroy']); //Exceptuamos las funciones login
    }
    public function index()
    {
        //
        $uni = Universidad::all();
        return response()->json($uni, 200);
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
    public function show($id)
    {
        //
        $uni = Universidad::find($id);
        return response()->json($uni);
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
    public function update(Request $request, $id)
    {
        //
        $uni = Universidad::find($id);

        $uni->update($request->all());

        return response()->json(['Universidad actualizada' => $uni], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $uni = Universidad::find($id);

        $uni->delete();

        return response()->json(['message' => 'Universidad eliminada correctamente'], 200);
    }
}
