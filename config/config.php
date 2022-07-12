<?php

    // Configuraciones de la app

    // Aceptar peticiones
    header('Access-Control-Allow-Origin: *');
    // header('content-type: application/json');
    header('Access-Control-Allow-Methods: GET, POST');

    // Ocultar errores
    error_reporting(0);