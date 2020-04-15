<?php

session_start();

if(isset($_SESSION['pagActual'])){
    $pagActual = $_SESSION['pagActual']; // Recogemos la página actual en la que está el usuario
} else {
    $pagActual = '/index.php';
}



session_unset();

session_destroy();

setcookie("PHPSESSID", " ", time()-1, "/");

/*
unset($_SESSION["idUser"]);
unset($_SESSION["nombreUser"]);
unset($_SESSION["rolUser"]);*/

header("Location: ".$pagActual); // Redirigimos a la actual página

echo "<p>Redirigiendo a la página de <a href='index.php'>inicio de Forza ATAX</a></p>";




?>

<a href="../index.php">Inicio Web</a>

