<?php

if(isset($_REQUEST["btnModalComprar"])){
    
    require_once("../Conexion.php");

    // Conexión a la BBDD
    $con = new Conexion();
    $con->set_charset("utf8"); //Establecemos la codificacion adecuada

    // Guardamos los datos del formulario en variables
    $sModalIdSubasta = $_POST["modalInputIdSubasta"];
    $sModalIdCoche = $_POST["modalInputIdCoche"];
    $sModalIdUsuario = $_POST["modalInputIdUsuario"]; // Id del usuario de la subasta, el propietario del vehículo original
    $sModalIdUsuarioLogin = $_POST["modalInputIdUsuarioLogin"]; // Id del usuario logeado, el nuevo propietario

    // 1º - Elimino la subasta
    $sql = "DELETE FROM subastas
            WHERE id = $sModalIdSubasta";
    $con->query($sql);

    if($con->affected_rows){ // 2º - Elimino el vehículo personal del propietario de la subasta
        $sql = "DELETE FROM propiedades
            WHERE p_id_coche = $sModalIdCoche && p_id_usuario = $sModalIdUsuario";
        $con->query($sql);

        if($con->affected_rows){ // 3º - Inserto el nuevo vehículo en las propiedades del nuevo propietario
            $sql = "INSERT INTO propiedades (p_id_usuario, p_id_coche)
                    VALUES ($sModalIdUsuarioLogin, $sModalIdCoche)";
            $con->query($sql);
        }
    }

    $con->close();
    // Recargo la página para prevenir errores
    header("Location: ../../auctionhouse/index.php");
    exit;

}

?>