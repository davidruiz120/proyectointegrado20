<?php

if(isset($_REQUEST["btnAnyadirVehiculoPersonal"])){
    
    require_once("../Conexion.php");

    // Conexión a la BBDD
    $con = new Conexion();
    $con->set_charset("utf8"); //Establecemos la codificacion adecuada

    // Guardamos los datos del formulario en variables
    $sIdCoche = $_POST["inputIdCoche"];
    $sIdUsuario = $_POST["inputIdUsuarioLogin"];

    $sql = "INSERT INTO propiedades (p_id_usuario, p_id_coche)
    VALUES ($sIdUsuario, $sIdCoche)";
    $con->query($sql);

    $con->close();

    // Recargo la página para evitar un error que bloqueaba la manejabilidad de la web
    header("Location: ../../perfil.php");
    exit;

}

?>