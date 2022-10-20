<?php

namespace App\Http\Controllers\adminUsers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['store', 'login', 'index', 'test']); //Exceptuamos las funciones login
    }

    public function index()
    {
        //
        $users = User::with('puesto', 'area')->get();
        return $this->sendResponse($users, 200);
    }

        /* test function return yes */
        public function test()
        {
            return response()->json(['message' => 'yes'], 200);
        }

    public function store(Request $request)
    {
        $user = new User();
        $user->cui = $request->cui;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->puesto_id = $request->puesto_id;
        $user->area_id = $request->area_id;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }

    public function login(Request $request)
    {
        Log::info($request);
        $userSearch = User::where('cui', $request->cui)->first();

        if ($userSearch) {
            if (Auth::attempt(['cui' => $request->cui, 'password' => $request->password])) {
                $user = Auth::user()->with('puesto', 'area')->first();
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return $this->sendResponse(['token' => $token, 'user'=>$user], 200);
            } else {
                return $this->sendError('Usuario o contraseña incorrectos');
            }
        } else {
            return $this->sendError('Usuario no encontrado');
        }
    }

    /* public function sadd3(Request $request)
    {
        Log::info($request);
        if (Auth::attempt(['nit' => $request->nit, 'password' => $request->password])) {
            $user = Auth::user(); //autenticacion del usuario
            $token =  $user->createToken('Inicio de Sesion')->accessToken; //generacion de token para el usuario
            $usuario = Usuario::withoutTrashed()->where('nit', $request->nit)->get(); //busqueda de usuario que logueo

            if (count($usuario) <= 0) { //si el usuario fue dato de baja no puede ingresar
                return $this->sendResponse(0, 'Usuario no registrado.');
            }

            $estado = 1; //activo
            $suscripcion = Suscripcion::where('usuario_id', Auth::user()->id)->where('fecha_fin', '>', date('Y-m-d', strtotime(Carbon::now())))->with('tipo_suscripcion')
                ->orderBy('id', 'asc')->first();

            if (is_null($suscripcion)) {

                $cobro_sub = CobroSuscripcion::where('usuario_id', Auth::user()->id)->orderBy('id', 'desc')->first();
                if (is_null($cobro_sub)) {
                    $estado = 3; //Sin suscripcion
                } else  if ($cobro_sub->estado == false) {
                    $estado = 4; //Suspendido
                }
            } else {
                if ($suscripcion->resucribir == false) {
                    $estado = 2; //precancelado
                }
            }

            $rol = UsuarioRol::where('usuario_id', Auth::user()->id)->pluck('rol_id'); //busqueda de usuario que logueo

            return $this->sendResponse(['usuario' => $usuario, 'token' => $token, 'suscripcion' => $suscripcion, 'estado' => $estado, 'rol' => $rol], 'Inicio de sesion exitoso.');
        }

        return $this->sendError(0, 'Usuario o contraseña incorrectos.');
    } */
}
