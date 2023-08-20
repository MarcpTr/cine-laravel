@extends('templates/layout')
@section('meta')
<meta name="keywords" content="cloud, peliculas, drive">
<title>Registrarse</title>
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
    <h2>Registro</h2>
    <a href="{{route("inicio")}}">Iniciar sesion</a>
  </div>
  <form action="{{ route('registrar') }}" method="POST">
    @csrf
    <input type="text" id="name" class="form-control" name="name" placeholder="Introduce tu nombre" required autofocus>
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <input type="text" id="email_address" class="form-control" placeholder="Introduce tu correo" name="email" required autofocus>
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    <input type="password" id="password" class="form-control" placeholder="Introduce tu contraseña"name="password" required>
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    <button id="submit" type="submit">Registrarse</button>
    <div class="formfooter">
      <div id="ingresadatos" class="mensajealerta noVisible">
        <p>Debes ingresar el usuario y la contraseña</p>
      </div>
      <div id="datosincorrectos" class="mensajealerta noVisible">
        <p>Usuario y/o contraseña erronea</p>
      </div>
    </div>
  </form>
</div>
@endsection