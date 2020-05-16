<?php

require_once("../Conexion.php");

// Recogemos y guardamos en una variable el id del usuario logueado
$idUserLogin=isset($_GET['idUserLogin'])?$_GET['idUserLogin']:$_POST['idUserLogin'];


// Conexión a la BD
$con = new Conexion();
$con->set_charset("utf8");

// Realizamos la consulta para mostrar la información necesaria de cada subasta del usuario logueado
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
        WHERE subastas.s_id_coche = coches.id && subastas.s_id_usuario = usuario.id && subastas.s_id_usuario=$idUserLogin
        ORDER BY subastas.id";
$resultado = $con->query($sql);


if($con->affected_rows){ // Si el usuario tiene alguna subasta creada
    while($fila = $resultado->fetch_assoc()){
        $subastas[] = $fila; // Tendra el nombre de la columna
    }
    $jsondata['subastas'] = $subastas;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else{ // Si el usuario no tiene ninguna subasta creada
    $jsondata['noHaySubastas'] = true;
    echo json_encode($jsondata);
    $con->close();
}

?>