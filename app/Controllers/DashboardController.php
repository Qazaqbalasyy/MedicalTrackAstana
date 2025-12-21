<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');

            exit;
        }

        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM appointments WHERE user_id = :user_id ORDER BY appointment_date ASC");
        $stmt->execute(['user_id' => $_SESSION['user']['id']]);
        $appointments = $stmt->fetchAll();

        ob_start();
        require __DIR__ . '/../views/dashboard.php';
        return ob_get_clean();
    }
}
