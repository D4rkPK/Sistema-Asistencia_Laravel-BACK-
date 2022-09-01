<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','store', 'show', 'update', 'destroy']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $registro = Registro::with('horario_asignado')->get();
        return $this->sendResponse($registro, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $registro = new Registro();
        $registro->horario_asignado_id = $request->horario_asignado_id;
        $registro->entrada= $request->entrada;
        $registro->salida = $request->salida;
        $registro->save();
        return response()->json(['message' => 'Registro creado correctamente'], 201);
    }

    public function show($id)
    {
        //
        $registro = Registro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($registro, 200);
    }

    public function update(Request $request, $id)
    {
        //
        $registro = Registro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $registro->update($request->all());
        return response()->json(['Registro actualizada' => $registro], 200);
    }

    public function destroy($id)
    {
        //
        $registro = Registro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $registro->delete();
        return $this->sendResponse($registro, 'Success');
    }

}
