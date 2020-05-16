<?php

require_once("../Conexion.php");

$modelo=isset($_GET['modelo'])?$_GET['modelo']:$_POST['modelo'];


// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

$sql = "SELECT id, anyo, clase, valor_inicial, valor_total FROM coches 
        WHERE modelo = '$modelo'";
$resultado = $con->query($sql);


if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_assoc()){
        $datoscoche[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['datoscoche'] = $datoscoche;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{ 
    $con->close();
}

?>