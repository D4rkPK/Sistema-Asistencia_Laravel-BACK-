<?php

namespace App\Http\Controllers;

use App\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
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
        $area = area::all();
        return response()->json($area, 200);

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
        $area = new Area();

        $area->descripcion = $request->descripcion;
        $area->user_id = $request->user_id;

        $area->save();
        return response()->json(['message' => 'Area creada correctamente'], 201);
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
        $area = Area::find($id);
        return response()->json($area);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
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
        $area = Area::find($id);

        $area->update($request->all());

        return response()->json(['Area actualizada' => $area], 200);
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
        $area = Area::find($id);

        $area->delete();

        return $this->sendResponse($area, 'success');
    }
}
