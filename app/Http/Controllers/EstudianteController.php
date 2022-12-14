<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EstudianteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'store', 'show', 'update', 'destroy', 'openFingerPrint']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $estudiante = Estudiante::with('universidad', 'area')->get();
        return $this->sendResponse($estudiante, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Log::info('Metodo de guardado');
        Log::info($request->all());
        $estudiante = new Estudiante();
        $estudiante->cui = $request->cui;
        $estudiante->universidad_id = $request->universidad_id;
        $estudiante->area_id = $request->area_id;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->carne = $request->carne;
        $estudiante->correo = $request->correo;
        $estudiante->huella = $request->huella;
        
        $estudiante->save();
        return response()->json(['message' => 'Estudiante creado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        return response()->json($estudiante, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */

    public function edit(Estudiante $estudiante)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        Log::info('Metodo de editar');
        Log::info($request->estudiante);

        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->update($request->estudiante);
        return response()->json(['Estudiante actualizado' => $estudiante], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        $estudiante->delete();
        return $this->sendResponse($estudiante, 'success');
    }

    public function openFingerPrint() {
        $answer = shell_exec('start C:\Huella\Huella.exe');
        return response()->json(['message' => $answer], 200);
    }
}
