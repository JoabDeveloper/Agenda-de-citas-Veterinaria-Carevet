<?php
session_start();

include 'php/conexion_be.php';

// Verificar si el usuario está logueado
if(isset($_SESSION['usuario'])) {
    $correoUsuario = $_SESSION['usuario']; 

    // Consulta SQL para obtener el ID del usuario
    $query_id_usuario = "SELECT id FROM usuarios WHERE correo = '$correoUsuario'";
    $resultado_id_usuario = mysqli_query($conexion, $query_id_usuario);

    if ($resultado_id_usuario) {
        $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
        $idUsuario = $fila_id_usuario['id'];
    } else {
        // Manejar el caso de que no se pueda obtener el ID del usuario
        echo "Error al obtener el ID del usuario";
        exit;
    }
} else {
    // Manejar el caso de que el usuario no esté logueado
    echo "Por favor inicia sesión"; 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asets/css/Style3.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>citas</title>
</head>
<body>

<header class="header">
    <div class="menu container">
        <a href="#" class="logo"><img src="asets/css/Veterinaria-img.png" width="21%"alt=""></a>
        <input type="checkbox" id="menu"/>
        <label for="menu">
            <img src="asets/css/menu.png" class="menu-icono" alt="menu">
        </label>

        <nav class="navbar">
            <ul>
                <li><a href="bienvenido.php">Incio</a></li>
                <li><a href="bienvenido.php#nosotros">Nosotros</a></li>
                <li><a href="bienvenido.php#servicios">Servicios</a></li>
                <li><a href="php/cerrar_seccion.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </div> 
        
    <div class="content-calendar" id="calendar-container">
        <div class="text">
            <h1>Reserva tu cita</h1>
            <div id='calendar'></div>
        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
  var a;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true, 
            allDaySlot: false,
            events: 'php/cargar_reservas.php',

            dateClick: function(info) {
                a = info.dateStr;
                const fechaComoCadena = a;
                var numeroDia = new Date(fechaComoCadena).getDay();
                var dias = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes'];

                if (numeroDia == 5) {
                    alert("No hay atención en el día sábado");
                } else if (numeroDia == 6) {
                    alert("No hay atención en el día domingo");
                } else {
                    $('#modal_reservas').modal("show");
                    $('#dia_de_la_semana').html(dias[numeroDia] + " " + a);
                }
            }
        });

        calendar.render();

    });
</script>

<div class="modal fade" id="modal_reservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agenda tu cita para el dia <span id="dia_de_la_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <center><b>Turno mañana</b></center>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" id="btn_h1" data-bs-dismiss="modal" type="button">7:00 - 8:00 am</button>
                            <button class="btn btn-primary" id="btn_h2" data-bs-dismiss="modal" type="button">8:00 - 9:00 am</button>
                            <button class="btn btn-primary" id="btn_h3" data-bs-dismiss="modal"type="button">9:00 - 10:00 am</button>
                            <button class="btn btn-primary" id="btn_h4" data-bs-dismiss="modal" type="button">10:00 - 11:00 am</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <center><b>Turno tarde</b></center>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" id="btn_h5" data-bs-dismiss="modal"type="button">2:00 - 3:00 pm</button>
                            <button class="btn btn-primary" id="btn_h6" data-bs-dismiss="modal"type="button">3:00 - 4:00 pm</button>
                            <button class="btn btn-primary" id="btn_h7" data-bs-dismiss="modal"type="button">5:00 - 6:00 pm</button>
                            <button class="btn btn-primary" id="btn_h8" data-bs-dismiss="modal"type="button">6:00 - 7:00 pm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agenda tu cita para el dia <span id="dia_de_la_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="php/reserva_cita.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                          <label for="">Nombre del usuario</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                        <label for="">Correo electronico</label>
                          <input type="text" class="form-control" value="<?php echo $correoUsuario; ?>" disabled>
                          <input type="text" name="id_usuario" value="<?php echo $idUsuario; ?>" hidden>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Fecha reservacion</label>
                          <input type="text" class="form-control" id="fecha_reserva" disabled>
                          <input type="text" name="fecha_cita" class="form-control" id="fecha_reserva2" hidden>
                        </div>
                        <div class="col-md-6">
                          <label for="">Hora de reserva</label>
                          <input type="text" class="form-control" id="hora_reserva" disabled>
                          <input type="text" name="hora_cita" class="form-control" id="hora_reserva2" hidden>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Nombre de la mascota</label>
                          <input type="text" name="nombre_mascota" class="form-control">
                        </div>
                        <div class="col-md-6">
                        <label for="">Tipo de servicio</label>
                        <select name="tipo_servicio" id="" class="form-control">
                          <option value="LAVADO">Lavado</option>
                          <option value="CONSULTA">Consulta</option>
                          <option value="ARREGLO">Arreglo</option>
                        </select>
                        </div>
                      </div>
                      
                      
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Reservar cita</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
   $('#btn_h1').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h1 = "7:00 - 8:00 am";
            $('#hora_reserva').val(h1);
            $('#hora_reserva2').val(h1);
        });

        $('#btn_h2').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h2 = "8:00 - 9:00 am";
            $('#hora_reserva').val(h2);
            $('#hora_reserva2').val(h2);
        });

        $('#btn_h3').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h3 = "9:00 - 10:00 am";
            $('#hora_reserva').val(h3);
            $('#hora_reserva2').val(h3);
        });

        $('#btn_h4').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h4 = "10:00 - 11:00 am";
            $('#hora_reserva').val(h4);
            $('#hora_reserva2').val(h4);
        });

        $('#btn_h5').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h5 = "2:00 - 3:00 pm";
            $('#hora_reserva').val(h5);
            $('#hora_reserva2').val(h5);
        });

        $('#btn_h6').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h6 = "3:00 - 4:00 pm";
            $('#hora_reserva').val(h6);
            $('#hora_reserva2').val(h6);
        });

        $('#btn_h7').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h7 = "4:00 - 5:00 am";
            $('#hora_reserva').val(h7);
            $('#hora_reserva2').val(h7);
        });

        $('#btn_h8').click(function () {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reserva2').val(a);
            var h8 = "5:00 - 6:00 am";
            $('#hora_reserva').val(h8);
            $('#hora_reserva2').val(h8);
        });

</script>

</body>
</html>
