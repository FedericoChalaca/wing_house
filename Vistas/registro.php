<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-success" method="POST">
        <div class="mb-3 mt-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nombre" name="registro_nombre" placeholder="Ingrese su nombre" maxlength="15" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="a_apellido" class="form-label">Primer apellido:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-1"></i></span>
                </div>
                <input type="text" class="form-control" id="a_apellido" name="a_apellido" placeholder="Primer apellido" maxlength="15" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="b_apellido" class="form-label">Segundo apellido:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-2"></i></span>
                </div>
                <input type="text" class="form-control" id="b_apellido" name="b_apellido" placeholder="Segundo apellido" maxlength="15" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="cel" class="form-label">Teléfono o Celular:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                </div>
                <input type="text" class="form-control" id="cel" name="registro_cel" placeholder="Ingrese su número celular" maxlength="15" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
    <label for="cargo" class="form-label">Ingresar cargo:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
        </div>
            <input list="cargos" class="form-control" id="cargo" name="registro_cargo" placeholder="Ingrese su cargo" maxlength="30" required>
            <datalist id="cargos">
                <option value="administrador">
                <option value="gerente">
                <option value="cajero">
            </datalist>
        </div>
    </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Crear una contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-unlock-keyhole"></i></span>
                </div>
                <input type="password" class="form-control" id="pwd" name="registro_password" placeholder="cree una contraseña" maxlength="15" required>
            </div>
        </div>

        <h5><input type=checkbox name=terminos id=terminos required><label for=terminos>Aceptar términos y condiciones</label></h5>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <?php
        $registro = ControladorFormularios::ctrRegistro();
        if($registro == "ok"){
            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo '<div class="alert alert-success">Te has registrado correctamente</div>';
        }
        ?>
    </form>
</div>
        