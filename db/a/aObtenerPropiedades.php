<?php

require_once("../Conexion.php");

// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos la consulta para mostrar la información necesaria de todas las subastas
$sql = "SELECT subastas.id as sId, 
                subastas.s_id_coche as sIdCoche, 
                subastas.s_valor_inicial as sValorInicial, 
                subastas.s_valor_total as sValorTotal, 
                subastas.s_id_usuario as sIdUsuario, 
                coches.marca as sMarca, 
                coches.modelo as sModelo, 
                coches.anyo as sAnyo, 
                coches.clase as sClase, 
                usuario.nombreusuario as sNombreUsuario
        FROM subastas, coches, usuario 
        WHERE subastas.s_id_coche = coches.id && subastas.s_id_usuario = usuario.id
        ORDER BY subastas.id";

$sql = "SELECT propiedades.id as pId, 
                coches.id as pIdCoche, 
                coches.marca as pMarca, 
                coches.modelo as pModelo, 
                coches.anyo as pAnyo, 
                coches.clase as pClase, 
                usuario.nombreusuario as pUsuario, 
                usuario.nombre as pNombreUsuario, 
                usuario.apellido1 as pApellido1 
        FROM propiedades, coches, usuario 
        WHERE propiedades.p_id_coche = coches.id && propiedades.p_id_usuario = usuario.id
        ORDER BY propiedades.id";


$resultado = $con->query($sql);


if($con->affected_rows){ // Si hay subastas, se enviará las columnas y sus datos en un array asociativo, que se envía en json
    while($fila = $resultado->fetch_assoc()){
        $subastas[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['subastas'] = $subastas;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{  // Si no hay subastas
    $jsondata['noHaySubastas'] = true;
    echo json_encode($jsondata);
    $con->close();
}

?>