<?php

namespace App\Http\Controllers;
use App\Horario;

use Illuminate\Http\Request;

class HorarioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','store', 'show', 'update', 'destroy']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $horario = Horario::all();
        return response()->json($horario, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $horario = new Horario();
        $horario->id = $request->id;
        $horario->hora_entrada = $request->hora_entrada;
        $horario->hora_salida = $request->hora_salida;
        $horario->save();
        return response()->json(['message' => 'Horario creado correctamente'], 201);
    }

    public function show($id)
    {
        //
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }
        return response()->json($horario, 200);
    }

    public function update(Request $request, $id)
    {
        //
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        $horario->update($request->all());

        return response()->json(['Horario actualizada' => $horario], 200);
    }

    public function destroy($id)
    {
        //
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }
        $horario->delete();
        return response()->json(['message' => 'Horario eliminado correctamente'], 200);
    }
}
