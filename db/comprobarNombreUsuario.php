<?php
require_once("Conexion.php");

//Recogemos el nombre de usuario que nos han pasado
$nombreusuario=isset($_GET['nombreusuario'])?$_GET['nombreusuario']:$_POST['nombreusuario'];

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

$sql = "SELECT * FROM usuario
        WHERE nombreusuario='$nombreusuario'";
$resultado = $con->query($sql);

if($con->affected_rows){ //Devuelve 0 o un numero
    $fila = $resultado->fetch_object();
    $jsondata['existe'] = true;
    $jsondata['idUsuario'] = $fila->id;
    echo json_encode($jsondata);
    $con->close();
}
else{
    $jsondata['existe'] = false;
    echo json_encode($jsondata);
    $con->close();
}