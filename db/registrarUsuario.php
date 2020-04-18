<?php

require_once("db/Conexion.php");

// Booleano para mostrar el modal cuando se registra el usuario
$modalnoinsertado = false;

// Conexión a la BBDD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if(isset($_REQUEST["btnregistrarse"])){
    // Guardamos los datos del registro en variables
    $nombreusuario = $_POST["inputUsuario"];
    $password = $_POST["inputPassword"];
    $password = md5($password);
    $nombre = $_POST["inputNombre"];
    $email = $_POST["inputEmail"];
    $apellido1 = $_POST["inputApellido1"];
    $apellido2 = $_POST["inputApellido2"];

    $sql = "INSERT INTO usuario (nombreusuario, pass, nombre, email, apellido1, apellido2, rol, creditos)
    VALUES ('$nombreusuario', '$password', '$nombre', '$email', '$apellido1', '$apellido2', 0, 150000)";
    $con->query($sql);
    
    // Si no ha ocurrido un error, redirigirá al login, si no
    // mostrará un modal con un mensaje de error
    if($con->errno == 0){
        $con->close();
        header("Location: login.php");
        exit;
    } else {
        $modalnoinsertado = true;
    }

    $con->close();

}

?>