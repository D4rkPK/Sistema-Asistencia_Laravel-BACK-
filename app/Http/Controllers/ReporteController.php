<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReporteController extends Controller
{
    //
    public function index(Request $request)
    {
        Log::info("ReporteController@index");
        Log::info($request->all());

        if($request->opcion == 1){//opcion 1 ESTADOS
            if ($request->estado == 2) {
                $registro = Registro::with('horario_asignado', 'estudiante')->get();
            } else if ($request->estado == 1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '1')->get();
            } else if ($request->estado == 0) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '0')->get();
            } else if ($request->estado == -1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '-1')->get();
            } else {
                return $this->sendResponse('No existe', 200);
            }
        }
        else if($request->opcion == 2){//opcion 2 PERIODO
            if ($request->estado == 2) {
                $registro = Registro::with('horario_asignado', 'estudiante')->get();
            } else if ($request->estado == 1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '1')->get();
            } else if ($request->estado == 0) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '0')->get();
            } else if ($request->estado == -1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '-1')->get();
            } else {
                return $this->sendResponse('No existe', 200);
            }
        }
        else if($request->opcion == 3){//opcion 2 Areas
            if ($request->estado == 2) {
                $registro = Registro::with('horario_asignado', 'estudiante')->get();
            } else if ($request->estado == 1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '1')->get();
            } else if ($request->estado == 0) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '0')->get();
            } else if ($request->estado == -1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '-1')->get();
            } else {
                return $this->sendResponse('No existe', 200);
            }
        }

        else if($request->opcion == 4){//Universidades
            if ($request->estado == 2) {
                $registro = Registro::with('horario_asignado', 'estudiante')->get();
            } else if ($request->estado == 1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '1')->get();
            } else if ($request->estado == 0) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '0')->get();
            } else if ($request->estado == -1) {
                $registro = Registro::with('horario_asignado', 'estudiante')->where('estado', '-1')->get();
            } else {
                return $this->sendResponse('No existe', 200);
            }
        }



        return $this->sendResponse($registro, 200);
    }
}
