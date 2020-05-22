(function ($) {

    $(document).ready(function(){


        // ====== Carga de los usuario ======
        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: null,
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../../db/a/aObtenerUsuarios.php",
        })
        .done(function(data) {
            $.each(data.usuarios, function (key, value) {
                
                if(value.rol == 0){
                    var rolUser = "Usuario normal";
                }
                if(value.rol == 1){
                    var rolUser = "Administrador";
                }

                let tablaUsuarios = $("#tablaUsuarios");
                tablaUsuarios.append("<tr>"+
                "<td>"+value.id+"</td>"+
                "<td>"+value.nombreusuario+"</td>"+
                "<td>"+value.pass+"</td>"+
                "<td>"+value.nombre+"</td>"+
                "<td>"+value.email+"</td>"+
                "<td>"+value.apellido1+"</td>"+
                "<td>"+value.apellido2+"</td>"+
                "<td>"+rolUser+"</td>"+
                "<td>"+value.creditos+"</td>"+
                "</tr>");

            });
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });







    });

})(jQuery);