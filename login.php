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

    <!-- Php encargado de verificar el login -->
    <?php include("db/loginUsuario.php"); ?>

</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
        
            <div class="card-img-left d-none d-md-flex">
                
                <!-- La imagen de fondo se establece en el CSS -->

                <!-- Div para que se pueda hacer click y volver al index -->
                <a style="display:block" href="index.php">
                    <div style="width: 370px;"></div>
                </a>
            </div>
        
            <div class="card-body">
            <h5 class="card-title text-center">Iniciar sesión</h5>
            <form action="" method="post" class="form-signin">
                <div class="form-label-group"> <!-- Nombre de usuario -->
                    <input type="text" id="inputUsuario" name="inputUsuario" class="form-control" placeholder="Usuario" max="50" required autofocus>
                    <label for="inputUsuario">Nombre de usuario</label>
                </div>
                
                <div class="form-label-group"> <!-- Nombre de usuario -->
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" max="50" required>
                    <label for="inputPassword">Contraseña</label>
                </div>
                
                <hr class="my-4">

                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btnlogin" name="btnlogin" type="submit">Iniciar sesión</button>
                
                <hr class="my-4">

                <h5 class="card-subtitle text-center">¿No tienes una cuenta? ¡Regístrate!</h5>
                <a class="btn btn-lg btn-secondary btn-block text-uppercase" href="registro.php">Registrarse</a>
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
<?php if(isset($modalerrorlogin) && $modalerrorlogin){ ?>
    <script>
        $(document).ready(function(){
            $("#modalComentarioMensaje").text("Usuario o contraseña incorrecto");
            $("#modalComentario").modal();
        });    
    </script>
<?php } ?>




  <!-- JS del final del body -->
  <?php include("includes/body_contents.php");?>


</body>

</html>