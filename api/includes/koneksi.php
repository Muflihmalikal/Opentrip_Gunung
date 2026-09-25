<?php
$dbUrl = $_ENV['POSTGRES_URL'] ?? $_SERVER['POSTGRES_URL'] ?? getenv('POSTGRES_URL');

if ($dbUrl) {
    $dbopts = parse_url($dbUrl);
    $host = $dbopts['host'];
    $port = $dbopts['port'] ?? '6543';
    $user = $dbopts['user'];
    $pass = $dbopts['pass'];
    $db   = ltrim($dbopts['path'], '/');
} else {
    $host = $_ENV['POSTGRES_HOST'] ?? $_SERVER['POSTGRES_HOST'] ?? getenv('POSTGRES_HOST');
    $db   = $_ENV['POSTGRES_DATABASE'] ?? $_SERVER['POSTGRES_DATABASE'] ?? getenv('POSTGRES_DATABASE');
    $user = $_ENV['POSTGRES_USER'] ?? $_SERVER['POSTGRES_USER'] ?? getenv('POSTGRES_USER');
    $pass = $_ENV['POSTGRES_PASSWORD'] ?? $_SERVER['POSTGRES_PASSWORD'] ?? getenv('POSTGRES_PASSWORD');
    $port = $_ENV['POSTGRES_PORT'] ?? $_SERVER['POSTGRES_PORT'] ?? getenv('POSTGRES_PORT') ?: '6543';
}

$dsn = "pgsql:host={$host};port={$port};dbname={$db};sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (\PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}