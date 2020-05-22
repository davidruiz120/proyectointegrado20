(function ($) {

    $(document).ready(function(){


        // ====== Carga de las propiedades/vehículos personales ======
        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: null,
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../../db/a/aObtenerPropiedades.php",
        })
        .done(function(data) {
            $.each(data.subastas, function (key, value) {
                
                let tablaSubastas = $("#tablaPropiedades");
                tablaSubastas.append("<tr>"+
                "<td>"+value.pId+"</td>"+
                "<td>"+value.pIdCoche+"</td>"+
                "<td>"+value.pMarca+"</td>"+
                "<td>"+value.pModelo+"</td>"+
                "<td>"+value.pAnyo+"</td>"+
                "<td>"+value.pClase+"</td>"+
                "<td>"+value.pUsuario+"</td>"+
                "<td>"+value.pNombreUsuario+"</td>"+
                "<td>"+value.pApellido1+"</td>"+
                "</tr>");

            });
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });







    });

})(jQuery);