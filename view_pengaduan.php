<?php
include 'db_connect.php';

$query = "SELECT * FROM pengaduan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/admin.css">
  <title>Data Pengaduan</title>
</head>
<body class="bg-gray-100 font-sans">
    
  <header class="bg-teal-500 text-white py-4">
    <h1 class="text-3xl text-center font-semibold">Data Pengaduan</h1>
  </header>


  <section class="container mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-center text-teal-600 mb-6">Daftar Pengaduan</h2>
    <div class="flex flex-wrap gap-6">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-teal-600">Pengaduan #<?= htmlspecialchars($row['id']); ?></h3>
            
            <div class="mt-4">
              <p class="text-sm text-gray-500"><strong>NIK:</strong> <?= htmlspecialchars($row['nik']); ?></p>
              <p class="text-sm text-gray-500"><strong>Nama:</strong> <?= htmlspecialchars($row['nama']); ?></p>
              <p class="text-sm text-gray-500"><strong>No Telp:</strong> <?= htmlspecialchars($row['no_telp']); ?></p>
              <p class="mt-2 text-gray-700"><strong>Pengaduan:</strong> <?= htmlspecialchars($row['pengaduan']); ?></p>

              
              <?php if ($row['gambar']): ?>
                <div class="mt-4">
                  <strong>Gambar:</strong>
                  <img src="uploads/<?= htmlspecialchars($row['gambar']); ?>" alt="Gambar Pengaduan" class="w-full h-auto rounded-md shadow-sm">
                </div>
              <?php else: ?>
                <p class="mt-2 text-gray-500">Tidak ada gambar</p>
              <?php endif; ?>

        
              <div class="mt-4">
                <form action="respon_pengaduan.php" method="POST">
                  <textarea name="respon" placeholder="Berikan respon..." required class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4"></textarea>
                  <input type="hidden" name="id_pengaduan" value="<?= $row['id']; ?>" />
                  <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded-md hover:bg-teal-600 w-full">Kirim Respon</button>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-span-full text-center py-4 text-gray-500">Tidak ada data pengaduan.</div>
      <?php endif; ?>
    </div>
  </section>

</body>
</html>
