<?php

    // Crear el namespace de la aplicación
    namespace Shiro\Api\App;

    // Uso de namespaces
    use Closure;
    use Shiro\Api\App\Render;

    // Crear la clase Router
    class Router
    {
        
        public array $routes = [];

        /**
         * @param string $action
         * @param Closure $callback
         */

         public static function route(string $action, Closure $callback)
         {
             global $routes;
             $action = trim($action, '/');
             $action = preg_replace('/{[^}]+}/', '(.+)', $action);
             $routes[$action] = $callback;
         }

         /**
         * @param string $action
         * Run router and render view
         */

         public static function run(string $action) 
         {
             global $routes;
             $action = trim($action, '/');
             $callback = '';
             $params = [];

             foreach ($routes as $route => $habdler) {

                 if (preg_match("%^{$route}$%", $action, $matches) === 1) {
                     $callback = $habdler;
                     unset($matches[0]);
                     $params = $matches;
                     break;
                 }

             }

             if (!$callback || !is_callable($callback)) {
                 Render::error(404);
             }

             call_user_func($callback, ...$params);

         }

    }