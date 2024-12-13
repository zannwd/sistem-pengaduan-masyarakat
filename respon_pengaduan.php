<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengaduan = $_POST['id_pengaduan'];
    $respon = mysqli_real_escape_string($conn, $_POST['respon']); 

    
    $query = "UPDATE pengaduan SET respon = '$respon' WHERE id = '$id_pengaduan'";
    if (mysqli_query($conn, $query)) {
        header("Location: view_pengaduan.php?status=success");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
