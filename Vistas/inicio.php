<?php
// Depuración: Verificar el cargo
echo "Cargo en sesión: " . (isset($_SESSION['Cargo']) ? $_SESSION['Cargo'] : 'No definido') . "<br>";

if (!isset($_SESSION['AutorizarIngreso']) || $_SESSION['AutorizarIngreso'] != "ok" ||
    (isset($_SESSION['Cargo']) && strtolower($_SESSION['Cargo']) != 'gerente' && strtolower($_SESSION['Cargo']) != 'admin')) {
    echo '<script>
        window.location = "index.php?ruta=menu";
    </script>';
    exit();
}

$mostrarUsuarios = ControladorFormularios::ControladorSeleccionarRegistros(null, null);
?>
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>A_paterno</th>
            <th>A_materno</th>
            <th>N_telefono</th>
            <th>Cargo</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mostrarUsuarios as $key => $value): ?>
            <tr>
                <td><?php echo ($key+1); ?></td>
                <td><?php echo $value["Nombre"];?></td>
                <td><?php echo $value["A_paterno"];?></td>
                <td><?php echo $value["A_materno"];?></td>
                <td><?php echo $value["N_telefono"];?></td>
                <td><?php echo isset($value["Cargo"]) ? $value["Cargo"] : 'Sin cargo'; ?></td>
                <td><?php echo $value["fecha"];?></td>
                <td>
                    <div class="btn-group">
                        <a href="index.php?ruta=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning">editar <i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST">
                            <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminar_registro">
                            <button type="submit" class="btn btn-danger">Eliminar <i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            <?php 
                            $eliminar = new ControladorFormularios();
                            $eliminar->ControladorEliminar();
                            ?>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>