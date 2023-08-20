function refresh() {
    createListUI(getCarpetas());
}
function getCarpetas() {
    var res;
    nombreusuario = "marc";
    $.ajax({
        type: "post",
        url: '/getCarpetas',
        async: false,
        dataType: "json",
        success: function (response) {
            res = response;
        }
    });
    return res;
}
function createListUI(response) {
    document.getElementById("listacarpetas").innerHTML = "";
    for (i in response) {
        document.getElementById("listacarpetas").innerHTML += `  <div class="carpetaelement">
<h2 class="nombrecarpeta">${response[i].nombre}</h2>
<h3   class="idcarpeta">${response[i].carpeta}</h3>
<button class="borrar" onclick="borrar(event)" value="${response[i].carpeta}">Delete</button>
</div>`;
    }
}
function borrar(event) {
    carpetaid = event.target.value;
    $.ajax({
        type: "POST",
        url: '/borrarCarpeta',
        data: {
            idcarpeta: carpetaid,
            borrar: true
        },
        dataType: "text",
        success: function (response) {
            refresh();
        }
    });
}

$('#guardar').click(function (e) {
    $('#datosincorrectos').addClass("noVisible");
    e.preventDefault();
    carpetanombre = $('#ncarpeta').val();
    carpetaid = $('#idcarpeta').val();
    $.ajax({
        type: "POST",
        url: '/anadirCarpetas',
        data: {
            ncarpeta: carpetanombre,
            idcarpeta: carpetaid,
            nombreusuario: nombreusuario,
            guardar: true
        },
        dataType: "text",
        success: function (response) {
            if ($.trim(response) == "false") {
                $('#datosincorrectos').removeClass("noVisible");
            }
            refresh();
        }
    });
}); 
$(document).ready(function () {
    $('#refresh').click(function (e) {
        e.preventDefault();
        refresh();
    },
    );
});