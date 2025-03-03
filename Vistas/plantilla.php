<?php
session_start(); // Mantenerlo aquí ya que funciona para tu caso
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e6f51a6355.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <!--Inicio LOGO-->
    <div class="container-fluid">
        <h1 class="text-center py-3">Bienvenidos a House's Wings</h1>
        <img src="images/Login.jpg" width="150px" alt="ingreso a la aplicación" title="ingreso a la aplicación">
        <small>
            <h1 class="text-center py-3">¡Repartimos felicidad en alas!</h1>
        </small>
        <br>
    </div>

    <!--Inicio menu-->
    <div class="container-fluid bg-success">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">
                <?php
                $ruta = isset($_GET['ruta']) ? $_GET['ruta'] : '';

                // Depuración: Verificar el cargo
                echo "Cargo en sesión: " . (isset($_SESSION['cargo_actual']) ? $_SESSION['cargo_actual'] : 'No definido') . "<br>";

                // Sin sesión: mostrar solo Registro e Ingreso
                if (!isset($_SESSION['AutorizarIngreso']) || $_SESSION['AutorizarIngreso'] != "ok") {
                    if ($ruta == 'registro') {
                        echo '<li class="nav-item"><a class="nav-link active" href="index.php?ruta=registro">Registro</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?ruta=registro">Registro</a></li>';
                    }
                    if ($ruta == 'ingreso') {
                        echo '<li class="nav-item"><a class="nav-link active" href="index.php?ruta=ingreso">Ingreso</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?ruta=ingreso">Ingreso</a></li>';
                    }
                } else {
                    // Con sesión activa
                    $cargo = strtolower($_SESSION['cargo_actual']);
                    // Mostrar Menú para todos los usuarios autenticados
                    if ($ruta == 'menu') {
                        echo '<li class="nav-item"><a class="nav-link active" href="index.php?ruta=menu">Menú</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?ruta=menu">Menú</a></li>';
                    }
                    // Mostrar Inicio solo para gerentes y administradores
                    if (in_array($cargo, ['gerente', 'admin'])) {
                        if ($ruta == 'inicio') {
                            echo '<li class="nav-item"><a class="nav-link active" href="index.php?ruta=inicio">Inicio</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?ruta=inicio">Inicio</a></li>';
                        }
                    }
                    // Mostrar Salir para todos los usuarios autenticados
                    if ($ruta == 'salir') {
                        echo '<li class="nav-item"><a class="nav-link active" href="index.php?ruta=salir">Salir</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?ruta=salir">Salir</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <!--Inicio contenido dinámico-->
    <div class="container-fluid py-5">
        <div class="container">
            <?php
                if(isset($_GET['ruta'])){                
                    if($_GET['ruta'] == "menu" ||
                       $_GET['ruta'] == "registro" ||
                       $_GET['ruta'] == "ingreso" ||
                       $_GET['ruta'] == "editar" ||
                       $_GET['ruta'] == "inicio" ||
                       $_GET['ruta'] == "salir") {
                        include $_GET['ruta'].".php";
                    } else {
                        include "404.php";
                    }
                } else {
                    include "registro.php";
                }
            ?>
        </div>
    </div>

    <!--inicio del pie de pagina-->
    <footer>
        <h2>Atención al cliente</h2>
        <p>Nuestros horarios son:</p>
        <p>lunes, martes, jueves y viernes (12:30 PM a 8:00 PM)</p>
        <p>sábados, domingos y festivos (12:30 PM a 1:00 AM)</p>
        <h4>Datos de interés</h4>
        <a href="doc/Política De Tratamiento de Datos Personales House's Wings.pdf">Consulta nuestras políticas de tratamiento de datos</a>
        <p>Copyright 2024 - Todos Los Derechos Reservados / Desarrollado Por: the thee programers.</p>
        <a href="#">Volver</a>
    </footer>
</body>
</html>