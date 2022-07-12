<?php

    // Crear el namespace de la aplicación
    namespace Shiro\Api\App;

    // Render class
    class Render
    {
        
        // Render view
        public static function view(string $view) 
        {

            // Envio de cabeceras
            // header('Content-Type: application/json');

            // Ajustar los valores de la vista
            $view = str_replace(' ', '', $view);

            if (file_exists('./src/views/' . $view . '.php')) { 
                require_once './src/views/' . $view . '.php'; 
            } else { Render::error(506); }

        }

        // Render error
        public static function error(int $code) 
        {
            // Envio de cabeceras
            header('Content-Type: application/json');
            http_response_code($code);

            // Parametros de la respuesta
            $params = [ 'code' => $code, 'message' => 'Error ' . $code . ': No se pudo encontrar la ruta solicitada!' ];

            // Envio de la respuesta
            echo json_encode($params);

        }

        // Render json
        public static function json(array $data) 
        {
            header('Content-Type: application/json');
            echo json_encode($data);
        }

    }
    