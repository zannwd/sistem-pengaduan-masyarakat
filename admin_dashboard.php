<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Admin</title>
</head>
<body class="bg-gray-50 font-sans">
    <div class="container mx-auto p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h1 class="text-4xl font-semibold text-center text-teal-600 mb-4">Selamat Datang, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h1>
            <p class="text-center text-gray-600">Anda Masuk Sebagai Admin. Kelola Tugas Anda.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-teal-600 mb-4">Data Pengaduan</h2>
            <?php include 'view_pengaduan.php'; ?>
        </div>

        <div class="flex justify-start">
            <a href="logout.php">
                <button class="bg-teal-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-teal-600 transition-all">
            Logout
                </button>
            </a>
        </div>
    </div>
</body>
</html>
