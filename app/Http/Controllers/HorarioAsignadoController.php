<?php

namespace App\Http\Controllers;

use App\Horario_asignado;
use Illuminate\Http\Request;

class HorarioAsignadoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','store', 'show', 'update', 'destroy']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $horario_asignado = Horario_asignado::all();
        return response()->json($horario_asignado, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $horario_asignado = new Horario_asignado();
        $horario_asignado->id = $request->id;
        $horario_asignado->estudiante_id = $request->estudiante_id;
        $horario_asignado->horario_id = $request->horario_id;
        $horario_asignado->save();
        return response()->json(['message' => 'Horario asignado creado correctamente'], 201);
    }

    public function show($id)
    {
        //
        $horario_asignado = Horario_asignado::find($id);
        if (!$horario_asignado) {
            return response()->json(['message' => 'Horario asignado no encontrado'], 404);
        }
        return response()->json($horario_asignado, 200);
    }

    public function update(Request $request, $id)
    {
        //
        $horario_asignado = Horario_asignado::find($id);
        if (!$horario_asignado) {
            return response()->json(['message' => 'Horario asignado no encontrado'], 404);
        }

        $horario_asignado->update($request->all());

        return response()->json(['Horario asignado actualizada' => $horario_asignado], 200);
    }

    public function destroy($id)
    {
        //
        $horario_asignado = Horario_asignado::find($id);
        if (!$horario_asignado) {
            return response()->json(['message' => 'Horario asignado no encontrado'], 404);
        }
        $horario_asignado->delete();
        return $this->sendResponse($horario_asignado, 'success');
    }
}
