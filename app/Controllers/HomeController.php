<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        ob_start();
        require __DIR__ . '/../views/home.php';
        return ob_get_clean();
    }
}
