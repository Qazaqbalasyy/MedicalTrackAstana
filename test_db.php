<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Диагностика подключения к Базе Данных</h2>";

$hosts = ['127.0.0.1', 'localhost'];
$ports = [3306, 3307, 33060, 3308];
$users = ['root'];
$passwords = ['', 'root', 'mysql'];

$success = false;

echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<tr><th>Host</th><th>Port</th><th>User</th><th>Password</th><th>Status</th><th>Error</th></tr>";

foreach ($hosts as $host) {
    foreach ($ports as $port) {
        foreach ($users as $user) {
            foreach ($passwords as $pass) {
                echo "<tr>";
                echo "<td>$host</td><td>$port</td><td>$user</td><td>'" . $pass . "'</td>";

                try {
                    $dsn = "mysql:host=$host;port=$port;connect_timeout=1";
                    $pdo = new PDO($dsn, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "<td style='color: green; font-weight: bold;'>USPEH! (Success)</td>";
                    echo "<td>-</td>";
                    $success = true;

                    // Found working config!
                    break 4; // Break all loops

                } catch (PDOException $e) {
                    echo "<td style='color: red;'>Fail</td>";
                    echo "<td style='font-size: 0.8em;'>" . $e->getMessage() . "</td>";
                }
                echo "</tr>";
            }
        }
    }
}
echo "</table>";

if ($success) {
    echo "<h3>✅ Мы нашли рабочие настройки!</h3>";
    echo "<p>Сейчас я обновлю конфигурацию сайта.</p>";
} else {
    echo "<h3>❌ Не удалось подключиться.</h3>";
    echo "<p>Похоже, MySQL вообще не запущен. Проверьте зеленый флажок в OSPanel.</p>";
}
