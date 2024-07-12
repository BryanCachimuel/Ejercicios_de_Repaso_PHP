<?php
session_start();

/* validar si estamos en un sistema local o de producción */
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

/* definiendo la url para todo el sistema */
$web_url = IS_LOCAL ? 'http://127.0.0.1/ejercicios_PHP/sistema_cotizador/' : 'LA URL DE SU SERVIDOR EN PRODUCCIÓN';

define('URL', $web_url);

/* Rutas para las carpetas en disco duro */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);
define('APP', ROOT . 'app' . DS);
define('ASSETS', ROOT . 'assets' . DS);
define('TEMPLATES', ROOT . 'templates' . DS);
define('INCLUDES', TEMPLATES . 'includes' . DS);
define('MODULES', TEMPLATES . 'modules' . DS);
define('VIEWS', TEMPLATES . 'views' . DS);
define('UPLOADS', ROOT . 'uploads' . DS);

/* Para archivos que vayamos a incluir en header o footer (css o js) */
define('CSS', URL . 'assets/css/');
define('IMG', URL . 'assets/img/');
define('JS', URL . 'assets/js/');

/* Para personalización */
define('APP_NAME', 'Sistema Cotizador');
define('TAXES_RATE', 16);
define('SHIPPING', 99.50);

/* Cargar todas las funciones */
require_once APP.'functions.php';