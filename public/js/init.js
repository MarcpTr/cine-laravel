var resCarpetas;
function init() {
    resCarpetas = obtenerCarpetas();
    obtenerFicherosDrive();
 //   obtenerIDPeliculas();
    obtenerInfoBasicaPeliculas();
    crearCategoriasPeliculas();
    crearMiniaturasPeliculas();
}
//Pide las carpetas de drive al servidor y las obtiene en json.
function obtenerCarpetas() {
    var res;
    $.ajax({
        type: "POST",
        url: 'getCarpetas',
        async: false,//Espera a que se realize la operacion antes de seguir
        dataType: "json",
        success: function (response) {
     
            res = response;
        },
        error: function (response) {
        }
    });
    return res;
}

function obtenerFicherosDrive() {
    if (resCarpetas != null) {
        //Pide a drive los ficheros de todas las carpetas obtenidas
       var jsonText = "[";  
         for (x = 0; x <= resCarpetas.length; x++) {
            if(x==resCarpetas.length)
            {
                carpeta = "1GRdTXJeEsJQDkgddMLFbDt7xk2tI02VC";
            }else{
            carpeta=resCarpetas[x].carpeta;
            console.log(carpeta)
            }var settings = {
                async: false,
                crossDomain: true,
                url: `https://www.googleapis.com/drive/v3/files?q=%27${carpeta}%27+in+parents&key=AIzaSyA6eenMXM-yIRs3zgvDN1wg_E_fHcTBU20`,
                method: "GET",
                headers: {},
            };
            var res;
            $.ajax(settings).done(function (response) {
                res = response;
            });
         
            if (typeof res != "undefined") {
                if (res.files && res.files.length > 0) {
                    for (var i = 0; i < res.files.length; i++) {
                        var file = res.files[i];
                        if (!videoType(file.name)) {
                            //Comprueba si el id del fichero en drive esta ya guardado sino es el caso lo guarda en el array infoDrive
                            if(!jsonText.includes(file.id))
                            jsonText += `{ "id": "${file.id}", "nombre": "${file.name}"},`;
                        }
                    }
                    

                }
            }
        }
    }
    jsonText=jsonText.slice(0,-1);
    jsonText += "]";
    infoDrive = JSON.parse(jsonText);

}