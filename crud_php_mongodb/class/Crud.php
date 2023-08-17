<?php

    class Crud extends Conexion{

        public function mostrarDatos() {
            try {
                // traigo la conexión por herencia
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function insertarDatos($datos) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->insertOne($datos);
                return $resultado;  
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

    }

?>