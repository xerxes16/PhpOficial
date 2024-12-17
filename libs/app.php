<?php

use Controllers\Errors;
use Controllers\Login;

class App 
{
    public function __construct()
    {
        $url = $_GET['url'] ?? '';
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        // Si la url[0] está vacía se ejecuta un controlador por defecto
        if(empty($url[0])) {
            $login = new Login();
            $login->render();
        }

        // Ruta del controlador
        $fileController = "controllers/$url[0].php";
        // Valida si existe el controlador en los archivos
        if(file_exists($fileController)) {
            // Nombre del controlador con mayúsculas para ejecutar
            $nameController = "Controllers\\".ucfirst($url[0]);
            $controller = new $nameController;

            // Valida que existe un metodo en la posicion url[1]
            if(isset($url[1])) {
                if(method_exists($controller, $url[1])) {
                    if(isset($url[2])) {
                        $nparam = sizeof($url);
                        $params = [];

                        for ($i=2; $i < $nparam; $i++) { 
                            $params[] = $url[$i];
                        }

                        $controller->{$url[1]}($params);
                    } else {
                        $reflection = new ReflectionMethod($nameController, $url[1]);
                        $parameters = $reflection->getParameters();
                        if (count($parameters) > 0 && empty($url[2])) {
                            new Errors();
                        } else {
                            $controller->{$url[1]}();
                        }
                    }
                } else {
                    new Errors();
                }
            } else {
                // Validamos que exista un método por defecto -> render()
                if (method_exists($controller, 'render')) {
                    // Ejecuta metodo render por defecto del controlador
                    $controller->render();
                } else {
                    new Errors();
                }
            }
        } else {
            // Mostramos página del error
            new Errors();
            // echo "No existe archivo";
        }
    }
}

/*
* 0 => controller
* 1 => method
* 2 => parameters
*/