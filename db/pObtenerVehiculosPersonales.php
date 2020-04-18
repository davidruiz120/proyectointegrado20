<?php

require_once("Conexion.php");

$idUsuarioLogin=isset($_GET['idUsuarioLogin'])?$_GET['idUsuarioLogin']:$_POST['idUsuarioLogin'];


// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos la consulta para mostrar la información necesaria de todas las subastas
$sql = "SELECT propiedades.id as pId,
                coches.marca as pMarca, 
                coches.modelo as pModelo, 
                coches.anyo as pAnyo, 
                coches.clase as pClase
        FROM propiedades, coches 
        WHERE propiedades.p_id_coche = coches.id && propiedades.p_id_usuario =$idUsuarioLogin
        ORDER BY propiedades.id";
$resultado = $con->query($sql);


if($con->affected_rows){ // Si hay vehículos personales, se enviará las columnas y sus datos en un array asociativo, que se envía en json
    while($fila = $resultado->fetch_assoc()){
        $vPersonales[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['vPersonales'] = $vPersonales;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{  // Si no hay vehículos personales
    $jsondata['noHayVPersonales'] = true;
    echo json_encode($jsondata);
    $con->close();
}

?>