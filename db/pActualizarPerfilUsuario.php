<?php

require_once("db/Conexion.php");

// Conexión a la BBDD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if(isset($_REQUEST["btnactualizar"])){
    // Guardamos los datos del perfil en variables
    $nombre = $_POST["inputNombre"];
    $email = $_POST["inputEmail"];
    $apellido1 = $_POST["inputApellido1"];
    $apellido2 = $_POST["inputApellido2"];
    $id = $_SESSION["idUser"]; // Recogemos el id del usuario de la sesión actual

    $sql = "UPDATE usuario
    SET nombre = '$nombre', email = '$email', apellido1 = '$apellido1', apellido2 = '$apellido2'
    WHERE id = $id";
    $con->query($sql);

    $con->close();

    // Una vez actualizada los datos, actualizamos las variables globales de sesión
    $_SESSION["nombreUser"] = $_POST["inputNombre"];
    $_SESSION["emailUser"] = $_POST["inputEmail"];
    $_SESSION["apellido1User"] = $_POST["inputApellido1"];
    $_SESSION["apellido2User"] = $_POST["inputApellido2"];

}

?>