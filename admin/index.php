<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php
    // Primera comprobación | Si no existe ninguna sesión, se redirige al index principal
    if(!isset($_SESSION["idUser"])){
      header("Location: ../index.php");
    }
    // Segunda comprobación | Si el usuario no tiene permisos de administrador, se redirigirá al index principal
    if(isset($_SESSION["rolUser"]) && $_SESSION["rolUser"] == 0){
        header("Location: ../index.php");
    }
?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forza ATAX | Panel de administración</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>

  <!-- Custom fonts for this template-->
  <script src="https://kit.fontawesome.com/73b5a2bda4.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img width="100%;" src="../img/ForzaATAX-logo-white.png">
        </div>
        <div class="sidebar-brand-text mx-3">Panel Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administración
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Tablas</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="tabla_usuario.php"><i class="fas fa-users"></i>  Usuarios</a>
            <a class="collapse-item" href="tabla_coches.php"><i class="fas fa-car"></i>  Coches</a>
            <a class="collapse-item" href="tabla_propiedades.php"><i class="fas fa-house-user"></i>  Propiedades</a>
            <a class="collapse-item" href="tabla_subastas.php"><i class="fas fa-user-tag"></i>  Subastas</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1">
            <a href="../" class="btn btn-light btn-icon-split" style="position: relative; top: 15px;">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Volver a Forza ATAX</span>
                  </a>
            </li>
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nombreUser"]." ".$_SESSION["apellido1User"]  ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logoff.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Panel</h1>

          <div class="row">

            <div class="col-lg-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Administrar tablas</h6>
                </div>
                <div class="card-body">

                  <a href="tabla_usuario.php" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                      <i class="fas fa-users"></i>
                    </span>
                    <span class="text">Tabla - Usuarios</span>
                  </a>

                  <a href="tabla_coches.php" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                      <i class="fas fa-car"></i>
                    </span>
                    <span class="text">Tabla - Coches</span>
                  </a>

                  <a href="tabla_propiedades.php" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                      <i class="fas fa-house-user"></i>
                    </span>
                    <span class="text">Tabla - Propiedades</span>
                  </a>

                  <a href="tabla_subastas.php" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                      <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="text">Tabla - Subastas</span>
                  </a>

                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date("Y"); ?> - David Ruiz Hurtado</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de cerrar la sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Haz click en 'Cerrar sesión' para asegurarte de terminar con la sesión actual</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../logoff.php">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="js/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


</body>

</html>
