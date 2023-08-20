//Busca el id de TMDb atraves del nombre del fichero.
function obtenerInfoBasicaPeliculas() {
  var jsonText = "[";
  for (x = 0; x < infoDrive.length; x++) {
    var nombre = nombrePelicula(infoDrive[x].nombre);
    $.ajax({
      method: "GET",
      url: "https://api.themoviedb.org/3/search/movie?include_adult=false&page=1&query=" + nombre + "&language=es&api_key=b7048181b82a3678ad874fa00559a427",
      async: false,//Espera a que se realize la operacion antes de seguir
      dataType: "json",
      success: function (response) {
        res = response;
      },
      error: function (response) {
        console.log(response);
      }
    });
    var generos = "";
    try {
      if (res.results[0].genre_ids.length != 0) {
        generos = `,"generos":[`;
        for (i = 0; i < res.results[0].genre_ids.length; i++) {
          generos += `{"id":"${res.results[0].genre_ids[i]}","nombre":"${res.results[0].genre_ids[i]}"}`;
          if (i < res.results[0].genre_ids.length - 1) {
            generos += ",";
          }
        }
        generos += "]";
      }
    } catch (error) {}
    if (res.results.length != 0) {
      jsonText += `{"idDrive": "${infoDrive[x].id}", "idTMDb": "${res.results[0].id}"
      , "posterPath": "${res.results[0].poster_path}"
      , "titulo": "${res.results[0].title}" ${generos} },`;
      
    }
  }
  jsonText=jsonText.slice(0,-1);
  jsonText += "]";
  peliculas = JSON.parse(jsonText);
  
}
function detallesPelicula(id) {
  var search = {
    "async": false,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/3/movie/" + id + "?api_key=b7048181b82a3678ad874fa00559a427&language=es&append_to_response=videos,credits",
    "method": "GET",
    "headers": {},
    "data": "{}"
  }
  $.ajax(search).done(function (response) {
    infoTMDBPelicula = response;
    return infoTMDBPelicula;
  });

}
function obtenerGeneros() {
  var search = {
    "async": false,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/3/genre/movie/list?api_key=b7048181b82a3678ad874fa00559a427&language=es",
    "method": "GET",
    "headers": {},
    "data": "{}"
  }
  $.ajax(search).done(function (response) {
    generos = response;
  });

}


/* function obtenerInfoPeliculas() {
  var jsonText = "[";

  for (x = 0; x < idTMDb.length; x++) {
    $.ajax({
      method: "GET",
      url: "https://api.themoviedb.org/3/movie/" + idTMDb[x].idTMDb + "?api_key=b7048181b82a3678ad874fa00559a427&language=es&append_to_response=videos,credits",
      async: false,//Espera a que se realize la operacion antes de seguir
      dataType: "json",
      success: function (response) {
        res = response;
      },
      error: function (response) {
        console.log(response);
      }
    });
    if (res.length != 0) {
      var generos = ``;
      if (res.genres.length != 0) {
        generos = `"generos":[`;
      }
      for (i = 0; i < res.genres.length; i++) {
        generos += `{"id":"${res.genres[i].id}","nombre":"${res.genres[i].name}"}`;
        if (i < res.genres.length - 1) {
          generos += ",";
        }
      }
      generos += "]";
      jsonText += `{ "id": "${idTMDb[x].idTMDb}", "nombre": "${res.title}","poster_path": "${res.poster_path}", ${generos}}`;
      if (x < idTMDb.length - 1) {
        jsonText += ",";
      }
    }
  }
  jsonText += "]"
  peliculas = JSON.parse(jsonText);
  console.log("peliculas: ");
  console.log(peliculas);
}*/