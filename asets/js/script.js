$(document).ready(function() {
    // Manejar clic en citas disponibles
    $('#citas-disponibles').on('click', '.cita-disponible', function() {
        // Obtener la fecha de la cita seleccionada
        var fecha = $(this).data('fecha');

        // Mostrar el formulario para agendar la cita
        $('#formulario-cita').show();

        // Cuando se envíe el formulario
        $('#form-cita').submit(function(event) {
            event.preventDefault(); // Evitar el envío por defecto del formulario

            // Obtener los valores del formulario
            var nombre = $('#nombre').val();
            var email = $('#email').val();
            var telefono = $('#telefono').val();

            // Aquí puedes enviar los datos al servidor para procesar la cita
            // por ejemplo, utilizando AJAX
            // ...

            // Después de procesar la cita, puedes mostrar un mensaje de confirmación
            alert('Cita agendada exitosamente para el ' + fecha + '.');
            // También puedes redirigir al usuario a otra página o realizar otra acción según sea necesario
        });
    });
});
