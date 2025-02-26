<?php

// Verificar si el usuario no tiene acceso a 'inicio' (no es gerente/administrador o no ha iniciado sesión)
if (isset($_SESSION['AutorizarIngreso']) && $_SESSION['AutorizarIngreso'] == "ok" &&
    isset($_SESSION['Cargo']) && ($_SESSION['Cargo'] == 'gerente' || $_SESSION['Cargo'] == 'administrador')) {
    // Si el usuario es gerente o administrador, redirigir a inicio
    echo '<script>
        window.location = "index.php?ruta=inicio";
    </script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="CSS/menú.css">
</head>
<body>
    
    <section>
        <div class="post">
            <h2>Combo familiar</h2>
            <img src="images/Combofamiliar.jpg" alt="Ver carta" title="Ver carta">
            <h1>$ 45.000</h1>
            <p>25 Alitas + Super papas + 3 Gaseosas</p>
            <label for="cantidad">Ingresa la cantidad</label>
            <input type="number" name="cantidad" placeholder="1" min="0" max="99" required>
            <button>Agregar al carrito</button>
        </div>
        <br>
        <div class="post">
            <h2>Menú Infantil</h2>
            <img src="images/Menú infantil.jpg" alt="Ver carta" title="Ver carta">
            <h1>$ 12.000</h1>
            <small>5 Alitas + Papas + 1 Gaseosa</small>
            <label for="cantidad">Ingresa la cantidad</label>
            <input type="number" name="cantidad" placeholder="1" min="0" max="99" required>
            <button>Agregar al carrito</button>
        </div>
        <br>
        <div class="post">
            <h2>Bebidas</h2>
            <img src="images/Bebidas.jpg" alt="Ver carta" title="Ver carta">
            <br>
            <b>Por la compra de un combo recibe gratis un jugo natural (en agua o en leche).</b>
            <br>
            <b>Importante: ¡Válido por su primera compra!</b>
            <br>
            <b>Gaseosas:</b> <small>CocaCola, Pepsi, Colombiana, Uva y Manzana. ($ 3.000)</small>
            <br>
            <strong>Jugos:</strong> <small>Mora, Maracuyá, Lulo, Fresa, Guanábana, Granadilla y Limonada.</small> <small>En agua ($ 4.500) o En leche ($ 6.000)</small>
            <br>
            <label for="cantidad">Ingresa la cantidad</label>
            <input type="number" name="cantidad" placeholder="1" min="0" max="99" required>
            <button>Agregar al carrito</button>
        </div>
    </section>
</body>
</html>