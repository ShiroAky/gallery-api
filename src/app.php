<?php

// Usar namespaces
use Shiro\Api\App\Router;
use Shiro\Api\App\Render;

// Rutas de la aplicación
Router::route('/', function () {
    Render::view('home');
});

Router::route('/get/{token}/', function ($token) {
    Render::view('get');
});

Router::route('/add', function () {
    Render::view('add');
});

Router::route('/delete/{token}/', function ($token) {
    Render::view('delete');
});

// Iniciar la aplicación
Router::run($_SERVER['REQUEST_URI']);