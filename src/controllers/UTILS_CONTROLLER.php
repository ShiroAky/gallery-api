<?php

    // Crear namespace
    namespace Shiro\Api\Controllers;

    // Clase de las utilidades
    class UTILS_CONTROLLER {

        // Crear método para parsear los parámetros de la URL
        public static function url_parse(array $parse_url) {

            // Eliminar el primer elemento del array
            array_shift($parse_url);
            array_shift($parse_url);

            // Retornar los parámetros
            return $parse_url;

        }

        // Crear método para la creación de un token unico
        public static function create_token()
        {

            // Crear token unico
            $token = md5(time() . uniqid() . rand(0, 9999));
            $token = md5($token);

            // Eliminar los espacios en blanco
            $token = str_replace(' ', '', $token);

            // Retornar el token
            return $token;

        }

        // Crear método para la creación de un nombre de archivo unico
        public static function create_file_name(string $file_name)
        {

            // Optener la extensión del archivo
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);

            // Crear nombre de archivo unico
            $file_name = md5(time()) . '_' . uniqid() . '_' . rand(0, 9999) . '.' . $extension;

            // Eliminar los espacios en blanco
            $file_name = str_replace(' ', '', $file_name);

            // Retornar el nombre de archivo
            return $file_name;

        }
        
    }