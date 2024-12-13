<?php
include 'db_connect.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$no_telp = $_POST['noTelp'];
$pengaduan = $_POST['pengaduan'];
$gambar = $_FILES['gambar']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($gambar);

if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
    $query = "INSERT INTO pengaduan (nik, nama, no_telp, pengaduan, gambar) 
              VALUES ('$nik', '$nama', '$no_telp', '$pengaduan', '$gambar')";
    if (mysqli_query($conn, $query)) {
        echo "Pengaduan berhasil dikirim!";
        header("Location: index.html");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Gagal mengunggah gambar!";
}
?>
