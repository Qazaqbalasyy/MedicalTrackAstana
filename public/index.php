<?php
session_start();

$scriptName = $_SERVER['SCRIPT_NAME'];
$baseDir = dirname($scriptName);
$baseDir = str_replace('\\', '/', $baseDir);
if ($baseDir === '/')
    $baseDir = '';
define('BASE_URL', $baseDir);


spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\AppointmentController;

$router = new Router();

$homeController = new HomeController();
$authController = new AuthController();
$dashboardController = new DashboardController();
$appointmentController = new AppointmentController();

$router->get('/', [$homeController, 'index']);

$router->get('/dashboard', [$dashboardController, 'index']);

$router->get('/login', [$authController, 'loginPage']);
$router->post('/login', [$authController, 'login']);

$router->get('/register', [$authController, 'registerPage']);
$router->post('/register', [$authController, 'register']);

$router->get('/book', [$appointmentController, 'create']);
$router->post('/book', [$appointmentController, 'store']);

$router->get('/logout', [$authController, 'logout']);

$router->dispatch();
