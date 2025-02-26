
<div class="d-flex justify-content-center text-center">
        <form class="p-5 bg-success" method="POST">
            <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre" name="ingreso_nombre" placeholder="Ingrese su nombre" maxlength="15" required>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="pwd" class="form-label">Ingresa tu contraseña:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-unlock-keyhole"></i></span>
                    </div>
                    <input type="password" class="form-control" id="pwd" name="ingreso_password" placeholder="Ingresa una contraseña" maxlength="10" required>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Ingresar</button>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ingresar = new ControladorFormularios();
                $ingresar->ControladorIngreso();
            }
            ?>
        </form>
    </div>