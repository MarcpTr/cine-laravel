function videoType(name) {
    var res = name.split("#");
    if (res.length > 1) {
        return res;
    }
    return false;
}
function nombrePelicula(nombre) {
    var res = nombre.replace(" ", "%20");
    res = res.replace(".mpg", "");
    res = res.replace(".mp4", "");
    res = res.replace(".avi", "");
    res = res.replace(".wmv", "");
    res = res.replace(".flv", "");
    res = res.replace(".mts", "");
    res = res.replace(".3gp", "");
    res = res.replace(".mov", "");
    return res;
}
function $_GET(s) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get(s);
    return c;
}
