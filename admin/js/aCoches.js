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
            url: "../../db/a/aObtenerCoches.php",
        })
        .done(function(data) {
            $.each(data.coches, function (key, value) {
                
                let tablaCoches = $("#tablaCoches");
                tablaCoches.append("<tr>"+
                "<td>"+value.id+"</td>"+
                "<td>"+value.marca+"</td>"+
                "<td>"+value.modelo+"</td>"+
                "<td>"+value.anyo+"</td>"+
                "<td>"+value.clase+"</td>"+
                "<td>"+value.valor_inicial+"</td>"+
                "<td>"+value.valor_total+"</td>"+
                "</tr>");

            });
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });







    });

})(jQuery);