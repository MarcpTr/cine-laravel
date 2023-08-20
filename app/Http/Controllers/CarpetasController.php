<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\carpetas;
use Illuminate\Support\Facades\DB;

class CarpetasController extends Controller
{
    public function anadirCarpeta(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'nombre' => 'required',
                'carpeta' => 'required|unique:carpetas',
            ]);

            $data = $request->all();

            $check =       carpetas::create([
                'nombre' => $data['nombre'],
                'carpeta' => $data['carpeta'],
                'id_usuario' => Auth::id()
            ]);
            return redirect("configuracion")->with('viewActual', "configuracion");;
        }

        return "Usuario no identificado";
    }
    public function getCarpetas(Request $request)
    {
        if (Auth::check()) {
            $users = DB::table('carpetas')->where('id_usuario', '=', Auth::id())
                ->get();
            return $users;
        }

        return "Usuario no identificado";
    }
    public function borrarCarpeta(Request $request)
    {
        if (Auth::check()) {
            $users = DB::table('carpetas')->where('carpeta', '=', $request->idcarpeta)->delete();
            return $users;
        }

        return "Usuario no identificado";
    }
}
