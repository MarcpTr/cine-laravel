function crearMiniaturasPeliculas() {
    for (var i = 0; i < peliculas.length; i++) {
        var titulo;
        var poster;
        if (typeof peliculas[i].nombre != "undefined") {

            titulo = peliculas[i].nombre;
        } else {
            titulo = "";
        }
        if (typeof peliculas[i].posterPath != "undefined") {

            poster = `https://image.tmdb.org/t/p/original${peliculas[i].posterPath}`;
        } else {
            poster = "";
        }

        if (!peliculas.includes(peliculas[i].id)) {
            for (var x = 0; x < peliculas[i].generos.length; x++) {

                document.getElementById(peliculas[i].generos[x].nombre.replace(" ", "")).innerHTML +=
                `
                <div class="thubmnail">
                <a href="informacion?id=${peliculas[i].idTMDb}&gId=${peliculas[i].idDrive}"><img  alt="${titulo}" src="${poster}"  class="imgmovie"onerror=" this.onerror=null; this.src='../img/notfound.png'" >
                    </a>
            </div>    
  `  ;             }
        }
      //  peliculas.moviesC.push(peliculas[i].id);

    }
}
function crearCategoriasPeliculas() {
    obtenerGeneros();
    genresMoviesHad = [];
    for (var i = 0; i < peliculas.length; i++) {
        for (var j = 0; j < peliculas[i].generos.length; j++) {
            for(x=0;x<generos.genres.length;x++)
                {
                    if(peliculas[i].generos[j].id==generos.genres[x].id)
                    {
                        peliculas[i].generos[j].nombre=generos.genres[x].name;
                    }
                }
            if (!genresMoviesHad.includes(peliculas[i].generos[j].nombre)) {
                
                genresMoviesHad.push(peliculas[i].generos[j].nombre);
            }
        }
    }
    for (var i = 0; i < genresMoviesHad.length; i++) {
        var active = "tab-active";
        var noVisible = "";
        if (i != 0) {
            active = "";
        }
        if (i != 0) {
            noVisible = "noVisible";
        } else {
            noVisible = "";

        }
        document.getElementById("myTabMovies").innerHTML +=
            `
       
        <a  href="javascript:void(0);" onclick="cambiarTab(event)" class="${active} tab ${genresMoviesHad[i].replace(" ", "")}" id="${genresMoviesHad[i].replace(" ", "")}-tab"  href="#${genresMoviesHad[i].replace(" ", "")}"  >${genresMoviesHad[i]}</a>
      
          `;
        document.getElementById("myTabContent").innerHTML +=
            ` <div class="tab-pane  ${noVisible}" id="${genresMoviesHad[i].replace(" ", "")}" ></div>`;

    }
}

function crearInfoPeliculas() {
    var trailer = "";
    var id = $_GET("id")
    var gId = $_GET("gId")

    detallesPelicula(id);

    var actores = "";
    var videos = "";
    var fondo;
    var titulo;
    var trailerPri;
    var tituloOriginal;
    var duracion;
    var lenguajeOriginal;
    var presupuesto;
    var generos;
    var productoras;
    var locProductoras = "";
    if (typeof infoTMDBPelicula.backdrop_path != "undefined") {
        fondo = "https://image.tmdb.org/t/p/original/" + infoTMDBPelicula.backdrop_path;
    } else {
        fondo = "";
    }
    if (typeof infoTMDBPelicula.titulo != "undefined") {
        titulo = infoTMDBPelicula.title;
    } else {
        titulo = "";
    }

    if (typeof infoTMDBPelicula.original_title != "undefined") {
        tituloOriginal = `  <h2>Titulo original</h2>
                <p>
                ${infoTMDBPelicula.original_title}
                </p>`;
    } else {
        tituloOriginal = "";
    }
    if (typeof infoTMDBPelicula.videos.results[0] != "undefined") {
        if (typeof infoTMDBPelicula.videos.results[0].key != "undefined") {
            trailerPri = `<div class=" trailer"><div>
                <iframe  src="https://www.youtube.com/embed/${infoTMDBPelicula.videos.results[0].key}?rel=0&amp;controls=1&amp;showinfo=0"  allow="autoplay; encrypted-media" allowfullscreen=""></iframe></div>
            </div>`;
        }
    }
    else {
        trailerPri = "";
    }
    if (typeof infoTMDBPelicula.runtime != "undefined") {
        duracion = `<h2>Duracion</h2>
            <p>          ${infoTMDBPelicula.runtime} Min
            </p>`;
    } else {
        duracion = "";
    }
    if (typeof infoTMDBPelicula.original_language != "undefined") {

        lenguajeOriginal = ` <h2>Lenguaje Original
                                  </h2>
                                        <p>
                                      ${infoTMDBPelicula.original_language}
                                       </p>
            `;
    } else {
        lenguajeOriginal = "";
    }

    if (typeof infoTMDBPelicula.budget != "undefined") {
        if (infoTMDBPelicula.budget <= 0) {
            presupuesto = "";
        } else {

            presupuesto = ` <h2>Presupuesto</h2>
            <p>
            ${infoTMDBPelicula.budget}
            </p>
            `;
        }
    } else {
        presupuesto = "";
    }
    if (typeof infoTMDBPelicula.genres != "undefined") {
        var genres = "";
        for (var i = 0; i < infoTMDBPelicula.genres.length; i++) {

            genres += ` <li>${infoTMDBPelicula.genres[i].name}</li>`;
        }
        generos = `<h2>Generos</h2>
            <ul>
            ${genres}
            </ul>`;
    } else {
        generos = "";
    }
    if (typeof infoTMDBPelicula.production_companies != "undefined") {
        var production = "";
        var paises = [];
        var inicio = true;
        for (var i = 0; i < infoTMDBPelicula.production_companies.length; i++) {
            if (infoTMDBPelicula.production_companies[i].origin_country != "") {

                production += ` <li>${infoTMDBPelicula.production_companies[i].name}</li>`;
                if (!paises.includes(infoTMDBPelicula.production_companies[i].origin_country)) {
                    /*if (inicio) {
                       locProductoras += `       <div class="productoras">
                        `;
                        inicio = false;
                      }
                   locProductoras += `                  
              <div class="row mx-auto"> 
              <div class="embed-responsive embed-responsive-16by9  video">
              <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDWoFXm__4YGEu7arDPmL0r4kRy0RfVk0Q&q=${infoTMDBPelicula.production_companies[i].origin_country}+pais"   allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
          </div>
       
          <div>
              `; */
                }
                paises.push(infoTMDBPelicula.production_companies[i].origin_country);

            } else {
                production += ` <li>${infoTMDBPelicula.production_companies[i].name}</li>`;
                locProductoras = "";

            }
            if (!inicio) {
                locProductoras += ` </div>`;
            }
        }
        productoras = `<h2>Productoras</h2>
        <ul>
        ${production}
        </ul>`;
    } else {
        productoras = "";
        locProductoras = "";
    } if (typeof infoTMDBPelicula.videos != "undefined") {
        var inicio = true;
        for (var i = 0; i < infoTMDBPelicula.videos.results.length; i++) {
            var trailer = infoTMDBPelicula.videos.results[i].key;
            if (typeof trailer != "undefined")
                if (inicio) {
                    videos += ` <div class="videos"> `;
                    inicio = false;
                }
            videos += `                
               <div class="video">
               <iframe class="embed-responsive-item" src="https://www.youtube.com/embed//${trailer}?rel=0&amp;controls=0&amp;showinfo=0"  allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
             </div>
                `;
        }
        if (!inicio) {
            videos += ` </div> `;

        }
    }
    if (typeof infoTMDBPelicula.credits != undefined) {
        var inicio = true;
        for (var i = 0; i < infoTMDBPelicula.credits.cast.length; i++) {

            if (inicio) {
                actores += ` <div class="actores"> `;
                inicio = false;
            }
            actores += `  

                    <div class="">
                     
                        <img src="https://image.tmdb.org/t/p/original${infoTMDBPelicula.credits.cast[i].profile_path}" alt="${infoTMDBPelicula.credits.cast[i].name}"  onerror="this.onerror=null;this.src='../img/notfound.png';" >
                        <div class="caption">
                        <p class="text-white">${infoTMDBPelicula.credits.cast[i].name}</p>                        </div>
                      
                  
                  </div>

                  
        `;
        }
        if (!inicio) {
            actores += ` </div> `;
        }
    }



    document.getElementById("info").innerHTML +=
        ` 

                  <div class="backgroundinfo " style="background-image: url('${fondo}')">                                      <h1 class="titulo">${titulo}</h1>

                   ${trailerPri}   
                    <div class="playbutton"><div>
                     <a   href="video?gId=${gId}">Reproducir</a>
                    </div></div>
                  <div class="main-info">

                  <div class="description">
                     <p> ${infoTMDBPelicula.overview}
                    </p>
                 </div>

                 </div>

                    <div class="secondary-info">
                       <div class="misc">
                     <div class="other">
                                              ${tituloOriginal}
                            ${duracion}
                         ${lenguajeOriginal}
                              ${presupuesto}
                       ${generos}
                          ${productoras}
                      </div>
                    </div>
                    <div class="media-info">

                    ${actores}
                          ${videos}
                  ${locProductoras}
            </div>
        </div>
    </div>
`;
}
function createVideo() {
    var gId = $_GET("gId")

    document.getElementById("video").innerHTML +=
        `
                    
                    <iframe frameborder="1" allowfullscreen   src="https://drive.google.com/file/d/${gId}/preview"  allow="autoplay; encrypted-media"  ></iframe>
                `;
}
