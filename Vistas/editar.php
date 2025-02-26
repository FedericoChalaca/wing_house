<?php
if (isset($_GET["id"])) {
    $columna = "id";
    $valor = $_GET["id"];
    $ususario = ControladorFormularios::ControladorSeleccionarRegistros($columna, $valor);
}
?>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-success" method="POST">
        <div class="mb-3 mt-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" value= "<?php echo $ususario["Nombre"]?> "id="nombre" name="editar_nombre">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label for="a_apellido" class="form-label">Primer apellido:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-1"></i></span>
                </div>
                <input type="text" class="form-control" value= "<?php echo $ususario["A_paterno"]?> "id="a_apellido" name="editar_a_apellido">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label for="b_apellido" class="form-label">Segundo apellido:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-2"></i></span>
                </div>
                <input type="text" class="form-control" value= "<?php echo $ususario["A_materno"]?> "id="b_apellido" name="editar_b_apellido">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label for="cel" class="form-label">Telefono o Celular:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                </div>
                <input type="text" class="form-control" value= "<?php echo $ususario["N_telefono"]?> "id="cel" name="editar_cel">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label for="cargo" class="form-label">Ingresar cargo:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control" value= "<?php echo $ususario["Cargo"]?> "id="cargo" name="editar_cargo">
            </div>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Crear una contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-unlock-keyhole"></i></span>
                </div>
                <input type="password" class="form-control" id="pwd" name="editar_password">

                <input type="hidden" name="passActual" value="<?php echo $ususario["password"]?>">

                <input type="hidden" name="id_ususario" value="<?php echo $ususario["id"]?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <?php
        $editar = new ControladorFormularios();
        $editar->ControladorActualizar();
        ?>
    </form>
</div>