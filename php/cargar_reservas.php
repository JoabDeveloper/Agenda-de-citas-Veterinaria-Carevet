
<?php

$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

$sql = "SELECT title, start, end, color FROM tb_reservas";
$resultado = mysqli_query($conexion, $sql);


$resultados_array = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $resultados_array[] = $fila;
}


echo json_encode($resultados_array);


mysqli_free_result($resultado);


mysqli_close($conexion);
?>
