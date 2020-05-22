<?php

require_once("../Conexion.php");

// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos la consulta para mostrar la información necesaria de todas las subastas
$sql = "SELECT id, nombreusuario, pass, nombre, email, apellido1, apellido2, rol, creditos
        FROM usuario";
$resultado = $con->query($sql);

if($con->affected_rows){ 
    while($fila = $resultado->fetch_assoc()){
        $usuarios[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['usuarios'] = $usuarios;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{ 
    $con->close();
}

?>