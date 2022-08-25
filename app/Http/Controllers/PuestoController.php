<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
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
        $puesto = puesto::all();
        return $this->sendResponse($puesto, 200);

        // load the view and pass the sharks
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
        $puesto = new Puesto();

        $puesto->descripcion = $request->descripcion;

        $puesto->save();
        return response()->json(['message' => 'Puesto creado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $puesto = Puesto::find($id);
        return response()->json($puesto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $puesto = Puesto::find($id);

        $puesto->update($request->all());

        return response()->json(['puesto actualizado' => $puesto], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $puesto = Puesto::find($id);

        $puesto->delete();

        return $this->sendResponse($puesto, 'success');

       /* return response()->json(['message' => 'Puesto eliminado correctamente'], 200);*/
    }
}
