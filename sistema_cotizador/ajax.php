<?php

require_once 'app/config.php';

$_POST['action'] = 'mi-funcion';

/* Parámetro action enviado desde el frontend (javascript) 
   Debe ser recivido en ajax.php
   Se valida que el valor de action, concuerde con el nombre de una 
   función, si existe la función, se ejecuta dicha función y lista

   En caso de no existir la función o no recibir el parámetro por 
   defecto mandaremos un error 403 de acceso no autorizado
*/

try {
    if(!isset($_POST['action']) && !isset($_GET['action'])){
        throw new Exception("El acceso no esta autorizado");
    }

    /* Guardar el valor de action */
    $action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
    $action = str_replace('-','_', $action);
    $function = sprintf('hook_%s', $action);

    /* validar la existencia de la función */
    if(!function_exists($function)){
        throw new Exception("El acceso no esta autorizado");
    }

    /* S eejecuta la función */
    $function;

} catch (Exception $e) {
    json_output(json_build(403, null, $e->getMessage()));
}
