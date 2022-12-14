<?php

namespace App\Http\Controllers;

use App\Horario_asignado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $horario_asignado = Horario_asignado::with('estudiante', 'horario')->get();
        return $this->sendResponse($horario_asignado, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Log::info($request);

        /* estudiante donde cui es */
        $registro = DB::table('estudiante')->select('id')->where('cui', $request->estudiante)->get()->first()->id;
        Log::info("id estudiante");
        Log::info($registro);
        $horario_asignado = new Horario_asignado();
        $horario_asignado->estudiante_id = $registro;
        $horario_asignado->horario_id = $request->horario;
        $horario_asignado->save();
        return response()->json(['message' => 'Horario asignado creado correctamente'], 201);
    }

    public function show($estudiante_id)
    {
        //
        $horario_asignado = Horario_asignado::where('estudiante_id', $estudiante_id)->get();
        Log::info($horario_asignado);
        if (!$horario_asignado) {
            return response()->json(['message' => 'Horario asignado no encontrado'], 404);
        }
        return response()->json($horario_asignado, 200);
    }

    public function update(Request $request, $id)
    {
        //
        Log::info('Metodo de editar');
        Log::info($request->all());

        $estudiante = DB::table('estudiante')->select('id')->where('cui', $request->estudiante)->get()->first()->id;
        Log::info('ENCONTRO ESTUDIANTE');
        Log::info($estudiante);

        $horario_asignado = Horario_asignado::find($estudiante);
        if (!$horario_asignado) {
            return response()->json(['message' => 'Horario asignado no encontrado'], 404);
        }

        $horario_asignado->estudiante_id = $estudiante;
        $horario_asignado->horario_id = $request->horario;

        $horario_asignado->update();

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
