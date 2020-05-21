<?php

if(isset($_REQUEST["btnModalPujar"])){
    
    require_once("../Conexion.php");

    // Conexión a la BBDD
    $con = new Conexion();
    $con->set_charset("utf8"); //Establecemos la codificacion adecuada

    // Guardamos los datos del formulario en variables
    $sModalIdSubasta = $_POST["modalInputIdSubasta"];
    $sModalValorInicial = $_POST["modalInputValorInicial"];

    $sql = "UPDATE subastas
    SET s_valor_inicial = '$sModalValorInicial'
    WHERE id = $sModalIdSubasta";
    $con->query($sql);

    $con->close();
    // Recargo la página para prevenir errores
    header("Location: ../../auctionhouse/index.php");
    exit;

}

?>