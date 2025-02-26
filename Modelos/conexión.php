<?php
class Conexion{
    static public function conectar(){
        //Parametros de PDO
        //PDO("nombre del servidor; nombre de la base de datos", "ususario", "contraseña")
        $link = new PDO("mysql:host=localhost;dbname=hosewing","root","");

        $link->exec("set names utf8");
        return $link;
    }
}