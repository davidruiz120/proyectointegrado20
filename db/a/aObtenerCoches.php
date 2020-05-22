<?php

require_once("../Conexion.php");

// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos la consulta para mostrar la información necesaria de todas las subastas
$sql = "SELECT id, marca, modelo, anyo, clase, valor_inicial, valor_total
        FROM coches";
$resultado = $con->query($sql);

if($con->affected_rows){ 
    while($fila = $resultado->fetch_assoc()){
        $coches[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['coches'] = $coches;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{ 
    $con->close();
}

?>