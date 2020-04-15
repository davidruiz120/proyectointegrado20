(function ($) {

    $(document).ready(function(){

        // Inicializamos unas variables que nos servirán para verificar cada punto del registro
        var checkNombreUsuario = false;
        var checkPassword = false;
        var checkConfirmarPassword = false;
        //var checkEmail = false;
        $("#passNoSegura").tooltip(); // Y también el tooltip que nos dará mas info de la contraseña insegura
        
        // === Comprobación de la contraseña ===
        document
            .getElementById('inputPassword')
            .addEventListener('input', function(evt) {
                const campo = evt.target,
                    
                    
                    // Expresión regular que debe de cumplir la contraseña
                    regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0123456789]/;

                // Comprobamos si se cumplen los requisitos
                if (regex.test(campo.value) && campo.value.length >= 6) { // Si es así:
                    checkPassword = true; // Confirmamos que la contraseña es correcta
                    comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                    $("#passNoSegura").attr("hidden", "hidden"); // Quitamos el mensaje de contraseña no segura si es que lo tenía antes
                    $("#passSegura").removeAttr("hidden"); // Informamos que la contraseña es segura
                    $('#inputPassword').removeClass("borde-rojo"); // Quitamos el borde rojo al input si es que lo tenía antes
                    $("#inputPassword").addClass("borde-verde"); // Agregamos el borde verde al input para aclarar que es válido
                } else { // Si no se cumple:
                    checkPassword = false; // Confirmamos que la contraseña es incorrecta
                    comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                    $("#passSegura").attr("hidden", "hidden"); // Quitamos el mensaje de contraseña segura si es que lo tenía antes
                    $("#passNoSegura").removeAttr("hidden"); // Informamos que la contraseña no es segura
                    $('#inputPassword').removeClass("borde-verde"); // Quitamos el borde verde al input si es que lo tenía antes
                    $("#inputPassword").addClass("borde-rojo"); // Agregamos el borde rojo al input para aclarar que no es válido
                }
        });


        // === Comprobación de la confirmación de la contraseña ===
        $("#inputConfirmarPassword").on("input",function(){
            var vConfirmarPassword = $("#inputConfirmarPassword").val();
            var vPassword = $("#inputPassword").val();
            
            if(vConfirmarPassword == vPassword){ // Si son iguales
                //$("#btnregistrarse").removeAttr("disabled");  // Habilitamos el botón de registrarse
                checkConfirmarPassword = true; // Confirmamos que la confirmación de contraseña es correcta
                comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                $("#passNoCoinciden").attr("hidden", "hidden"); // Quitamos el mensaje de que las contraseñas no coinciden si es que lo tenía antes
                $('#inputConfirmarPassword').removeClass("borde-rojo"); // Quitamos el borde rojo al input si es que lo tenía antes
                $("#inputConfirmarPassword").addClass("borde-verde"); // Agregamos el borde verde al input para aclarar que coinciden
            } else { // Si son diferentes
                //$("#btnregistrarse").attr("disabled", "disabled");  // Deshabilitamos el botón de registrarse
                checkConfirmarPassword = false; // Confirmamos que la confirmación de contraseña no es correcta
                comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                $("#passNoCoinciden").removeAttr("hidden"); // Añadimos el mensaje de que las contraseñas no coinciden si es que lo tenía antes
                $('#inputConfirmarPassword').removeClass("borde-verde"); // Quitamos el borde verde al input si es que lo tenía antes
                $("#inputConfirmarPassword").addClass("borde-rojo"); // Agregamos el borde rojo al input para aclarar que no coinciden
            }

        });


        // === Comprobación del email ===
        // $("#inputEmail").on("input",function(evt){
            
        //     const campo = $(this).val();
            
        //     // Expresión regular que debe de cumplir el email
        //     //const regex = new RegExp("^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$");
        //     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
        //     if(regex.text(campo)){ // Si es válido
        //         checkEmail = true; // Confirmamos que la el email es válido
        //         comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
        //         $("#emailNoValido").attr("hidden", "hidden"); // Quitamos el mensaje que informa que el email no es válido
        //         $('#inputEmail').removeClass("borde-rojo"); // Quitamos el borde rojo al input si es que lo tenía antes
        //     } else { // Si no lo es
        //         checkEmail = false; // Confirmamos que la el email no es válido
        //         comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
        //         $("#emailNoValido").removeAttr("hidden"); // Añadimos el mensaje de que el email no es válido
        //         $("#inputEmail").addClass("borde-rojo"); // Agregamos el borde rojo al input para aclarar que no coinciden
        //     }

        // });

        
        

        // === Comprobación del usuario ===

        //Compruebo que el usuario no exista en la BD 
        $("#inputUsuario").on("input",function(){
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {nombreusuario: $(this).val()}, // Le paso el contenido del input
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "../db/comprobarNombreUsuario.php",
            })
            .done(function(data) {
                //alert("Correcto: "+data.correcto);
                if(data.existe){ // Si ya existe el nombre de usuario:
                    //$("#btnregistrarse").attr("disabled", "disabled"); // Deshabilitamos el botón del registro
                    checkNombreUsuario = false; // Confirmamos que el usuario existe
                    comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                    $("#inputUsuario").addClass("borde-rojo"); // Agregamos un borde rojo al input
                    $("#userYaExistente").removeAttr("hidden"); // Agregamos un mensaje indicando que el nombre de usuario ya existe
                }
                else{ // Si no existe:
                    //$("#btnregistrarse").removeAttr("disabled"); // Habilitamos el botón del registro
                    checkNombreUsuario = true; // Confirmamos que el usuario no existe
                    comprobarRegistro(); // Llamamos a esta función para que compruebe el resto del formulario
                    $("#inputUsuario").removeClass("borde-rojo"); // Quitamos el borde rojo al input si lo tuviera
                    $("#userYaExistente").attr("hidden", "hidden"); // Quitamos el mensaje de usuario existente si lo tuviera
                }
            });
        });


        // Funcion que comprueba si el formulario es correcto
        // Comprobando que el nombre de usuario, contaseña y confirmar contraseña estén permitidos
        function comprobarRegistro(){
            if(checkNombreUsuario == true && checkPassword == true && checkConfirmarPassword == true){
                $("#btnregistrarse").removeAttr("disabled");
            } else {
                $("#btnregistrarse").attr("disabled", "disabled");
            }
        }


    });

    


})(jQuery);