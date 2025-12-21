<?php

namespace App\Controllers;

use App\Core\Database;

class AppointmentController
{
    public function create()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        ob_start();
        require __DIR__ . '/../views/booking.php';
        return ob_get_clean();
    }

    public function store()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $doctor = $_POST['doctor'] ?? '';
        $date = $_POST['date'] ?? '';
        $time = $_POST['time'] ?? '';

        if (empty($doctor) || empty($date) || empty($time)) {
            $_SESSION['error'] = 'Заполните все поля';
            header('Location: ' . BASE_URL . '/book');
            exit;
        }

        $doctorParts = explode('|', $doctor);
        $doctorName = $doctorParts[0] ?? $doctor;
        $specialty = $doctorParts[1] ?? 'Врач';

        $dateTime = $date . ' ' . $time;

        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("INSERT INTO appointments (user_id, doctor_name, specialty, appointment_date, status) VALUES (:user_id, :doctor_name, :specialty, :appointment_date, 'confirmed')");
            $stmt->execute([
                'user_id' => $_SESSION['user']['id'],
                'doctor_name' => $doctorName,
                'specialty' => $specialty,
                'appointment_date' => $dateTime
            ]);

            $_SESSION['success'] = 'Запись успешно создана!';
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        } catch (\PDOException $e) {
            $_SESSION['error'] = 'Ошибка: ' . $e->getMessage();
            header('Location: ' . BASE_URL . '/book');
            exit;
        }
    }
}
