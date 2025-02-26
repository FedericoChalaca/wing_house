<?php
require_once "conexión.php";
class ModeloFormularios{

    //Registro

    static public function modeloRegistro($tabla, $datos){

        /*Statement = declaración*/

        /*prepare() prepara una sentencia sql para ser ejecutada por el metodo PDO Statement::execute(). la sentencia sql puede contener 0 o mas marcadores de parametros(:name) o signos de interrogación(?)*/

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, A_paterno, A_materno, N_telefono, Cargo, password) VALUES (:Nombre, :A_paterno, :A_materno, :N_telefono, :Cargo, :password)");
        $stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":A_paterno",$datos["A_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":A_materno",$datos["A_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":N_telefono",$datos["N_telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Cargo",$datos["Cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt= NULL;
    }

    //************* Mostrar registros **************

    static public function modeloSeleccionarRegistros($tabla, $columna, $valor){

        if($columna == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchALL();
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $columna = :$columna");
            $stmt->bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch();
        }

        
    }

    //Actualización de datos

    static public function modeloActualizar($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre=:Nombre,
        A_paterno=:A_paterno, A_materno=:A_materno, N_telefono=:N_telefono, Cargo=:Cargo, password=:password WHERE id=:id");
        $stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":A_paterno",$datos["A_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":A_materno",$datos["A_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":N_telefono",$datos["N_telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":Cargo",$datos["Cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt= NULL;
    }

    // Eliminar datos

    static public function modeloeliminar($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
      
        $stmt->bindParam(":id",$valor, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt= NULL;
    }

}
