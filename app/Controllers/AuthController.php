<?php

namespace App\Controllers;

use App\Core\Database;
use PDO;

class AuthController
{
    public function loginPage()
    {
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }
        ob_start();
        require __DIR__ . '/../views/login.php';
        return ob_get_clean();
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Заполните все поля';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Неверный email или пароль';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    public function registerPage()
    {
        ob_start();
        require __DIR__ . '/../views/register.php';
        return ob_get_clean();
    }

    public function register()
    {
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = 'Заполните обязательные поля';
            header('Location: ./register');
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = 'Пользователь с таким email уже существует';
            header('Location: ' . BASE_URL . '/register');
            exit;
        }

        $fullName = $name . ' ' . $surname;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute([
                'name' => $fullName,
                'email' => $email,
                'password' => $hashedPassword
            ]);

            $_SESSION['user'] = [
                'id' => $conn->lastInsertId(),
                'name' => $fullName,
                'email' => $email
            ];

            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        } catch (\PDOException $e) {
            $_SESSION['error'] = 'Ошибка при регистрации: ' . $e->getMessage();
            header('Location: ' . BASE_URL . '/register');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
