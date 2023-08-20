@extends('templates.layout')
@section("css")
<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("css/carpetas.css")}}">
<link rel="stylesheet" href="{{asset("css/form.css")}}">
@endsection
@section('js')
<script src="{{asset("js/jquery-3.1.1.js")}}"></script>
<script src="{{asset("js/init.js")}}"></script>
<script src="{{asset("js/configuracion.js")}}"></script>
<script type="text/javascript">
     
</script>
@endsection
@section('content')
<div class="carpetas" id="carpetas">
    <div class="formheader">
        <h2>Lista carpetas {{Auth::user()->name}}</h2>
    </div>
    <form action="{{ route('anadirCarpeta') }}" method="POST">
        @csrf
        <input type="text" id="carpeta" class="form-control" placeholder="Id carpeta" name="carpeta" required autofocus>
        @if ($errors->has('carpeta'))
        <span class="text-danger">{{ $errors->first('carpeta') }}</span>
        @endif
        <input type="text" id="nombre" class="form-control" placeholder="nombre carpeta" name="nombre"
            required>
        @if ($errors->has('nombre'))
        <span class="text-danger">{{ $errors->first('nombre') }}</span>
        @endif
        <button id="submit" type="submit">Guardar</button>
    </form>
    <div id="listacarpetas">
    </div>
    <button id="refresh">refresh</button>
    <div id="datosincorrectos" class="mensajealerta noVisible">
        <p>La carpeta ya esta en uso.</p>
    </div>
</div>
<script>
    refresh();
</script>
@endsection