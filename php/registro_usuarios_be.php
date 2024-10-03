<?php

   include 'conexion_be.php';

   $nombre_completo = $_POST['nombre_completo'];
   $correo = $_POST['correo']; 
   $contraseña = $_POST['contraseña'];
   $contraseña = hash('sha512', $contraseña);

   $query = "INSERT INTO usuarios(nombre_completo, correo, contraseña)  
             VALUES('$nombre_completo', '$correo', '$contraseña')";
    
    

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
        <script> 
        alert("Este correo ya esta registrado, intenta con otro correo");
        window.location = "../index.php";
        
        </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
           <script> 
                    alert("Usuario almacenado correctamente");
                    window.location = "../index.php";
           </script>
        ';
    }

    mysqli_close($conexion);

?>
