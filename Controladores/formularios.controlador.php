<?php
require_once "Modelos/formularios.modelo.php"; // Ruta corregida, asumiendo que Modelos está al mismo nivel

//************* Registro **************

class ControladorFormularios {
    static public function ctrRegistro() {
        if (isset($_POST['registro_nombre'])) {
            $tabla = "registro";
            $datos = array(
                "Nombre" => $_POST['registro_nombre'],
                "A_paterno" => $_POST['a_apellido'],
                "A_materno" => $_POST['b_apellido'],
                "N_telefono" => $_POST['registro_cel'],
                "Cargo" => $_POST['registro_cargo'],
                "password" => $_POST['registro_password']);
            $respuesta = ModeloFormularios::modeloRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    //************* Mostrar registros **************
    
    static public function ControladorSeleccionarRegistros($columna, $valor){
        $tabla = "registro";
        $respuesta = ModeloFormularios::modeloSeleccionarRegistros($tabla, $columna, $valor);
        return $respuesta;
    }

    //************* Ingreso **************

    public function ControladorIngreso() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['ingreso_nombre'];
            $password = $_POST['ingreso_password'];

            $item = "Nombre";
            $valor = $nombre;
            $usuario = ModeloFormularios::modeloSeleccionarRegistros("registro", $item, $valor);
            echo "Usuario devuelto: "; var_dump($usuario); // Depuración

            if ($usuario && $usuario['password'] == $password) {
                session_start(); // Esto debería estar en index.php, pero lo dejamos por ahora
                $_SESSION['AutorizarIngreso'] = "ok";
                $this->establecerCargoActual($usuario['Cargo']); // Llamar al método para asignar el cargo
                $_SESSION['Nombre'] = $usuario['Nombre'];
                echo "Asignado Cargo: " . $_SESSION['cargo_actual'] . "<br>"; // Depuración

                $cargo = strtolower($_SESSION['cargo_actual']);
                if (in_array($cargo, ['cajero', 'sin cargo', ''])) {
                    echo '<script>
                        window.location = "index.php?ruta=menu";
                    </script>';
                } elseif (in_array($cargo, ['gerente', 'admin'])) {
                    echo '<script>
                        window.location = "index.php?ruta=inicio";
                    </script>';
                } else {
                    echo '<script>
                        window.location = "index.php?ruta=menu"; // Redirigir cargos no reconocidos a menú
                    </script>';
                }
            } else {
                echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
            }
        }
    }

    // Nuevo método para establecer el cargo actual
    private function establecerCargoActual($cargo) {
        $_SESSION['cargo_actual'] = isset($cargo) ? $cargo : 'sin cargo'; // Asignar valor por defecto si no está definido
    }

    //************* Actualizar información **************

    public function ControladorActualizar(){
        if(isset($_POST['editar_nombre'])){
            if($_POST['editar_password']!=""){
                $password = $_POST['editar_password'];
            }else{
                $password = $_POST['passActual'];
            }

            $tabla = "registro";
            $datos = array(
                "id" => $_POST['id_ususario'],
                "Nombre" => $_POST['editar_nombre'],
                "A_paterno" => $_POST['editar_a_apellido'],
                "A_materno" => $_POST['editar_b_apellido'],
                "N_telefono" => $_POST['editar_cel'],
                "Cargo" => $_POST['editar_cargo'],
                "password" => $password);

            $respuesta = ModeloFormularios::modeloActualizar($tabla, $datos);
            if($respuesta == "ok"){
                echo'<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success">La actualización se ha echo correctamente</div>';
            }
        }
    }

    //************* Eliminar registros **************

    public function ControladorEliminar(){
        if(isset($_POST["eliminar_registro"])){
            $tabla = "registro";
            $valor = $_POST["eliminar_registro"];
            $respuesta = ModeloFormularios::modeloeliminar($tabla, $valor);
            if($respuesta == "ok"){
                echo'<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
                }
                window.location ="index.php?ruta=inicio";
                </script>';
            }
        }
    }
}