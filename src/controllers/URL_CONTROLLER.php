<?php

    // Crear namespace
    namespace Shiro\Api\Controllers;

    // Usar namespaces
    use Shiro\Api\Controllers\UTILS_CONTROLLER;

    // Craer clase para obtener los parámetros de la URL
    class URL_CONTROLLER {

        // Crear método para obtener los parámetros de la URL
        public static function get_params(int $param_number) {

            // Obtener los parámetros de la URL
            $params = explode('/', $_SERVER['REQUEST_URI']);

            // parsear los parámetros de la URL
            $params = UTILS_CONTROLLER::url_parse($params);

            // Retornar los parámetros
            $result = $params[$param_number];
            return $result;

        }

        // Crear método para obtener la URL completa
        public static function get_url() {

            // Sabar si es http o https
            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            
            // Obtener la URL completa
            $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

            // Retornar la URL completa
            return $url;
            
        }
        
    }