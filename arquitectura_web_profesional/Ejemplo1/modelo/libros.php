<?php

/* TODO: 3. Se crea una clase en el modelo de nombre libros */

class libros {

    private $db;
    private $libros;

    function __construct() {
        $this->db = db::conexion(); // se asume que la clase db tiene un método estático conexion
        $this->libros = array();    // se iniciliza la propiedad como un arreglo vacío
    }

    public function getLibros() {
        $consulta = $this->db->query("SELECT * FROM libros");

        // se crea un arreglo de arregos asociados
        while($filas = $consulta->fetch_assoc()){
            $this->libros[] = $filas;
        }

        return $this->libros;
    }

}