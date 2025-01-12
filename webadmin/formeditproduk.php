<!-- formeditproduk.php -->
<?php
include_once("../koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id = $id";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);
} else {
    header("Location: produk.php");
}
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

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <title>Edit Produk</title>
</head>

<body>

    <form action="prosesedit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="nama">Nama Produk:</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="text" name="harga" value="<?php echo $data['harga']; ?>" required>
        <br>
        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" rows="4"><?php echo $data['keterangan']; ?></textarea>
        <br>
        <label for="jenis_id">Jenis ID:</label>
        <input type="text" name="jenis_id" value="<?php echo $data['jenis_id']; ?>">
        <br>
        <input type="submit" value="Simpan Perubahan">
    </form>

</body>

</html>
