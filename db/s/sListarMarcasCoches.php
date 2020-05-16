<?php
// Sacar el nombre de las Marcas de los vehículos personales
include("../db/Conexion.php");

$con = new Conexion();
$con->set_charset("utf8");

$sql = "SELECT DISTINCT coches.marca 
        FROM coches, propiedades 
        WHERE coches.id = propiedades.p_id_coche 
        ORDER BY coches.marca ASC";
$resultado = $con->query($sql);

if($con->affected_rows){ // Si hay vehículos, se hará un bucle mostrando tantos option para el select como marcas haya 
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<option value='$fila[0]'>".$fila[0]."</option>";
    }
} else { // Si no, en el select se mostrará un mensaje informando al usuario que no dispone de un vehículo personal
    echo "<option value='0'>No dispone de un vehículo personal. Añada uno en tu Perfil</option>";
}


$con->close();

?>