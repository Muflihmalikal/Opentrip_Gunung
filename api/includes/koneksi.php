<?php
$host = getenv('POSTGRES_HOST');
$db   = getenv('POSTGRES_DATABASE');
$user = getenv('POSTGRES_USER');
$pass = getenv('POSTGRES_PASSWORD');
$port = getenv('POSTGRES_PORT') ?: '6543';

$dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $db;

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (\PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
