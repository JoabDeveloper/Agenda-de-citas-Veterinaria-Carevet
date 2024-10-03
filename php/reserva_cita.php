<?php
session_start();

include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreMascota = $_POST['nombre_mascota'];
    $tipoServicio = $_POST['tipo_servicio'];
    $fechaCita = $_POST['fecha_cita'];
    $horaCita = $_POST['hora_cita'];
    $idUsuario = $_POST['id_usuario']; 
    $title = $tipoServicio;
    $start = $fechaCita;
    $end = $fechaCita;
    $color = 'black'; 
    
    $query_insertar_cita = "INSERT INTO tb_reservas (nombre_mascota, tipo_servicio, fecha_cita, hora_cita, id_usuario, title, start, end, color) 
                            VALUES ('$nombreMascota', '$tipoServicio', '$fechaCita', '$horaCita', '$idUsuario', '$title', '$start', '$end', '$color')";
    
    
    if (mysqli_query($conexion, $query_insertar_cita)) {
        echo "Cita reservada correctamente";
        header("location: citas.php");
    } else {
        echo "Error al reservar la cita: " . mysqli_error($conexion);
    }
}
?>
