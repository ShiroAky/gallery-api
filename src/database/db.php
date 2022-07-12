<?php

    // Crear namespace
    namespace Shiro\Api\Database;

    // Usar namespaces
    use Shiro\Api\App\Render;
    use mysqli;

    // Clase de la base de datos
    class DB extends mysqli
    {

        private const DB_HOST = 'localhost';
        private const DB_USER = 'root';
        private const DB_PASS = '';
        private const DB_NAME = 'api';

        // Constructor de la base de datos
        public function __construct()
        {
           
            // Llamar al constructor de la clase padre
            parent::__construct(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
            
            // Verificar si hay error
            if ($this->connect_error) {
                // die('Error de conexión: ' . $this->connect_error);
                // echo 'Error de conexión: ' . $this->connect_error;
                Render::json(['code' => 500, 'message' => 'Error de conexión: No se pudo conectar a la base de datos!']);
            } else {
                // echo 'Conexión exitosa!';
            }

        }
        
    }