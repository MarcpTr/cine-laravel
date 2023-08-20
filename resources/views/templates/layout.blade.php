<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/navbar.css")}}">
    @yield('css')
    @yield('js')
    <script src="{{asset("js/jquery-3.1.1.js")}}"></script>
    <script src="{{asset("js/navbar.js")}}"></script>
    @yield('meta')
</head>
<body>
    @if( $viewActual !="video")
    <nav class="navbar" id="navbarId">
        <div class="navHeader">
            <a href="/">Cloudplayer</a>
            <a href="javascript:void(0);" class="navButton" onclick="showNavbar()">
                <img class="" style="width: 25px" src="{{asset("img/icons/menu-white-18dp.svg")}}"></a>
        </div>
        <div id="navElementsId" class="navElements noVisible">
            <a class="active" href="/">Inicio</a>
            @auth
            <a href="configuracion" href="">Configuracion</a>
            <a href="/logout">Desconectarse</a>
            @endauth
        </div>
    </nav>
    @endif
    @yield("content")
</body>
</html>