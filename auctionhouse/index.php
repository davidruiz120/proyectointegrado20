<?php include("../includes/h_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Contenido del head -->
  <?php include("../includes/head_contents.php");?>

  <!-- CSS exclusivo de la Casa de Subastas -->
  <link href="../css/auctionhouse.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navbar -->
  <?php include("../includes/navigation.php");?>

<!-- Cabecera -->
<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="../img/video-auctionhouse.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3">Casa de Subastas</h1>
      </div>
    </div>
  </div>
</header>


<!-- Container principal -->
<div class="container margen-superior-50">
<div class="row">

<!-- Si no hay un usuario logeado, nos avisará de que iniciemos sesión -->
<?php if(!isset($_SESSION["idUser"]) && !isset($_SESSION["nombreusuarioUser"]) && !isset($_SESSION["rolUser"])) { ?>

  <div class="col-md-12 border-gradient-effect">
    <h1 class="font-weight-light text-center">Debe iniciar sesión para poder usar la Casa de Subastas</h1>
    <hr>
    <div class="space-20"></div>
    <div class="text-center"><a class="btn btn-primary btn-xl js-scroll-trigger" href="/login.php">Iniciar sesión</a></div>
  </div>

<?php } else { ?> <!-- Si hay un usuario logeado, mostrará la Casa de Subasta -->

<!-- Columna en donde se verán los coches en venta -->
<div class="col-md-8 border-right">

  <h1 class="my-4">Subastas destacadas
    <!-- <small>Secondary Text</small> -->
  </h1>

  <div id="panelSubastasDestacadas">

    <!-- Las subastas descatadas se rellenan en el js/auctionhouse.js -->

    <!-- <div class="border-gradient-effect">
      <div class="text-right divbtncerrar">
        <button id="+idBorrar+" class='btn btncerrar' title='Borrar usuario' data-toggle='tooltip'><i class='fas fa-times'></i></button>
      </div>
      <h4 class="font-weight-light">2007 <b>Alfa Romeo</b> 8C Competizione</h4>
      <hr>
      <div class="row">
      <div class="col-md-4">
        <h5 class="font-weight-light">A 777</h5>
        <hr>
        <h5 class="font-weight-light"> Publicado por <b>NombreUsuario</b></h5>
      </div>
      <div class="col-md-4 text-center">
        <h4 class="font-weight-light"><b>Pujar</b></h4>
        <h4 class="font-weight-light"><i class="fas fa-coins"></i> <b>2000</b></h4>
        <div class="text-center"><a class="btn btn-primary btn-sm js-scroll-trigger" href="/login.php">Pujar</a></div>
      </div>
      <div class="col-md-4 text-center">
        <h4 class="font-weight-light"><b>Comprar ya</b></h4>
        <h4 class="font-weight-light"><i class="fas fa-coins"></i> <b>74000</b></h4>
        <div class="text-center"><a class="btn btn-primary btn-sm js-scroll-trigger" href="/login.php">Comprar ya</a></div>
      </div>
      </div>
    </div>
    <br> -->

  </div>
  
  <?php include("modalesSubastas.php"); ?>

</div>

<!-- Columna Opciones del Usuario -->
<div class="col-md-4">

  

<div class="accordion" id="accordionExample">
  <!-- Primera opción | Administrar subastas | SOLO ADMINISTRADORES -->
  <?php if($_SESSION["rolUser"] == 1) { ?>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Administrar subastas
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <button class="btn btn-sm btn-primary btn-block text-uppercase" href="#modalAdministrarSubastas" data-toggle="modal" id="btnVerMisSubastas" name="btnVerMisSubastas"><i class="fas fa-tools"></i> Administrar subastas</button>
      </div>
    </div>
  </div>
  <?php } ?>
  <!-- Segunda opción | Mis subastas -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Mis subastas
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <button class="btn btn-sm btn-primary btn-block text-uppercase" href="#modalMisSubastas" data-toggle="modal" id="btnVerMisSubastas" name="btnVerMisSubastas"><i class="fas fa-user-tag"></i> Ver mis subastas</button>
      </div>
    </div>
  </div>
  <!-- Tercera opción | Comenzar subasta -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Comenzar subasta
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        
      <form action="../db/s/sCrearSubasta.php" method="post" class="form-signin">
            
            <div class="form-label-group"> <!-- Marca -->
                <label for="inputMarca">Marca</label>
                <select name="inputMarca" id="inputMarca" class="form-control" placeholder="Marca" required>
                    
                    <!-- Archivo encarcado de mostrar las diferentes marcas en el select -->
                    <?php include("../db/s/sListarMarcasCoches.php") ?>

                </select>
            </div>
        
            <br>

            <div class="form-label-group"> <!-- Modelo -->
                <label for="inputModelo">Modelo</label>
                <select name="inputModelo" id="inputModelo" class="form-control" placeholder="Modelo" required>
                    
                  <!-- El archivo js/auctionhouse.js es el encargado de rellenar ese select -->

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

            <br>
            
            <div class="form-label-group"> <!-- Valor inicial -->
                <label for="inputValorInicial">Valor inicial</label>
                <input type="number" name="inputValorInicial" id="inputValorInicial" class="form-control" required>
            </div>

            <br>
            
            <div class="form-label-group"> <!-- Valor total -->
                <label for="inputValorTotal">Valor total</label>
                <input type="number" name="inputValorTotal" id="inputValorTotal" class="form-control" required>
            </div>

            <!-- Campo oculto para enviar el id del vehículo, que se rellena en el archivo js/auctionhouse.js -->
            <input type="text" name="inputIdCoche" id="inputIdCoche" hidden>

            <!-- Campo oculto para enviar el id del usuario que crea la subasta -->
            <input type="hidden" name="inputIdUsuarioLogin" id="inputIdUsuarioLogin" value="<?php echo $_SESSION["idUser"]; ?>">

            <hr>
            <button class="btn btn-sm btn-primary btn-block text-uppercase" id="btnComenzarSubasta" name="btnComenzarSubasta" type="submit" disabled><i class="fas fa-car"></i> Comenzar subasta</button>
         </form>


      </div>
    </div>
  </div>
  <!-- <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div> -->
</div>



</div>

<?php } ?> <!-- Fin Else -->

</div>
<!-- /.row -->
</div>
<!-- /.container principal -->






  <!-- Footer -->
  <?php include("../includes/footer.php");?>

  
  <!-- JS del final del body -->
  <?php include("../includes/body_contents.php");?>


  <!-- Script para múltiples funciones de la Casa de Subastas -->
  <script src="../js/auctionhouse.js"></script>

</body>

</html>