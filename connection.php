<?php


$host = 'localhost';        // Change if your host is different
$db   = 'rpl_applications'; // Your database name
$user = 'root';             // Your DB username
$pass = '';                 // Your DB password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Enable exception error mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Fetch as associative array
    PDO::ATTR_EMULATE_PREPARES   => false,                   // Turn off emulation mode
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
