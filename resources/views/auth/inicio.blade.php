@extends('templates/layout')
@section('meta')
<meta name="keywords" content="cloud, peliculas, drive">
<title>Iniciar sesion</title>
<meta name="description" content="Registrate en cloudplayer">
@endsection
@section('css')
<link rel="stylesheet" href="{{asset("css/form.css")}}">
@endsection
@section('js')
@endsection
@section('content')
<div class="form">
  <div class="formheader">
    <h2>Iniciar sesion</h2>
    <a href="{{route("registro")}}">Registrarse</a>
  </div>
  <form action="{{ route('iniciar') }}" method="POST">
    @csrf
    <input type="text" id="email_address" class="form-control" placeholder="Introduce tu correo" name="email" required autofocus>
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    <input type="password" id="password" class="form-control" placeholder="Introduce tu contraseña"name="password" required>
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    <button id="submit" type="submit">Iniciar sesion</button>
  </form>
</div>
@endsection