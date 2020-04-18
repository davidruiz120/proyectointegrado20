<?php

require_once("db/Conexion.php");

// Booleano para mostrar el modal si ocurre un error al loguearse
$modalerrorlogin = false;

if(isset($_SESSION['pagActual'])){
    $pagActual = $_SESSION['pagActual']; // Recogemos la página actual en la que está el usuario
} else {
    $pagActual = '/index.php';
}

// Conexión a la BBDD
$con = new Conexion();
$con->set_charset("utf8"); // Establecemos la codificacion adecuada

if(isset($_REQUEST["btnlogin"])){
    // Guardamos los datos del login en variables
    $nombreusuario = $_POST["inputUsuario"];
    $password = $_POST["inputPassword"];
    $password = md5($password);

    $sql = "SELECT id, nombreusuario, nombre, email, apellido1, apellido2, rol, creditos FROM usuario
        WHERE nombreusuario='$nombreusuario' && pass='$password'";
    $resultado = $con->query($sql);
    

    if($con->affected_rows){
        $fila = $resultado->fetch_object();

        // Creación de variables de sesión
        $_SESSION["idUser"] = $fila->id;
        $_SESSION["nombreusuarioUser"] = $fila->nombreusuario;
        $_SESSION["nombreUser"] = $fila->nombre;
        $_SESSION["emailUser"] = $fila->email;
        $_SESSION["apellido1User"] = $fila->apellido1;
        $_SESSION["apellido2User"] = $fila->apellido2;
        $_SESSION["rolUser"] = $fila->rol;
        $_SESSION["creditosUser"] = $fila->creditos;

        $con->close();
        header("Location: ".$pagActual);
        exit;
    } else {
        $modalerrorlogin = true;
    }

    $con->close();

}

?>