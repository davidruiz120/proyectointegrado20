<?php
// Sacar el nombre de las Marcas de la tabla Coches
include("../db/Conexion.php");

$con = new Conexion();
$con->set_charset("utf8");

$sql = "SELECT DISTINCT marca FROM coches ORDER BY marca ASC";
$resultado = $con->query($sql);

while ($fila = mysqli_fetch_array($resultado)) {
    echo "<option value='$fila[0]'>".$fila[0]."</option>";
}

$con->close();

?>