<?php

if(isset($_REQUEST["btnComenzarSubasta"])){
    
    require_once("../Conexion.php");

    // Conexión a la BBDD
    $con = new Conexion();
    $con->set_charset("utf8"); //Establecemos la codificacion adecuada

    // Guardamos los datos del formulario en variables
    $sIdCoche = $_POST["inputIdCoche"];
    $sValorInicial = $_POST["inputValorInicial"];
    $sValorTotal = $_POST["inputValorTotal"];
    $sIdUsuario = $_POST["inputIdUsuarioLogin"];

    $sql = "INSERT INTO subastas (s_id_coche, s_valor_inicial, s_valor_total, s_id_usuario)
    VALUES ($sIdCoche, '$sValorInicial', '$sValorTotal', $sIdUsuario)";
    $con->query($sql);

    $con->close();

    // Recargo la página para evitar un error que bloqueaba la manejabilidad de la web
    header("Location: ../../auctionhouse/index.php");
    exit;

}

?>