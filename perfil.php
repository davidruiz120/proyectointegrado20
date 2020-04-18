<?php include("includes/h_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Contenido del head -->
  <?php include("includes/head_contents.php");?>

    <!-- Solo en Perfil -->
    <link href="css/perfil.css" rel="stylesheet">

  <!-- Php encargado de actualizar los datos del usuario en la base de datos -->
  <?php include("db/pActualizarPerfilUsuario.php"); ?>

</head>

<body id="page-top">

  <!-- Navbar -->
  <?php include("includes/navigation.php");?>



<div class="container margen-superior-150">
<div class="card border-0 shadow my-5">
<div class="card-body p-5">


<!-- Si hay un usuario logeado -->
<?php if(isset($_SESSION["idUser"]) && isset($_SESSION["nombreusuarioUser"]) && isset($_SESSION["rolUser"])) { ?>
    
    <!-- ===== PERFIL PERSONAL ===== -->

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
        <div class="row">
          <div class="col-lg-3"><b>Créditos</b></div>
          <div class="col-lg-3"><i class="fas fa-coins"></i> <?php echo $_SESSION["creditosUser"]; ?></div>
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
    

    <!-- ===== VEHÍCULOS PERSONALES ===== -->

    <!-- Container principal -->
    <div class="container margen-superior-100">
    <div class="row">

    <!-- Columna en donde se verán los vehículos personales -->
    <div class="col-md-8 border-right">

      <h3 class="text-center">Vehículos personales</h3>
      <hr class="divider my-4">

      <div id="panelVehiculosPersonales">

        <!-- Los vehículos personales se rellenan en el js/perfil.js -->

        <!--<div class="border-gradient-effect">
          <div class="text-right divbtncerrar">
            <button id="+idBorrar+" class='btn btncerrar' title='Borrar vehículo personal' data-toggle='tooltip'><i class='fas fa-times'></i></button>
          </div>
          <h4 class="font-weight-light">2007 <b>Alfa Romeo</b> 8C Competizione | A 777</h4>
        </div>
        <br>-->

      </div>

    </div> <!-- Fin/ Div Columna en donde se verán los vehículos personales -->

    <!-- Columna Añadir Vehículo Personal -->
    <div class="col-md-4">

      <hr>
      <h4 class="font-weight-light">Añadir vehículo</h4>
      <hr>

      <form action="../db/pAnyadirVehiculoPersonal.php" method="post" class="form-signin">
              
        <div class="form-label-group"> <!-- Marca -->
            <label for="inputMarca">Marca</label>
            <select name="inputMarca" id="inputMarca" class="form-control" placeholder="Marca" required>
                
                <!-- Archivo encarcado de mostrar las diferentes marcas en el select -->
                <?php include("db/pListarMarcasCoches.php") ?>

            </select>
        </div>
    
        <br>

        <div class="form-label-group"> <!-- Modelo -->
            <label for="inputModelo">Modelo</label>
            <select name="inputModelo" id="inputModelo" class="form-control" placeholder="Modelo" required>
                
              <!-- El archivo js/perfil.js es el encargado de rellenar ese select -->

            </select>
        </div>

        <br>
        
        <div class="form-label-group"> <!-- Año -->
            <label for="inputAnyo">Año</label>
            <input type="text" name="inputAnyo" id="inputAnyo" class="form-control" readonly>
        </div>

        <br>
        
        <div class="form-label-group"> <!-- Clase -->
            <label for="inputClase">Clase</label>
            <input type="text" name="inputClase" id="inputClase" class="form-control" readonly>
        </div>

        <!-- Campo oculto para enviar el id del vehículo, que se rellena en el archivo js/perfil.js -->
        <input type="text" name="inputIdCoche" id="inputIdCoche" hidden>

        <!-- Campo oculto para enviar el id del usuario que agrega el vehículo -->
        <input type="hidden" name="inputIdUsuarioLogin" id="inputIdUsuarioLogin" value="<?php echo $_SESSION["idUser"]; ?>">

        <hr>
        <button class="btn btn-sm btn-primary btn-block text-uppercase" id="btnAnyadirVehiculoPersonal" name="btnAnyadirVehiculoPersonal" type="submit" disabled><i class="fas fa-car"></i> Añadir vehículo</button>
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

  <!-- Script para múltiples funciones del Perfil -->
  <script src="js/perfil.js"></script>

</body>

</html>
