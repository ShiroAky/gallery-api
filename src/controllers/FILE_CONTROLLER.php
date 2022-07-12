<?php

    // Crear namespace
    namespace Shiro\Api\Controllers;

    // Usar namespaces
    use Shiro\Api\App\Render;
    use Shiro\Api\Models\Data_model;
    use Shiro\Api\Controllers\UTILS_CONTROLLER;

    // Crear clase para administrar los archivos
    class FILE_CONTROLLER
    {

        // Configuración de la clase
        // private string $file_path = './source/';

        // Crear método para subir un archivo
        public static function upload()
        {

            if (isset($_FILES['add_wallpaper'])) {

                // Crear variable para almacenar el archivo
                $file = $_FILES['add_wallpaper'];

                // Crear variable para almacenar el nombre del archivo
                $file_name = UTILS_CONTROLLER::create_file_name($file['name']);

                // Subir el archivo
                $result = move_uploaded_file($file['tmp_name'], './source/' . $file_name);

                // Verificar si se subió el archivo
                if ($result) {
                    Render::json(['code' => 200, 'message' => 'El archivo se subió correctamente en la ruta: ' . '/source/' . $file_name]);
                    Data_model::add($file_name);
                } else {
                    Render::json(['code' => 500, 'message' => 'No se pudo subir el archivo!']);
                }

                header('Content-Type: application/json');
                echo json_encode($result);

            }

        }

    }