$(obtener_registros(document.getElementById("categoria").value));

function obtener_registros(categoria){
    $.ajax({
        data: {"categoria" : categoria},
        url : "BuscarReportes.php",
        type : "POST",
        dataType : 'html'
    }).done(function(resultado){
        $("#tabla").html(resultado);
    });
}

$("#categoria").change(function(){
    obtener_registros(document.getElementById("categoria").value);
});