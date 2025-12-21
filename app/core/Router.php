<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $scriptName = $_SERVER['SCRIPT_NAME'];
        $scriptDir = dirname($scriptName);

        $scriptDir = str_replace('\\', '/', $scriptDir);

        if ($scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
            $path = substr($path, strlen($scriptDir));
        }

        if ($path === '') {
            $path = '/';
        }

        if ($path !== '/' && substr($path, -1) === '/') {
            $path = rtrim($path, '/');
        }

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback) {
            echo call_user_func($callback);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
