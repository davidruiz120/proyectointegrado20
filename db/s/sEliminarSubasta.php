<?php

require_once("../Conexion.php");

// Recogemos y guardamos en una variable el id de la subasta
$idSubasta=isset($_GET['idSubasta'])?$_GET['idSubasta']:$_POST['idSubasta'];

// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos el DELETE en el registro
$sql = "DELETE FROM subastas
        WHERE id = $idSubasta";
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