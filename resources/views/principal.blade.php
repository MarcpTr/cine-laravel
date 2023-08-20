@extends('templates.layout')
@section('js')
<script src="{{asset("js/init.js")}}"></script>
<script src="{{asset("js/parser.js")}}"></script>
<script src="{{asset("js/ui.js")}}"></script>
<script src="{{asset("js/themoviedb.js")}}"></script>
@endsection
@section("css")
<link rel="stylesheet" href="{{asset("css/tabs.css")}}">
<link rel="stylesheet" href="{{asset("css/app.css")}}">
<link rel="stylesheet" href="{{asset("css/navbar.css")}}">
@endsection
@section('content')
<div class="container">
    <div class="containerPeliculas ">
        <div class="" id="peliculas">
            <div class="nav-tabs" id="myTabMovies"> </div>
            <div class="tab-content " id="myTabContent"> </div>
        </div>
    </div>
</div>
<script>
    init();
</script>
@endsection