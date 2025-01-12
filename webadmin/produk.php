<?php
include_once("../koneksi.php");

// Konfigurasi paginasi
$produk_per_halaman = 6;
$halaman_sekarang = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halaman_sekarang - 1) * $produk_per_halaman;

// Query untuk mendapatkan jumlah total produk
$query_jumlah_produk = "SELECT COUNT(*) AS jumlah FROM produk";
$hasil_jumlah_produk = mysqli_query($koneksi, $query_jumlah_produk);
$data_jumlah_produk = mysqli_fetch_assoc($hasil_jumlah_produk);
$jumlah_produk = $data_jumlah_produk['jumlah'];

// Query untuk mendapatkan data produk dengan paginasi
$query_produk = "SELECT * FROM produk LIMIT $produk_per_halaman OFFSET $offset";
$hasil = mysqli_query($koneksi, $query_produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #3498db;
      color: #fff;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    td a {
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }

    td a:hover {
      text-decoration: underline;
    }

    .action-column {
      width: 120px;
    }

    .pagination {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination a {
      padding: 8px 16px;
      margin: 0 5px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }

    .pagination a:hover {
      background-color: #217dbb;
    }

    .pagination .current {
      background-color: #217dbb;
    }
  </style>
  <title>Daftar Produk</title>
</head>
<body>

<h2>Daftar Produk</h2>

<!-- Tombol Tambah Produk -->
<button style="background-color: #4CAF50; color: white; padding: 10px; margin-bottom: 20px;">
  <a style="text-decoration: none; color: white;" href="formtambahproduk.php">Tambah Produk</a>
</button>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Keterangan</th>
    <th>Jenis ID</th>
    <th>Gambar</th>
    <th class="action-column">Aksi</th>
  </tr>

  <?php
  $nomer = ($halaman_sekarang - 1) * $produk_per_halaman + 1;
  while ($data = mysqli_fetch_array($hasil)) {
    ?>
    
    <tr>
      <td><?php echo $nomer; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo "Rp." . number_format($data['harga'], 0, ',', '.'); ?></td>
      <td><?php echo $data['keterangan']; ?></td>
      <td><?php echo $data['jenis_id']; ?></td>
      <td>
      <a href="image.php?produk_id=<?php echo $data['id']; ?>">cek</a>
      </td>
      <td class="action-column">
        <a href="formeditproduk.php?id=<?php echo $data['id']; ?>">Ubah</a> |
        <a href="proseshapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data produk ini?')">Hapus</a>
      </td>
    </tr>
    <?php $nomer++;
  } ?>
</table>

<div class="pagination">
  <!-- Paginasi -->
  <?php
  $jumlah_halaman = ceil($jumlah_produk / $produk_per_halaman);
  for ($i = 1; $i <= $jumlah_halaman; $i++) {
    $class = ($i == $halaman_sekarang) ? 'current' : '';
    echo "<a class='$class' href='?halaman=$i'>$i</a> ";
  }
  ?>
</div>

</body>
</html>
