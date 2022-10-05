<?php

namespace App\Http\Controllers;

use App\temp_estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TempEstudiantesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api')->except(['destroy']);
    }

    public function index()
    {
        //
        $temp_estudiantes = temp_estudiantes::with('estudiante')->get();
        return $this->sendResponse($temp_estudiantes, 200);
    }

    public function store(Request $request)
    {
        $temp_estudiantes = temp_estudiantes::truncate();

        Log::info($request->all());
        $temp_estudiantes = new temp_estudiantes();
        $temp_estudiantes->estudiante_id = $request->estudiante_id;
        $temp_estudiantes->save();
        return response()->json(['message' => 'Estudiante creado correctamente'], 201);
    }

    public function destroy()
    {
        Log::info('Metodo de eliminacion');
        $temp_estudiantes = temp_estudiantes::truncate();
        return response()->json(['message' => 'Estudiante eliminado correctamente'], 200);
    }
}
