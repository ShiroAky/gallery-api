<?php

    // Usar namespaces
    use Shiro\Api\Models\Data_model;
    use Shiro\Api\Controllers\URL_CONTROLLER;

    // Ejecutar el método para obtener los datos
    Data_model::get(URL_CONTROLLER::get_params(0));