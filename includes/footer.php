<!-- Sección de conctacto -->
<section class="page-section" id="contact" style="background-color: #fff;">
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-8 text-center">
        <h2 class="mt-0">Contacto</h2>
        <hr class="divider my-4">
        <p class="text-muted mb-5">Síguenos y únete a nuestras comunidades, o contacta con nosotros a través de nuestro correo</p>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-3 ml-auto text-center">
        <a href="https://www.twitter.com/forzamotorsport" target="_blank">
        <i class="fab fa-twitter fa-3x mb-3 text-primary"></i>
        </a>
        <div>@forzamotorsport</div>
    </div>
    <div class="col-lg-3 ml-auto text-center">
        <a href="https://www.instagram.com/forzamotorsportofficial" target="_blank">
        <i class="fab fa-instagram fa-3x mb-3 text-primary"></i>
        </a>
        <div>@forzamotorsportofficial</div>
    </div>
    <div class="col-lg-3 mr-auto text-center">
        <a href="https://www.reddit.com/r/forza" target="_blank">
        <i class="fab fa-reddit-alien fa-3x mb-3 text-primary"></i>
        </a>
        <!-- <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a> -->
        <div>r/forza</div>
    </div>
    <div class="col-lg-3 mr-auto text-center">
        <a href="mailto:forzaatax@mail.com" target="_blank">
        <i class="fas fa-envelope fa-3x mb-3 text-primary"></i>
        </a>
        <!-- <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a> -->
        <div>forzaatax@mail.com</div>
    </div>
    </div>     
</div>
</section>

<!-- Footer -->
<footer class="bg-forza py-5">
<div class="container">
    <div class="row">
    <div class="col-lg-3 ml-auto text-center">

        <!-- Logo Turn10 -->
        <a href="https://www.forzamotorsport.net/en-us/turn10" target="_blank">
        <?php if($CURRENT_PAGE == "Index") { ?>
            <img src="img/turn10-logo-white.png" width="30%">
        <?php } else { ?>
            <img src="../img/turn10-logo-white.png" width="30%">
        <?php } ?>
        </a>

    </div>
    <div class="col-lg-3 ml-auto text-center">

        <!-- Logo PlayGround Games -->
        <a href="https://www.playground-games.com/" target="_blank">
        <?php if($CURRENT_PAGE == "Index") { ?>
            <img src="img/pg-logo-white.png" width="25%">
        <?php } else { ?>
            <img src="../img/pg-logo-white.png" width="25%">
        <?php } ?>
        </a>

    </div>
    <div class="col-lg-3 mr-auto text-center">

        <!-- Logo Xbox Game Studios -->
        <a href="https://www.xbox.com/en-US/xbox-game-studios" target="_blank">
        <?php if($CURRENT_PAGE == "Index") { ?>
            <img src="img/xbox-game-studios-logo.png" width="55%">
        <?php } else { ?>
            <img src="../img/xbox-game-studios-logo.png" width="55%">
        <?php } ?>
        </a>

    </div>
    <div class="col-lg-3 mr-auto text-center">

        <!-- Logos ESRB y PEGI -->
        <?php if($CURRENT_PAGE == "Index") { ?>
            <img src="img/esrb.jpg">
            <img src="img/pegi.jpg" width="50">
        <?php } else { ?>
            <img src="../img/esrb.jpg">
            <img src="../img/pegi.jpg" width="50">
        <?php } ?>
        
    </div>
    </div>
    <div class="space-40"></div>
    <div class="row justify-content-center">
        <div class="small text-center text-white">Copyright &copy; <?php echo date("Y"); ?> - David Ruiz Hurtado</div>
    </div>
    <div class="space-20"></div>
    <div class="row justify-content-center">
        <div class="small text-center text-white">Proyecto Integrado para CFGS Desarrollo de Aplicaciones Multiplataforma - Curso 2019/20 | <b>Esta página web no está afiliada con Microsoft Corporation</b></div>
    </div>
    <div class="row justify-content-center">
        <div class="small text-center text-white">Integrated project to CFGS Multiplatform Applications Development - Year 2019/20 | <b>This website is not affiliated with Microsoft Corporation</b></div>
    </div>
    <div class="space-20"></div>
    <div class="row justify-content-center">
        <div class="small text-center text-white">Las marcas de 'Turn 10 Studios', 'Playground Games', 'Xbox Game Studios' y el logo de 'Forza' son marcas registradas de &copy; Microsoft Corporation y sus respectivos dueños. Todos los derechos reservados</div>
    </div>
    <div class="row justify-content-center">
        <div class="small text-center text-white">The trademarks of 'Turn 10 Studios', 'Playground Games', 'Xbox Game Studios' and the 'Forza' logo are registered trademarks of &copy; Microsoft Corporation and their respective owners. All rights reserved</div>
    </div>
    
</div>
</footer>