<?php

   session_start();

   if(isset($_SESSION['usuario'])){
    header("location: bienvenido.php");
   }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="asets/css/style.css">
    <title>Login</title>
</head>
<body>
   <div class="container" id="container">
    <div class="form-container sign-up">
        <form action="php/registro_usuarios_be.php" method="POST">
            <h1>Crear Cuenta</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <span>Registrate para generar tu usuario</span>
            <input type="text" placeholder="Nombre" name="nombre_completo">
            <input type="email" placeholder="Email" name="correo">
            <input type="password" placeholder="Password" name="contraseña">
            <div class="content-btn">
                <button class="btn">Resgistrarse</button>
            </div>
            
        </form>

    </div>

    <div class="form-container sign-in">
        <form action="php/login_usuarios_be.php" method="POST">
            <h1>Inicia sesion</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <span>Ingresa tu email y password</span>
            <input type="email" placeholder="Email" name = "correo">
            <input type="password" placeholder="Password" name="contraseña">
            <a href="#">Olvidaste tu contraseña</a>
            <button class="btn">Ingresar</button>
        </form>

    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <img class="img-veterinaria" src="asets/css/Veterinaria-img.png" alt="" width="41%">
                <h1>Bienvenido</h1>
                <p>Ingrese sus datos personales para utilizar las funciones del sitio</p>
                <button class="hidden" id="login">Iniciar sesion</button>
            </div>
            
            <div class="toggle-panel toggle-right">
                <div class="content-img">
                    <img class="img-veterinaria" src="asets/css/Veterinaria-img.png" alt="" width="41%">
                </div>
                <h1>Hola, Bienvenido</h1>
                <p>Registrese con sus datos personales para utilizar las funciones del sitio</p>
                <button class="hidden" id="register">Registrar</button>
            </div>
        </div>
    </div>
   </div>
  
   <script src="asets/js/srty.js"></script>

</body>
</html>
