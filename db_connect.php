<?php
// Supabase database URL
$databaseUrl = "postgres://postgres.apbkobhfnmcqqzqeeqss:Nasigoreng_10@aws-0-ca-central-1.pooler.supabase.com:5432/postgres";

// Parse database URL
$dbparts = parse_url($databaseUrl);

$host = $dbparts['host'];
$port = $dbparts['port'];
$dbname = ltrim($dbparts['path'], '/');
$username = $dbparts['user'];
$password = $dbparts['pass'];

try {
    // Create PDO instance for PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch associative arrays
    ]);

    echo "Koneksi ke database berhasil!";
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
