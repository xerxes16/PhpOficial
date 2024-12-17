<?php

date_default_timezone_set('America/Lima');
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", 'debug.log');

require_once 'config/config.php';
require_once 'libs/app.php';

// Función para autocargar los archivos de las clases instanciadas
spl_autoload_register(function ($class) {
    list($folder, $file) = explode("\\", $class);
    $class = lcfirst($folder).'/'.lcfirst($file);
    $fileClass = __DIR__."/$class.php";

    if (file_exists($fileClass)) {
        require_once $fileClass;
    }
});

new App();