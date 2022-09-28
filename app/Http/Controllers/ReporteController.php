<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReporteController extends Controller
{
    //
    public function index(Request $request)
    {
        Log::info("ReporteController@index");
        Log::info($request->all());
        $date = $request->fechas;

        if ($request->area == '-1' && $request->universidad == '-1') { //todosTodos
            $registro = self::todosTodos($request, $date);
        } else if ($request->area == '-1' && $request->universidad != '-1') { //todosUniversidad
            $registro = self::todosUniversidades($request, $date);
        } else if ($request->area != '-1' && $request->universidad == '-1') { //areaTodos
            $registro = self::areaTodos($request, $date);
        } else if ($request->area != '-1' && $request->universidad != '-1') { //AreaUniversidad
            $registro = self::areaUniversidades($request, $date);
        } else {
            return $this->sendResponse('No existe', 404);
        }

        Log::info('Hola');
        
        Log::info($registro);
        return $this->sendResponse($registro, 200);
        
    }


    function areaTodos($request, $date)
    {
        Log::info('areaTodos');
        if ($request->estado == '2') {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('area.id', '=', $request->area)
                ->get();
        } else {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('area.id', '=', $request->area)
                ->where('estado', '=', $request->estado)
                ->get();
        }
        Log::info($registro);
        return $this->sendResponse($registro, 200);
    }

    function areaUniversidades($request, $date)
    {
        Log::info('todosUniversidades');
        if ($request->estado == '2') {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('area.id', '=', $request->area)
                ->where('universidad.id', '=', $request->universidad)
                ->get();
        } else {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('area.id', '=', $request->area)
                ->where('universidad.id', '=', $request->universidad)
                ->where('estado', '=', $request->estado)
                ->get();
        }

        Log::info($registro);
        return $registro;
    }

    function todosUniversidades($request, $date)
    {
        Log::info('todosUniversidades');
        if ($request->estado == '2') {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('universidad.id', '=', $request->universidad)
                ->get();
        } else {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('registro.fecha', [$date[0], $date[1]])
                ->where('universidad.id', '=', $request->universidad)
                ->where('estado', '=', $request->estado)
                ->get();
        }

        Log::info($registro);
        return $registro;
    }

    function todosTodos($request, $date)
    {
        Log::info('todosTodos');
        if ($request->estado == '2') {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('fecha', [$date[0], $date[1]])
                ->get();
        } else {
            $registro = DB::table('registro')
                ->join('horario_asignado', 'registro.horario_asignado_id', '=', 'horario_asignado.id')
                ->join('estudiante', 'horario_asignado.estudiante_id', '=', 'estudiante.id')
                ->join('area', 'estudiante.area_id', '=', 'area.id')
                ->join('universidad', 'estudiante.universidad_id', '=', 'universidad.id')
                ->select('estudiante.nombre', 'estudiante.apellido','estudiante.area_id', 'estudiante.universidad_id', 'registro.entrada', 'registro.salida', 'registro.fecha', 'registro.estado', 'area.descripcion_area', 'universidad.nombre_universidad')
                ->whereBetween('fecha', [$date[0], $date[1]])
                ->where('estado', '=', $request->estado)
                ->get();
        }

        Log::info($registro);
        return $registro;
    }
}
