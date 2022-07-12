<?php

    // Usar namespaces
    use Shiro\Api\Models\Data_model;
    use Shiro\Api\Controllers\URL_CONTROLLER;

    Data_model::delete(URL_CONTROLLER::get_params(0));