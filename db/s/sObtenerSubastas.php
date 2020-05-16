<?php

require_once("../Conexion.php");

//$marca=isset($_GET['marca'])?$_GET['marca']:$_POST['marca'];


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