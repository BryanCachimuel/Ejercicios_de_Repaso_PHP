<?php

/* TODO: Archivo para realizar la conexión hacia la base de datos */
class db {

    public static function conexion(){
        $conn = new mysqli("localhost","","","arquitectura_web") or die("Error en la conexión hacia la base de datos");
        $conn->query("SET NAMES 'utf8'");   // control de caracteres especiales en la base de datos
        return $conn;
    }

}