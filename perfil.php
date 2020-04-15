<?php include("includes/h_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Contenido del head -->
  <?php include("includes/head_contents.php");?>

    <!-- Solo en Perfil -->
    <link href="css/perfil.css" rel="stylesheet">

  <!-- Php encargado de actualizar los datos del usuario en la base de datos -->
  <?php include("db/actualizarPerfilUsuario.php"); ?>

</head>

<body id="page-top">

  <!-- Navbar -->
  <?php include("includes/navigation.php");?>



<div class="container margen-superior-150">
<div class="card border-0 shadow my-5">
<div class="card-body p-5">


<!-- Si hay un usuario logeado -->
<?php if(isset($_SESSION["idUser"]) && isset($_SESSION["nombreusuarioUser"]) && isset($_SESSION["rolUser"])) { ?>
    
    <!-- Título principal -->
    <h1 class="font-weight-light">Perfil personal</h1>
    <div class="space-30"></div>

    <!-- Pequeña barra de navegación -->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#verperfil" class="nav-link">Ver perfil</a></li>
        <li><a data-toggle="tab" href="#editarperfil" class="nav-link">Editar perfil</a></li>
    </ul>

    <!-- Contenido de cada pestaña -->
    <div class="tab-content">
    <div id="verperfil" class="tab-pane fade in active show">
        <div class="container margen-superior">

        <h3 class="text-center">Ver perfil</h3>
        <hr class="divider my-4">
        <div class="row">
          <div class="col-lg-3"><b>Nombre de usuario</b></div>
          <div class="col-lg-3"><?php echo $_SESSION["nombreusuarioUser"]; ?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3"><b>Email</b></div>
          <div class="col-lg-3"><?php echo $_SESSION["emailUser"]; ?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3"><b>Nombre personal</b></div>
          <div class="col-lg-3"><?php echo $_SESSION["nombreUser"]; ?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3"><b>Primer apellido</b></div>
          <div class="col-lg-3"><?php echo $_SESSION["apellido1User"]; ?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3"><b>Segundo apellido</b></div>
          <div class="col-lg-3"><?php echo $_SESSION["apellido2User"]; ?></div>
        </div>
        <hr>
        
        </div>
    </div>
    <div id="editarperfil" class="tab-pane fade">
        <div class="container margen-superior">

        <h3 class="text-center">Editar perfil</h3>
        <hr class="divider my-4">
        <div class="space-30"></div>
        
        <form action="" method="post" class="form-perfilpersonal">
            <div class="form-label-group"> <!-- Nombre -->
              <label for="inputNombre">Nombre *</label>
              <input type="text" name="inputNombre" id="inputNombre" class="form-control" value="<?php echo $_SESSION["nombreUser"]; ?>" max="50" required>
            </div>
            <div class="space-30"></div>

            <div class="form-label-group"> <!-- Email -->
              <label for="inputEmail">Email *</label>
              <input type="email" name="inputEmail" id="inputEmail" class="form-control" value="<?php echo $_SESSION["emailUser"]; ?>" max="50" required>
            </div>
            <div class="space-30"></div>

            <div class="form-label-group"> <!-- Apellido 1 -->
              <label for="inputApellido1">Apellido 1 *</label>
              <input type="text" name="inputApellido1" id="inputApellido1" class="form-control" value="<?php echo $_SESSION["apellido1User"]; ?>" max="50" required>
            </div>
            <div class="space-30"></div>

            <div class="form-label-group"> <!-- Apellido 2 -->
              <label for="inputApellido2">Apellido 2</label>
              <input type="text" name="inputApellido2" id="inputApellido2" class="form-control" value="<?php echo $_SESSION["apellido2User"]; ?>" max="50" value="">
            </div>
            <div class="space-30"></div>

            <button class="btn btn-lg btn-primary text-uppercase" id="btnactualizar" name="btnactualizar" type="submit">Actualizar datos</button>
        </form>
        
        </div>
    </div>
    </div>
    
    

<?php } else { ?> <!-- Si no estás logueado, mostrará una advertencia para iniciar sesión -->

    <h1 class="font-weight-light text-center">Debe iniciar sesión para poder ver su perfil</h1>
    <hr>
    <div class="space-20"></div>
    <div class="text-center"><a class="btn btn-primary btn-xl js-scroll-trigger" href="/login.php">Iniciar sesión</a></div>

<?php } ?>


</div>
</div>
</div>







  <!-- Footer -->
  <?php include("includes/footer.php");?>

  
  <!-- JS del final del body -->
  <?php include("includes/body_contents.php");?>

</body>

</html>
