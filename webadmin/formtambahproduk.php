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

    form {
      width: 50%;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
  <title>Form Tambah Produk</title>
</head>
<body>

<h2>Form Tambah Produk</h2>

<form action="prosesinput.php" method="post">
  <label for="nama">Nama Produk:</label>
  <input type="text" id="nama" name="nama" required>

  <label for="harga">Harga:</label>
  <input type="number" id="harga" name="harga" required>

  <label for="keterangan">Keterangan:</label>
  <textarea id="keterangan" name="keterangan" rows="4" required></textarea>

  <label for="jenis_id">Jenis Produk:</label>
  <select id="jenis_id" name="jenis_id" required>
    <?php
    include_once("../koneksi.php");

    $query_jenis = "SELECT * FROM jenis";
    $hasil_jenis = mysqli_query($koneksi, $query_jenis);

    while ($jenis = mysqli_fetch_assoc($hasil_jenis)) {
      echo "<option value='{$jenis['id']}'>{$jenis['nama']}</option>";
    }
    ?>
  </select>

  <button type="submit">Tambah Produk</button>
</form>

</body>
</html>
