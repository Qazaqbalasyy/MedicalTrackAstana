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

        // Detect if running in a subdirectory
        $scriptName = $_SERVER['SCRIPT_NAME']; // e.g., /php/med/index.php
        $scriptDir = dirname($scriptName);     // e.g., /php/med

        // Normalize slashes for consistency
        $scriptDir = str_replace('\\', '/', $scriptDir);

        // Run path adjustment only if scriptDir is not just "/"
        if ($scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
            $path = substr($path, strlen($scriptDir));
        }

        // If path became empty effectively means root
        if ($path === '') {
            $path = '/';
        }

        // Remove trailing slash if not root
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
