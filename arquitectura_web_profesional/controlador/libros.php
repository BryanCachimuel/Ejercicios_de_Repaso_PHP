<?php

/*TODO: 4. proceso de controlar lo que se envia desde modelo hacia la vista */

// Se llama al modelo
require_once("modelo/libros.php");

// Se crea una instancia de la clase libros (clase del modelo)
$libro = new libros();
$datos = $libro->getLibros();

// Se llama a la vista
require_once("vista/libros.php");