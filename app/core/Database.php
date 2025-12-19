<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private $db_file;
    public $conn;

    public function __construct()
    {
        $this->conn = null;
        // Path to SQLite file: /app/database.sqlite
        // Adjust path to be safely writable. Going up two levels from core -> app -> root
        $this->db_file = __DIR__ . '/../../database.sqlite';

        try {
            // Connect to SQLite file (creates it automatically)
            $this->conn = new PDO("sqlite:" . $this->db_file);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Create users table if not exists
            $this->createTables();

        } catch (PDOException $e) {
            echo "<div style='background: #fee2e2; color: #991b1b; padding: 2rem;'>
                <h3>Ошибка базы данных</h3>
                <p>Не удалось создать файл базы данных SQLite.</p>
                <p>Ошибка: " . $e->getMessage() . "</p>
            </div>";
            die();
        }
    }

    private function createTables()
    {
        // SQLite syntax
        $sqlUsers = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sqlUsers);

        $sqlAppointments = "CREATE TABLE IF NOT EXISTS appointments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            doctor_name TEXT NOT NULL,
            specialty TEXT NOT NULL,
            appointment_date DATETIME NOT NULL,
            status TEXT DEFAULT 'pending',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $this->conn->exec($sqlAppointments);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
