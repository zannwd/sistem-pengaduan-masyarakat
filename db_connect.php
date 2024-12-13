<?php
$host = 'sql310.ezyro.com';
$user = 'ezyro_37910616'; 
$password = '5c2d66044d56'; 
$database = 'ezyro_37910616_pengaduan_db';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
