$(obtener_registros());

function obtener_registros(pacientes, categoria){
    $.ajax({
        data: {"texto" : pacientes, "categoria" : categoria},
        url : "valida.php",
        type : "POST",
        dataType : 'html'
    }).done(function(resultado){
        $("#tabla").html(resultado);
    });
}

$(document).on('keyup', "#busqueda", function(){
    var valorBusqueda = $(this).val();
    if (valorBusqueda != ""){
        var categoria = document.getElementById("categoria").value;
        obtener_registros(valorBusqueda, categoria);
    }
    else{
        obtener_registros();
    }
});