<?php

require_once("../Conexion.php");

$marca=isset($_GET['marca'])?$_GET['marca']:$_POST['marca'];


// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

$sql = "SELECT coches.modelo 
        FROM coches, propiedades 
        WHERE marca = '$marca' && coches.id = propiedades.p_id_coche";
$resultado = $con->query($sql);


if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_assoc()){
        $modelos[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['modelos'] = $modelos;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{ 
    $con->close();
}

?>