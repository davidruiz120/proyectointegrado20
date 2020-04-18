<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
<div class="container">

    <?php if($CURRENT_PAGE == "Index") { ?>
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/ForzaATAX-logo-white.png" alt="Logo" class="navbar-logo"></a>
    <?php } else { ?>
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="../img/ForzaATAX-logo-white.png" alt="Logo" class="navbar-logo"></a>
    <?php } ?>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto my-2 my-lg-0">
        
        <!-- Inicio -->
        <li class="nav-item">
            <?php if($CURRENT_PAGE == "Index") { ?>
                <a class="nav-link js-scroll-trigger" href="#page-top">Inicio</a>
            <?php } else { ?>
                <a class="nav-link js-scroll-trigger" href="/index.php">Inicio</a>
            <?php } ?>
        </li>

        <!-- Casa de Subastas -->
        <li class="nav-item">
            <?php if($CURRENT_PAGE == "Index") { ?>
                <a class="nav-link js-scroll-trigger" href="auctionhouse/">Casa de Subastas</a>
            <?php } else if($CURRENT_PAGE == "Casa de Subastas") { ?>
                <a class="nav-link js-scroll-trigger" href="#page-top">Casa de Subastas</a>
            <?php } else { ?>
                <a class="nav-link js-scroll-trigger" href="../auctionhouse/">Casa de Subastas</a>
            <?php } ?>
        </li>
        
        <!-- Contacto -->
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li> -->
    </ul>
    

    <!-- Iniciar sesión / Btn sesión iniciada -->

    <?php if(!isset($_SESSION["idUser"]) && !isset($_SESSION["nombreusuarioUser"]) && !isset($_SESSION["rolUser"])) { ?>

        <?php $_SESSION["pagActual"] = $_SERVER["PHP_SELF"];?> <!-- Aquí guardamos la página actual que servirá en el login -->
        <?php if($CURRENT_PAGE == "Index") { ?>
            <a class="btn btn-navbar-login js-scroll-trigger" href="login.php">Iniciar sesión</a>
        <?php } else { ?>
            <a class="btn btn-navbar-login js-scroll-trigger" href="../login.php">Iniciar sesión</a>
        <?php } ?>

    <?php } else { ?>

        <a class="btn btn-navbar-login dropdown-toggle js-scroll-trigger" href="" id="navbarDropdown" role="button" data-toggle="dropdown"><?php echo $_SESSION["nombreusuarioUser"]; ?></a>
        <div id="divIdUser" hidden><?php echo $_SESSION["idUser"]; ?></div> <!-- div para tener a mano el id del usuario para cuando haga falta en algún archivo javascript -->
        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown" style="background-color: #ea2f82;">
            
            <p class="dropdown-item-text text-white"><i class="fas fa-coins"></i> <?php echo $_SESSION["creditosUser"]; ?> </p>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item btn-primary text-white" href="/perfil.php"><i class="fas fa-user"></i> Perfil</a>
            
            <!-- Si el usuario logeado es un admin -->
            <?php if($_SESSION["rolUser"] == 1) { ?>
                <a class="dropdown-item btn-primary text-white" href="/admin/"><i class="fas fa-tools"></i> Administración</a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <?php $_SESSION["pagActual"] = $_SERVER["PHP_SELF"];?> <!-- Aquí guardamos la página actual que servirá en el logoff -->
            <a class="dropdown-item btn-primary text-white" href="/logoff.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>

    <?php } ?>
    
    </div>
</div>
</nav>