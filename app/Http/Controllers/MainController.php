<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function informacion()
    {
        if (Auth::check()) {
            return view('informacion')->with('viewActual', "informacion");;
        }

        return redirect("inicio")->withSuccess('Opps! You do not have access')->with('viewActual', "inicio");;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function configuracion()
    {
        if (Auth::check()) {
            return view('configuracion')->with('viewActual', "configuracion");;
        }

        return redirect("inicio")->withSuccess('Opps! You do not have access')->with('viewActual', "inicio");;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function video()
    {
        if (Auth::check()) {
            return view('video')->with('viewActual', "video");
        }

        return redirect("inicio")->withSuccess('Opps! You do not have access')->with('viewActual', "inicio");;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function principal()
    {
        if (Auth::check()) {
            return view('principal')->with('viewActual', "principal");;
        }

        return redirect("inicio")->withSuccess('Opps! You do not have access')->with('viewActual', "inicio");;
    }
}
