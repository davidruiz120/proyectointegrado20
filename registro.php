<?php include("includes/h_config.php"); ?>
<html lang="es">

<head>

  <!-- Contenido del head -->
  <?php include("includes/head_contents.php");?>

  <!-- Solo en Login y Registro -->
  <link href="css/login-registro.css" rel="stylesheet">

<?php
    // Primera comprobación | Si ya existe un usuario, se redirige al index
    if(isset($_SESSION["idUser"])){
        header("Location: index.php");
    }
?>

  <!-- Php encargado de insertar el usuario en la base de datos -->
  <?php include("db/registrarUsuario.php"); ?>

</head>

<body class="body-registro">


<div class="container">
<div class="row">
<div class="col-lg-10 col-xl-9 mx-auto">
<div class="card card-signin flex-row my-5">
    <div class="card-img-left d-none d-md-flex">
        <!-- Background image for card set in CSS! -->
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">Registro</h5>
        <p class="text-center" style="font-size: 12px;">Los campos con el símbolo (*) son obligatorios</p>
        <hr>
        
        <form action="" method="post" class="form-signin">
            
            <div class="form-label-group"> <!-- Nombre de usuario -->
                <input type="text" id="inputUsuario" name="inputUsuario" class="form-control" placeholder="Usuario" max="50" required autofocus>
                <label for="inputUsuario">Nombre de usuario *</label>
                <div class="text-center" id="userYaExistente" hidden><i class="fas fa-exclamation-triangle text-danger"></i> <span>Ya existe un registro con este usuario</span></div>
            </div>
        
            <hr>

            <div class="form-label-group"> <!-- Contraseña -->
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" max="50" required>
                <label for="inputPassword">Contraseña *</label>
                <div class="text-center" id="passNoSegura" data-toggle="tooltip" data-placement="top" title="La contraseña debe incluir al menos una minúscula, una mayúscula, un número y que sea mínimo de 6 caracteres" hidden><i class="fas fa-exclamation-triangle text-danger"></i> <span>Contraseña insegura</span></div>
                <div class="text-center" id="passSegura" hidden><i class="fas fa-check-circle text-success"></i> <span>Contraseña segura</span></div>
            </div>
            
            <div class="form-label-group"> <!-- Confirmar contraseña -->
                <input type="password" id="inputConfirmarPassword" name="inputConfirmarPassword" class="form-control" placeholder="ConfirmarPassword" max="50" required>
                <label for="inputConfirmarPassword">Confirmar contraseña *</label>
                <div class="text-center" id="passNoCoinciden" hidden><i class="fas fa-exclamation-triangle text-danger"></i> <span>Las contraseñas no coinciden</span></div>
            </div>

            <div class="form-label-group"> <!-- Email -->
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" max="50" required>
                <label for="inputEmail">Correo electrónico *</label>
                <div class="text-center" id="emailNoValido" hidden><i class="fas fa-exclamation-triangle text-danger"></i> <span>Email no válido</span></div>
            </div>
            
            <hr>

            <div class="form-label-group"> <!-- Nombre -->
                <input type="text" name="inputNombre" id="inputNombre" class="form-control" placeholder="Nombre" max="50" required>
                <label for="inputNombre">Nombre *</label>
            </div>

            <div class="form-label-group"> <!-- Apellido 1 -->
                <input type="text" name="inputApellido1" id="inputApellido1" class="form-control" max="50" placeholder="Apellido1" required>
                <label for="inputApellido1">Apellido 1 *</label>
            </div>

            <div class="form-label-group"> <!-- Apellido 2 -->
                <input type="text" name="inputApellido2" id="inputApellido2" class="form-control" max="50" placeholder="Apellido2">
                <label for="inputApellido2">Apellido 2</label>
            </div>

            <hr>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btnregistrarse" name="btnregistrarse" type="submit" disabled>Registrarse</button>
            <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button> -->
        </form>
    </div>
</div>
</div>
</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalComentario">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
    
    <!-- Contenido del modal -->
    <div class="modal-body text-center">
        <span id="modalComentarioMensaje" class="h6"></span>
    </div>
    
    <!-- Pie del modal -->
    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block text-uppercase" data-dismiss="modal">Cerrar</button>
    </div>
    
    </div>
    </div>
</div>

<!-- Script para activar el modal al ocurrirse un error --> 
<?php if(isset($modalnoinsertado) && $modalnoinsertado){ ?>
    <script>
        $("#modalComentarioMensaje").text("Ha habido un error del servidor al registrarse");
        $("#modalComentario").modal();;    
    </script>
<?php } ?>



  <!-- JS del final del body -->
  <?php include("includes/body_contents.php");?>

  <!-- Script para la validación del registro -->
  <script src="js/registro.js"></script>

</body>

</html>