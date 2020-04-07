<?php

session_start();

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Página web de Forza ATAX">
<meta name="author" content="David Ruiz Hurtado">

<title><?php print $PAGE_TITLE;?></title>

<!-- Favicon -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
<?php } else { ?>
    <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
<?php } ?>

<!-- Font Awesome -->
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
<script src="https://kit.fontawesome.com/73b5a2bda4.js" crossorigin="anonymous"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">

<!-- Plugin CSS -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
<?php } else { ?>
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
<?php } ?>

<!-- Theme CSS - Includes Bootstrap -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <link href="css/creative.css" rel="stylesheet">
<?php } else { ?>
    <link href="../css/creative.css" rel="stylesheet">
<?php } ?>

<!-- Estilos propios -->
<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Login" || $CURRENT_PAGE == "Registro") { ?>
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
<?php } else { ?>
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
<?php } ?>