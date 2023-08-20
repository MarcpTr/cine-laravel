@extends('templates.layout')
@section("css")
<link rel="stylesheet" href="{{asset("css/info.css")}}">
<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
@endsection
@section('js')
<script src="{{asset("js/parser.js")}}"></script>
<script src="{{asset("js/ui.js")}}"></script>
<script src="{{asset("js/themoviedb.js")}}"></script>
@endsection
@section('content')
<div id="info">
</div>
<script>
  crearInfoPeliculas();
</script>
@endsection