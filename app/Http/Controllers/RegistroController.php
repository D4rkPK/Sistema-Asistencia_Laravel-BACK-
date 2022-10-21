<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Horario_asignado;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','store', 'show', 'update', 'destroy', 'validarAsistencia']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $registro = Registro::with('horario_asignado', 'estudiante')->get();
        return $this->sendResponse($registro, 200);
    }

    public function faltantes()
    {
        //
        Log::info('faltantes');
        $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '-1')->get();
        Log::info($registro);
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
        Log::info($request);
        $registro = Registro::find($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $registro->update($request->all());
        return response()->json(['Registro actualizado' => $registro], 200);
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

    /* recorre la tabla estudiantes y valida si tienen una entrada en la fecha actual en la tabla registro*/
    public function validarAsistencia(Request $request)
    {
        Log::info('validarAsistencia');
        Log::info($request);
        $estudiantes = Estudiante::all();
        Log::info($estudiantes);
        $fecha = $request->fecha;
        Log::info('SE VALIDA');
        Log::info($fecha);
        foreach ($estudiantes as $estudiante) {
            Log::info($estudiante->id);
            $horario_asignado = Horario_asignado::where('estudiante_id', $estudiante->id)->get()->first();
            Log::info('Horario asignado');
            Log::info($horario_asignado);
            $registro = Registro::where('horario_asignado_id', $horario_asignado->id)->where('fecha', $fecha)->first();
            if (!$registro) {
                $registro = new Registro();
                $registro->horario_asignado_id = $horario_asignado->id;
                $registro->entrada = null;
                $registro->salida = null;
                $registro->fecha = $fecha;
                $registro->estado = -1;
                $registro->save();
                Log::info('Registro creado');
            }
        }
        return response()->json(['message' => 'Asistencia validada correctamente'], 201);
    }
    


}
