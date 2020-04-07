<!-- Bootstrap core JavaScript -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php } else { ?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php } ?>

<!-- Plugin JavaScript -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<?php } else { ?>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<?php } ?>
    
<!-- Scripts propios de la plantilla original -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <script src="js/creative.min.js"></script>
<?php } else { ?>
    <script src="../js/creative.min.js"></script>
<?php } ?>