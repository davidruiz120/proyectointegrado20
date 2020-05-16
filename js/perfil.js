(function ($) {

    $(document).ready(function(){


        // //////////// ZONA VEHÍCULOS PERSONALES /////////////////////

        //console.log("ID USUARIO: " + $("#inputIdUsuarioLogin").val());

        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {idUsuarioLogin: $("#inputIdUsuarioLogin").val()},
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../db/p/pObtenerVehiculosPersonales.php",
        })
        .done(function(data) {

            // Si no hay vehículos personales, muestro el siguente mensaje
            if(data.noHayVPersonales){
                let panelVehiculosPersonales = $("#panelVehiculosPersonales");
                panelVehiculosPersonales.append("<h5 class='my-4 text-center'> No tienes ningún vehículo personal</h5>");
            }

            $.each(data.vPersonales, function (key, value) { // Por cada registro, hago lo siguiente
                //console.log(value.sId);

                var idEliminar = "eliminarVP"+value.pId; // Variable para poder identificar cada registro para eliminar. Se usa más adelante

                // Muestro todas las vehículos personales
                let panelVehiculosPersonales = $("#panelVehiculosPersonales");
                panelVehiculosPersonales.append("<div class='border-gradient-effect'>"+
                "<div class='text-right divbtncerrar'>"+
                "<button id='"+idEliminar+"'  class='btn btncerrar' title='Borrar vehículo personal' data-toggle='tooltip' data-placement='left'><i class='fas fa-times'></i></button>"+
                "</div>"+
                "<h4 class='font-weight-light'>"+value.pAnyo+" <b>"+value.pMarca+"</b> "+value.pModelo+" | "+value.pClase+"</h4>"+
                "</div>"+
                "<br>");

                $("#"+idEliminar).tooltip(); // Inicio el tooltip de cada vehiculo personal

               
                $("#"+idEliminar).on("click",function(){ // Al hacer click en el botón de eliminar en cualquier vehículo, hago lo siguiente

                    // Elimino el elemento general del vehículo personal para demostrar visualmente que el vehículo ha sido eliminado
                    $(this).parent("div").parent("div").remove();
                    // Elimino el tooltip para solventar un problema visual al eliminar el vehículo personal
                    $(".tooltip-inner").remove();
                    $(".arrow").remove();

                    // Realizo una consulta a la BBDD para que elimine el vehículo personal
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data: {idVPersonal: idEliminar.replace('eliminarVP','')}, // Antes de pasarle el id del vehículo personal, elimino la palabra 'eliminarVP' que tenía
                        //Cambiar a type: POST si necesario
                        type: "POST",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: "db/p/pEliminarVehiculoPersonal.php",
                    })
                    .done(function(data) {
                        if(data.correcto){ // Si se ha eliminado correctamente
                            location.reload();
                        }
                        else{ // Si no se ha eliminado correctamente
                            
                            // Creo un nuevo div para mostrar una información clara de que se ha ocurrido un error al eliminar el vehículo
                            let panelVehiculosPersonales = $("#panelVehiculosPersonales");
                            panelVehiculosPersonales.append("<div class='border-gradient-effect'>"+
                            "<h5 class='my-4'><i class='fas fa-exclamation-circle' style='color: red;'></i> <b>Error</b> al eliminar el vehículo. Es posible que el <b>"+value.pMarca+" "+value.pModelo+"</b> esté en subasta. <b>Elimine primero la subasta</b> para poder eliminar este vehículo.</h5>"+
                            "</div>"+
                            "<br>");
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    });
                    
                });


            });

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });

        

        // //////////// FIN /// ZONA VEHÍCULOS PERSONALES /////////////////////

    



        // //////////// ZONA AÑADIR VEHÍCULO /////////////////////

        // ====== Carga de los modelos según la marca seleccionada ======
        $("#inputMarca").on("change focus",function(){
            //console.log($(this).children("option").filter(":selected").text());
            //console.log($(this).val());

            // Antes de cargar los modelos de cada marca, elimino los options que pueda tener en el select de Modelos,
            // los valores de los input y deshabilitamos el botón de Añadir vehículo
            $("#inputModelo").children().remove().end(); 
            $("#inputAnyo").val("");
            $("#inputClase").val("");
            $("#btnAnyadirVehiculoPersonal").attr("disabled", "disabled");

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {marca: $(this).val()}, // Envío el nombre de la marca 
                //Cambiar a type: POST si necesario
                type: "GET",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "../db/p/pListarModelosPorMarcaCoches.php",
            })
            .done(function(data) {
                $.each(data.modelos, function (key, value) {

                    // Por cada modelo relizamos lo siguiente

                    // Rellenamos el select de los modelos para que muestre los modelos que hay de X marca
                    let selectModelo = $("#inputModelo");
                    selectModelo.append("<option value='"+ value.modelo +"'>"+ value.modelo +"</option>");
                    
                });
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
        });


        // ====== Carga de los datos según la modelo seleccionado ======
        $("#inputModelo").on("change focus",function(){
            
            if($(this).val() != null){ // Si hay algún option en el select
               
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                    data: {modelo: $(this).val()}, // Envío el nombre de el modelo
                    //Cambiar a type: POST si necesario
                    type: "GET",
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: "../db/p/pDatosCochePorModelo.php",
                })
                .done(function(data) {
                    let datoscoche = data.datoscoche[0];

                    // Rellenamos los input con los datos del modelo seleccionado 
                    // Y activamos el botón de Añadir Vehículo
                    $("#inputIdCoche").val(datoscoche.id);
                    $("#inputAnyo").val(datoscoche.anyo);
                    $("#inputClase").val(datoscoche.clase);
                    $("#btnAnyadirVehiculoPersonal").removeAttr("disabled");

                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                });
                
            }
          
        });

        // //////////// FIN /// ZONA AÑADIR VEHÍCULO /////////////////////





    });

})(jQuery);