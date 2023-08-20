@extends('templates.layout')
@section('js')
<script src="{{asset("js/parser.js")}}"></script>
<script src="{{asset("js/ui.js")}}"></script>
<script src="{{asset("js/themoviedb.js")}}"></script>
<script src="{{asset("js/data.js")}}"></script>
@endsection
@section("css")
<link rel="stylesheet" href="{{asset("css/video.css")}}">
@endsection
@section('content')
<div id="video">
</div>
<script>
    createVideo();
</script>
@endsection