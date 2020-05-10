<?php

require_once("../Conexion.php");

// Recogemos y guardamos en una variable el id del vehículo personal
$idVPersonal=isset($_GET['idVPersonal'])?$_GET['idVPersonal']:$_POST['idVPersonal'];

// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos el DELETE en el registro
$sql = "DELETE FROM propiedades
        WHERE id = $idVPersonal";
$resultado = $con->query($sql);

if($con->affected_rows){ // Si se ha eliminado correctamente
    $jsondata['correcto'] = true;
    echo json_encode($jsondata);
    $con->close();
}
else{ // Si no se ha eliminado correctamente
    $jsondata['correcto'] = false;
    echo json_encode($jsondata);
    $con->close();
}

?>