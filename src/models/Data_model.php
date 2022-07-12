<?php

    // Crear namespace
    namespace Shiro\Api\Models;

    // Usar namespaces
    use Shiro\Api\Database\DB;
    use Shiro\Api\App\Render;
    use Shiro\Api\Controllers\UTILS_CONTROLLER;
    use Shiro\Api\Controllers\URL_CONTROLLER;

    // Crear clase de modelo de datos
    class Data_model
    {

        // Ajustes del modelo de datos
        private const notResults = [ 'code' => 200, 'message' => 'No se encontraron resultados!' ];
        private const query = "SELECT * FROM `wallpapers`";

        // Crear constructor de la clase
        public static function get_con() { return new DB(); }

        // Crear método para obtener los datos
        public static function getAll()
        {

            // Crear variable para almacenar los datos
            $data = [];

            // Crear variable para almacenar el resultado de la consulta
            $result = Data_model::get_con()->query(self::query);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {

                // Recorrer los resultados
                while ($row = $result->fetch_assoc()) { $data[] = $row; }
                
            } else {
                Render::json(self::notResults);
            }

            // Devolver los datos
            $validate = (!empty($data) || !isset($data)) ? Render::json($data) : '';
            
        }

        // Crear método para obtener un dato
        public static function get(string $token)
        {

            // Crear variable para almacenar los datos
            $data = [];

            // Crear variable para almacenar el resultado de la consulta
            $result = Data_model::get_con()->query(self::query . " WHERE `token` = '" . $token . "'");

            // Verificar si hay resultados
            if ($result->num_rows > 0) {

                // Recorrer los resultados
                while ($row = $result->fetch_assoc()) { $data[] = $row; }
                
            } else {
                Render::json(self::notResults);
            }

            // Devolver los datos
            $validate = (!empty($data) || !isset($data)) ? Render::json($data) : '';

        }

        // Crear método para agregar un dato
        public static function add(string $wall)
        {

            // Crear variable para almacenar los datos
            $data = [];

            // Crear variable para almacenar el resultado de la consulta
            $result = Data_model::get_con()->query("INSERT INTO `wallpapers` (`token`, `wall`, `wall_name`) VALUES ('" . UTILS_CONTROLLER::create_token() . "', '" . URL_CONTROLLER::get_url() . 'source/' . $wall . "', '" . $wall . "')");
            
            // Verificar si hay resultados
            if ($result) {
                $data = [ 'code' => 200, 'message' => 'Se ha agregado el wallpaper!' ];
            } else {
                $data = [ 'code' => 500, 'message' => 'No se ha podido agregar el wallpaper!' ];
            }
            
            // Devolver los datos
            Render::json($data);
            
        }

        // Crear método para eliminar un dato
        public static function delete(string $token)
        {

            // Seleccionar el wallpaper a eliminar
            $image = Data_model::get_con()->query("SELECT wall_name FROM `wallpapers` WHERE `token` = '" . $token . "'");

            unlink('./source/' . $image->fetch_assoc()['wall_name']);


            // Crear variable para almacenar el resultado de la consulta
            $result = Data_model::get_con()->query("DELETE FROM `wallpapers` WHERE `token` = '" . $token . "'");
            
            // Verificar si hay resultados
            if ($result) {
                $data = [ 'code' => 200, 'message' => 'Se ha eliminado el wallpaper!' ];
            } else {
                $data = [ 'code' => 500, 'message' => 'No se ha podido eliminar el wallpaper!' ];
            }

            // Devolver los datos
            Render::json($data);

        }

    }