<?php
include 'db_connect.php';

$nik = isset($_POST['nik']) ? $_POST['nik'] : '';

if ($nik) {
    $query = "SELECT * FROM pengaduan WHERE nik = '$nik'";
    $result = mysqli_query($conn, $query);
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Pengaduan Masyarakat Lendang Nangke" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Pengaduan Saya</title>
</head>
<body class="bg-gray-100 font-sans">

  <header class="bg-teal-500 text-white py-4">
    <h1 class="text-3xl text-center font-semibold">Pengaduan Masyarakat</h1>
  </header>
  
  <section class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-teal-600 mb-6">Cek Respon Pengaduan</h2>
    <form method="POST" action="" class="flex flex-col items-center">
      <label for="nik" class="text-lg mb-2">Masukkan NIK Anda:</label>
      <input type="text" id="nik" name="nik" required class="px-4 py-2 border border-gray-300 rounded-md mb-4 w-full sm:w-1/2 md:w-1/3" />
      <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded-md hover:bg-teal-600 w-full sm:w-1/2 md:w-1/3">Cek Pengaduan</button>
    </form>
  </section>
  
  <?php if ($nik): ?>
  <section class="container mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-center text-teal-600 mb-6">Daftar Pengaduan dan Respon</h2>
    <div class="space-y-6">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="flex flex-wrap gap-4 justify-between">
            <div class="flex-shrink-0 w-full sm:w-1/3 lg:w-1/4 bg-white p-4 rounded-lg shadow-md">
              <h3 class="text-xl font-semibold text-teal-600">Nama:</h3>
              <p class="text-gray-700"><?= htmlspecialchars($row['nama']); ?></p>
            </div>
            
            <div class="flex-shrink-0 w-full sm:w-1/3 lg:w-1/4 bg-white p-4 rounded-lg shadow-md">
              <h3 class="text-xl font-semibold text-teal-600">Pengaduan:</h3>
              <p class="text-gray-700"><?= htmlspecialchars($row['pengaduan']); ?></p>
            </div>

            <div class="flex-shrink-0 w-full sm:w-1/3 lg:w-1/4 bg-white p-4 rounded-lg shadow-md">
              <h3 class="text-xl font-semibold text-teal-600">Gambar:</h3>
              <?php if ($row['gambar']): ?>
                <img src="uploads/<?= htmlspecialchars($row['gambar']); ?>" alt="Gambar Pengaduan" class="w-full h-auto rounded-md shadow-sm">
              <?php else: ?>
                <p class="text-gray-500">Tidak ada gambar</p>
              <?php endif; ?>
            </div>
          </div>

    
          <div class="bg-teal-100 p-6 rounded-lg shadow-md mt-6">
            <h3 class="text-xl font-semibold text-teal-600">Respon Admin:</h3>
            <?php if (!empty($row['respon'])): ?>
              <p class="text-teal-700"><?= htmlspecialchars($row['respon']); ?></p>
            <?php else: ?>
              <p class="text-gray-500">Belum ada respon</p>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-span-full text-center py-4 text-gray-500">Belum ada pengaduan yang diajukan dengan NIK ini.</div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

</body>
</html>
