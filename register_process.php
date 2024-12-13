<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak diizinkan.");
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$query_check = "SELECT * FROM admin WHERE username = '$username'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    die("Username sudah terdaftar!");
}

$query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

if (mysqli_query($conn, $query)) {
    echo "Registrasi berhasil!";
    header("Location: login.html"); 
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
