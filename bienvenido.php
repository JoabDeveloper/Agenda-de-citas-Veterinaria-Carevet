<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo'
         <script>
                  alert("Por favor debes iniciar sesion");
                  window.location = "index.php";
         </script>
    ';
    //header("location: index.php");
    session_destroy();
    die();
}
$correoUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asets/css/styleii.css">
    <script src="https://kit.fontawesome.com/e68344cfa7.js" crossorigin="anonymous"></script>

    <title>Bienvenido</title>
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
                <li><a href="#inicio">Incio</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="php/cerrar_seccion.php">Cerrar sesion</a></li>
            </ul>
        </nav>
        </div>

        <div class="header-content container" id="inicio">
            <div class="header-txt">
                <h1>Carevet</h1>
                <p>Este centro veterinario se destaca por su enfoce centrado en el cuidado y bienestar integral de cada mascota que ingresa por sus puertas. 
                    Desde el momento en que entras, te recibe con un ambiente tranquilo y acogedor que transmite confianza</p>
            <a href="citas.php"><button>Agenda tu cita!</button></a>    
            </div>
            <div class="header-img">
                <img  class="img-kl" src="asets/css/ert.avif" alt="">
            </div>
            
        </div>
    </header>

    <section class="about container" id="nosotros">
        <div class="about-img">
            <img src="asets/css/wety.jpg" alt="">
        </div>

        <div class="about-txt">
            <h2>Nosotros</h2>

            <p>
            Nuestra veterinaria no es solo un centro médico para mascotas; es un hogar para la compasión, la dedicación y el compromiso con el cuidado animal. Desde el momento en que entran por nuestras puertas, nuestros pacientes 
            y sus familias son recibidos con calidez y profesionalismo por un equipo de individuos apasionados y altamente calificados.
            </p>
            <br>

            <p>
            Aquí, cada miembro de nuestro equipo desempeña un papel vital en la misión de proporcionar atención de primera clase a nuestros amigos peludos. Desde nuestros veterinarios expertos, con años de experiencia y un profundo conocimiento en diversas áreas de la medicina veterinaria.
            </p>
        </div>
</section>

<main class="servicios" id="servicios">
    <h2> Servicios </h2>
    <div class="servicios-content container">
        <div class="servicio-1">
        <i class="fa-solid fa-stethoscope"></i>
        <h3>Consulta</h3>
        </div>

        <div class="servicio-1">
        <i class="fa-regular fa-hospital"></i>
        <h3>Atencion</h3>
        </div>

        <div class="servicio-1">
        <i class="fa-solid fa-syringe"></i>
            <h3>Farmacos</h3>
        </div>

        <div class="servicio-1">
        <i class="fa-solid fa-shield-dog"></i>
        <h3>Proteccion</h3>
        </div>
    </div>
</main>

<section class="content">
    <h2>Encuentranos aqui!</h2>
    <div class="container-ubicaion">
    <iframe  class="ubication"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1507.2123264636384!2d-74.81768896180989!3d4.296014053648695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f29cea41d3033%3A0x46ba0754d0f65d51!2sVeterinaria%20pet!5e0!3m2!1ses-419!2sco!4v1711853426372!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
    
    
   

       
</body>
</html>