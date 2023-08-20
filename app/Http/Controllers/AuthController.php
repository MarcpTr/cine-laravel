<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

use Hash;

class AuthController extends Controller
{
    public function inicio()
    {
        return view('auth.inicio')->with('viewActual', "inicio");;
    }
    public function registro()
    { 
        return view('auth.registro')->with('viewActual', "registro");;
    }
    public function iniciar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('principal')
                ->withSuccess('You have Successfully loggedin')->with('viewActual', "principal");;
        }
        return redirect()->route("inicio")->withSuccess('Oppes! You have entered invalid credentials')->with('viewActual', "inicio");;
    }
  public function registrar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route("principal")->withSuccess('Great! You have Successfully loggedin')->with('viewActual', "principal");;

        }
        return redirect()->route("inicio")->withSuccess('Great! You have Successfully loggedin')->with('viewActual', "principal");;
    }
   public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
  public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('inicio')->with('viewActual', "inicio");;
    }
}
