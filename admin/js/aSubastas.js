(function ($) {

    $(document).ready(function(){


        // ====== Carga de los coches ======
        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: null,
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../../db/s/sObtenerSubastas.php",
        })
        .done(function(data) {
            $.each(data.subastas, function (key, value) {
                
                let tablaSubastas = $("#tablaSubastas");
                tablaSubastas.append("<tr>"+
                "<td>"+value.sId+"</td>"+
                "<td>"+value.sIdCoche+"</td>"+
                "<td>"+value.sMarca+"</td>"+
                "<td>"+value.sModelo+"</td>"+
                "<td>"+value.sAnyo+"</td>"+
                "<td>"+value.sClase+"</td>"+
                "<td>"+value.sNombreUsuario+"</td>"+
                "<td>"+value.sValorInicial+"</td>"+
                "<td>"+value.sValorTotal+"</td>"+
                "</tr>");

            });
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });







    });

})(jQuery);