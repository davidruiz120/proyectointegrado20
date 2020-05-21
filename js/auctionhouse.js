(function ($) {

    $(document).ready(function(){


        // //////////// ZONA SUBASTAS DESTACADAS /////////////////////

        // ====== Carga de las subastas ======
        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: null,
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../db/s/sObtenerSubastas.php",
        })
        .done(function(data) {

            // Si no hay subastas, muestro el siguente mensaje
            if(data.noHaySubastas){
                let panelSubastasDestacadas = $("#panelSubastasDestacadas");
                panelSubastasDestacadas.append("<div class='border-gradient-effect'>"+
                "<h4 class='font-weight-light text-center'> No hay subastas actualmente. Inténtelo más tarde o comienza una subasta</h4>"+
                "</div>"+
                "<br>");
            }

            $.each(data.subastas, function (key, value) { // Por cada registro, hago lo siguiente
                //console.log(value.sId);

                var idPujar = "pujar"+value.sId; // Recojo el Id de la subasta, que me servirá para poder diferenciar entre ellas al pujar
                var idUsuarioLogin = $("#inputIdUsuarioLogin").val(); // Recojo el id del usuario logueado para la siguiente comprobación

                if(idUsuarioLogin != value.sIdUsuario){ // Si la subasta la creó un usuario distinto al logueado, muestro la subasta pero con el botón de pujar habilitado
                    let panelSubastasDestacadas = $("#panelSubastasDestacadas");
                    panelSubastasDestacadas.append("<div class='border-gradient-effect'>"+
                    "<h4 class='font-weight-light'>"+value.sAnyo+" <b>"+value.sMarca+"</b> "+value.sModelo+"</h4>"+
                    "<hr>"+
                    "<div class='row'>"+
                    "<div class='col-md-4'>"+
                    "<h5 class='font-weight-light'>"+value.sClase+"</h5>"+
                    "<hr>"+
                    "<h5 class='font-weight-light'> Publicado por <b>"+value.sNombreUsuario+"</b></h5>"+
                    "</div>"+
                    "<div class='col-md-4 text-center'>"+
                    "<h4 class='font-weight-light'><b>Pujar</b></h4>"+
                    "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorInicial+"</b></h4>"+
                    "<div class='text-center'><button id='"+idPujar+"' class='btn btn-primary btn-sm js-scroll-trigger' href='#modalPujar' data-toggle='modal'>Pujar</button></div>"+
                    "</div>"+
                    "<div class='col-md-4 text-center'>"+
                    "<h4 class='font-weight-light'><b>Comprar ya</b></h4>"+
                    "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorTotal+"</b></h4>"+
                    "<div class='text-center'><button class='btn btn-primary btn-sm js-scroll-trigger' href='' disabled>Comprar ya</button></div>"+
                    "</div>"+
                    "</div>"+
                    "</div>"+
                    "<br>"); 
                } else { // Si no, hago lo mismo pero con el botón deshabilitado
                    let panelSubastasDestacadas = $("#panelSubastasDestacadas");
                    panelSubastasDestacadas.append("<div class='border-gradient-effect'>"+
                    "<h4 class='font-weight-light'>"+value.sAnyo+" <b>"+value.sMarca+"</b> "+value.sModelo+"</h4>"+
                    "<hr>"+
                    "<div class='row'>"+
                    "<div class='col-md-4'>"+
                    "<h5 class='font-weight-light'>"+value.sClase+"</h5>"+
                    "<hr>"+
                    "<h5 class='font-weight-light'> Publicado por <b>"+value.sNombreUsuario+"</b></h5>"+
                    "</div>"+
                    "<div class='col-md-4 text-center'>"+
                    "<h4 class='font-weight-light'><b>Pujar</b></h4>"+
                    "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorInicial+"</b></h4>"+
                    "<div class='text-center'><button id='"+idPujar+"' class='btn btn-primary btn-sm js-scroll-trigger' href='#modalPujar' data-toggle='modal' disabled>Pujar</button></div>"+
                    "</div>"+
                    "<div class='col-md-4 text-center'>"+
                    "<h4 class='font-weight-light'><b>Comprar ya</b></h4>"+
                    "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorTotal+"</b></h4>"+
                    "<div class='text-center'><button class='btn btn-primary btn-sm js-scroll-trigger' href='' disabled>Comprar ya</button></div>"+
                    "</div>"+
                    "</div>"+
                    "</div>"+
                    "<br>");
                }

                
                $("#"+idPujar).on("click",function(){ // Al hacer click en pujar en cualquier subasta, hago lo siguiente

                    // Recogo los créditos del usuario en un div oculto cuando se hace click en Pujar
                    var creditosUser = parseInt($("#creditosUserLogin").text());

                    let panelPujar = $("#panelPujar");
                    // Elimino todo lo que contenga el modal para prevenir algunos errores
                    panelPujar.children().remove(); 

                    // Muestro una interfaz para poder permitir al usuario introducir un valor para pujar
                    // El formulario se enviará al archivo php sPujarSubasta para que haga los cambios en la BBDD
                    panelPujar.append("<div>"+
                    "<h5 class='font-weight-light'>"+value.sAnyo+" | <b>"+value.sMarca+"</b> "+value.sModelo+" | "+value.sClase+"</h5>"+
                    "<hr>"+
                    "<form action='../db/s/sPujarSubasta.php' method='post' class='form-signin'>"+
                    "<input min='"+value.sValorInicial+"' type='number' name='modalInputValorInicial' id='modalInputValorInicial' class='form-control' required>"+
                    "<input value='"+value.sId+"' type='hidden' name='modalInputIdSubasta' id='modalInputIdSubasta'>"+
                    "<hr>"+
                    "<button class='btn btn-sm btn-primary btn-block text-uppercase' id='btnModalPujar' name='btnModalPujar' type='submit' disabled><i class='fas fa-coins'></i> Pujar</button>"+
                    "</form>"+
                    "</div>"+
                    "<br>");
                    $("#modalInputValorInicial").val(value.sValorInicial); // Relleno automático del input


                    $("#modalInputValorInicial").on("change",function(){
                        // Al hacer un cambio en el input del valor de la puja, compruebo de que si vale lo mismo que el valor
                        // anterior, desactivo el botón, de lo contrario se activará. Esto sirve para que otro usuario no
                        // pueda pujar con un mismo valor. A su vez, compruebo que el usuario solo pueda pujar con los créditos
                        // que disponga

                        if($(this).val() == value.sValorInicial || parseInt($(this).val()) >= creditosUser){
                            $("#btnModalPujar").attr("disabled", "disabled");
                        } else {
                            $("#btnModalPujar").removeAttr("disabled");
                        }

                    });

                });

            });

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });

        // //////////// FIN /// ZONA SUBASTAS DESTACADAS /////////////////////

        












        // //////////// ZONA ADMINISTRAR SUBASTAS /////////////////////

        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: null,
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../db/s/sObtenerSubastas.php",
        })
        .done(function(data) {

            // Si no hay subastas, muestro el siguente mensaje en el modal
            if(data.noHaySubastas){
                let panelAdministrarSubastas = $("#panelAdministrarSubastas");
                panelAdministrarSubastas.append("<h2 class='my-4 text-center'> No hay subastas actualmente</h2>");
            }

            $.each(data.subastas, function (key, value) { // Por cada registro, hago lo siguiente
                //console.log(value.sId);

                var idEliminar = "eliminarAd"+value.sId; // Variable para poder identificar cada registro para eliminar. Se usa más adelante

                // Muestro todas las subastas en el modal
                let panelAdministrarSubastas = $("#panelAdministrarSubastas");
                panelAdministrarSubastas.append("<div class='border-gradient-effect'>"+
                "<div class='text-right divbtncerrar'>"+
                "<button id='"+idEliminar+"'  class='btn btncerrar' title='Borrar subasta' data-toggle='tooltip' data-placement='left'><i class='fas fa-times'></i></button>"+
                "</div>"+
                "<h4 class='font-weight-light'>"+value.sAnyo+" <b>"+value.sMarca+"</b> "+value.sModelo+"</h4>"+
                "<hr>"+
                "<div class='row'>"+
                "<div class='col-md-4'>"+
                "<h5 class='font-weight-light'>"+value.sClase+"</h5>"+
                "<hr>"+
                "<h5 class='font-weight-light'> Publicado por <b>"+value.sNombreUsuario+"</b></h5>"+
                "</div>"+
                "<div class='col-md-4 text-center'>"+
                "<h4 class='font-weight-light'><b>Valor puja actual</b></h4>"+
                "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorInicial+"</b></h4>"+
                "</div>"+
                "<div class='col-md-4 text-center'>"+
                "<h4 class='font-weight-light'><b>Valor venta rápida</b></h4>"+
                "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorTotal+"</b></h4>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "<br>");

                $("#"+idEliminar).tooltip(); // Inicio el tooltip de cada subasta

               
                $("#"+idEliminar).on("click",function(){ // Al hacer click en el botón de eliminar en cualquier subasta, hago lo siguiente

                    // Elimino el elemento general de la subasta para demostrar visualmente que la subasta ha sido eliminada
                    $(this).parent("div").parent("div").remove();
                    // Elimino el tooltip para solventar un problema visual al eliminar la subasta
                    $(".tooltip-inner").remove();
                    $(".arrow").remove();

                    // Realizo una consulta a la BBDD para que elimine la subasta
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data: {idSubasta: idEliminar.replace('eliminarAd','')}, // Antes de pasarle el id de la subasta, elimino la palabra 'eliminar' que tenía
                        //Cambiar a type: POST si necesario
                        type: "POST",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: "../db/s/sEliminarSubasta.php",
                    })
                    .done(function(data) {
                        if(data.correcto){ // Si se ha eliminado correctamente

                            // Creo un nuevo div para mostrar una información clara de que se ha eliminado la subasta
                            let panelAdministrarSubastas = $("#panelAdministrarSubastas");
                            panelAdministrarSubastas.append("<div class='border-gradient-effect'>"+
                            "<h3 class='my-4'>Subasta eliminada</h3>"+
                            "</div>"+
                            "<br>");
                        }
                        else{ // Si no se ha eliminado correctamente
                            
                            // Creo un nuevo div para mostrar una información clara de que se ha ocurrido un error al eliminar la subasta
                            let panelAdministrarSubastas = $("#panelAdministrarSubastas");
                            panelAdministrarSubastas.append("<div class='border-gradient-effect'>"+
                            "<h3 class='my-4'>Error al eliminar la subasta. Refresque la página.</h3>"+
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

        // //////////// FIN /// ZONA ADMINISTRAR SUBASTAS /////////////////////
        
        
        









        // //////////// ZONA MIS SUBASTAS /////////////////////

        // ====== Carga de las subastas del usuario logeado ======

        var divIdUser = $("#divIdUser").text(); // Guardo el id del usuario logeado

        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {idUserLogin: divIdUser}, // Envío el id del usuario logeado
            //Cambiar a type: POST si necesario
            type: "GET",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "../db/s/sObtenerSubastasDelUsuario.php",
        })
        .done(function(data) {

            // Si no hay subastas creadas para el usuario logueado, muestro el siguente mensaje en el modal
            if(data.noHaySubastas){
                let panelMisSubastas = $("#panelMisSubastas");
                panelMisSubastas.append("<h2 class='my-4 text-center'>No tienes ninguna subasta activa</h2>");
            }

            // Si hay subastas creadas para el usuario logueado, muestro dichas subastas
            $.each(data.subastas, function (key, value) { // Por cada registro, hago lo siguiente
                //console.log(value.sId);
                var idEliminar = "eliminar"+value.sId; // Variable para poder identificar cada registro para eliminar. Se usa más adelante

                // Muestro las subastas del usuario
                let panelMisSubastas = $("#panelMisSubastas");
                panelMisSubastas.append("<div class='border-gradient-effect'>"+
                "<div class='text-right divbtncerrar'>"+
                "<button id='"+idEliminar+"'  class='btn btncerrar' title='Borrar subasta' data-toggle='tooltip' data-placement='left'><i class='fas fa-times'></i></button>"+
                "</div>"+
                "<h4 class='font-weight-light'>"+value.sAnyo+" <b>"+value.sMarca+"</b> "+value.sModelo+"</h4>"+
                "<hr>"+
                "<div class='row'>"+
                "<div class='col-md-4'>"+
                "<h5 class='font-weight-light'>"+value.sClase+"</h5>"+
                "</div>"+
                "<div class='col-md-4 text-center'>"+
                "<h4 class='font-weight-light'><b>Valor puja actual</b></h4>"+
                "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorInicial+"</b></h4>"+
                "</div>"+
                "<div class='col-md-4 text-center'>"+
                "<h4 class='font-weight-light'><b>Valor venta rápida</b></h4>"+
                "<h4 class='font-weight-light'><i class='fas fa-coins'></i> <b>"+value.sValorTotal+"</b></h4>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "<br>");

                $("#"+idEliminar).tooltip(); // Inicio el tooltip de cada subasta

                $("#"+idEliminar).on("click",function(){ // Al hacer click en el botón de eliminar en cualquier subasta, hago lo siguiente

                    // Elimino el elemento general de la subasta para demostrar visualmente que la subasta ha sido eliminada
                    $(this).parent("div").parent("div").remove();
                    // Elimino el tooltip para solventar un problema visual al eliminar la subasta
                    $(".tooltip-inner").remove();
                    $(".arrow").remove();

                    // Realizo una consulta a la BBDD para que elimine la subasta
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data: {idSubasta: idEliminar.replace('eliminar','')}, // Antes de pasarle el id de la subasta, elimino la palabra 'eliminar' que tenía
                        //Cambiar a type: POST si necesario
                        type: "POST",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: "../db/s/sEliminarSubasta.php",
                    })
                    .done(function(data) {
                        if(data.correcto){ // Si se ha eliminado correctamente

                            // Creo un nuevo div para mostrar una información clara de que se ha eliminado la subasta
                            let panelMisSubastas = $("#panelMisSubastas");
                            panelMisSubastas.append("<div class='border-gradient-effect'>"+
                            "<h3 class='my-4'>Subasta eliminada</h3>"+
                            "</div>"+
                            "<br>");
                        }
                        else{ // Si no se ha eliminado correctamente
                            
                            // Creo un nuevo div para mostrar una información clara de que se ha ocurrido un error al eliminar la subasta
                            let panelMisSubastas = $("#panelMisSubastas");
                            panelMisSubastas.append("<div class='border-gradient-effect'>"+
                            "<h3 class='my-4'>Error al eliminar la subasta. Refresque la página.</h3>"+
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

        // //////////// FIN /// ZONA MIS SUBASTAS /////////////////////
















        // //////////// ZONA COMENZAR SUBASTA /////////////////////

        // ====== Carga de los modelos según la marca seleccionada ======
        $("#inputMarca").on("change focus",function(){
            //console.log($(this).children("option").filter(":selected").text());
            //console.log($(this).val());

            // Antes de cargar los modelos de cada marca, elimino los options que pueda tener en el select de Modelos,
            // los valores de los input, el atributo min de los input de valores y deshabilitamos el botón de Comenzar Subasta
            $("#inputModelo").children().remove().end(); 
            $("#inputAnyo").val("");
            $("#inputClase").val("");
            $("#inputValorInicial").val("");
            $("#inputValorInicial").removeAttr("min");
            $("#inputValorTotal").val("");
            $("#inputValorTotal").removeAttr("min");
            $("#btnComenzarSubasta").attr("disabled", "disabled");

            $.ajax({
                // Envío el nombre de la marca y el ID del usuario logueado
                data: {marca: $(this).val(), idUser: $("#inputIdUsuarioLogin").val()}, 
                //Cambiar a type: POST si necesario
                type: "GET",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "../db/s/sListarModelosPorMarcaCoches.php",
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
                    url: "../db/s/sDatosCochePorModelo.php",
                })
                .done(function(data) {
                    let datoscoche = data.datoscoche[0];

                    // Rellenamos los input con los datos del modelo seleccionado 
                    // Y activamos el botón de Comenzar Subasta
                    $("#inputIdCoche").val(datoscoche.id);
                    $("#inputAnyo").val(datoscoche.anyo);
                    $("#inputClase").val(datoscoche.clase);
                    $("#inputValorInicial").attr("min", datoscoche.valor_inicial);
                    $("#inputValorInicial").val(datoscoche.valor_inicial);
                    $("#inputValorTotal").attr("min", datoscoche.valor_total);
                    $("#inputValorTotal").val(datoscoche.valor_total);
                    $("#btnComenzarSubasta").removeAttr("disabled");

                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                });
                
            }
          
        });

        // //////////// FIN /// ZONA COMENZAR SUBASTA /////////////////////





    });

})(jQuery);