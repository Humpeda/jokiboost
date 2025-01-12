<?php
include_once("../koneksi.php");

// Proses form tambah gambar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_tambah_gambar'])) {
    if (isset($_POST['produk_id'])) {
        $id_produk = $_POST['produk_id'];

        // Proses upload gambar
        $target_dir = "../images/product/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Maaf, file terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Maaf, gambar tidak diupload.";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // Insert data gambar ke database
                $gambar_nama = basename($_FILES["gambar"]["name"]);
                $query_insert_gambar = "INSERT INTO img (produk_id, nama) VALUES ('$id_produk', '$gambar_nama')";
                mysqli_query($koneksi, $query_insert_gambar);
                echo "Gambar berhasil diupload.";
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload gambar.";
            }
        }
    } else {
        echo "ID Produk tidak ditemukan.";
    }
}

// Proses penghapusan gambar
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['aksi_hapus_gambar'])) {
    $id_gambar = $_GET['id_gambar'];

    // Query untuk mendapatkan nama gambar
    $query_get_gambar = "SELECT nama FROM img WHERE id = $id_gambar";
    $result_get_gambar = mysqli_query($koneksi, $query_get_gambar);
    $data_gambar = mysqli_fetch_assoc($result_get_gambar);

    if ($data_gambar) {
        $gambar_nama = $data_gambar['nama'];

        // Hapus data gambar dari database
        $query_hapus_gambar = "DELETE FROM img WHERE id = $id_gambar";
        mysqli_query($koneksi, $query_hapus_gambar);

        // Hapus file gambar dari server
        $file_path = "../images/product/" . $gambar_nama;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        echo "Gambar berhasil dihapus.";
    } else {
        echo "Gambar tidak ditemukan.";
    }
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
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

        /* Tambahan style untuk form dan tabel gambar */
        form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .gambar-table {
            width: 70%;
            margin-top: 20px;
        }

        .gambar-table th,
        .gambar-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .gambar-table th {
            background-color: #3498db;
            color: #fff;
        }

        .gambar-table tr:hover {
            background-color: #f5f5f5;
        }

        .gambar-table td a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .gambar-table td a:hover {
            text-decoration: underline;
        }

        .gambar-table img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
    <title>Manajemen Gambar Produk</title>
</head>

<body>

    <?php
    // Periksa apakah ada ID produk yang dikirimkan
    if (isset($_GET['produk_id'])) {
        $id_produk = $_GET['produk_id'];
        $query_produk = "SELECT * FROM produk WHERE id = $id_produk";
        $result_produk = mysqli_query($koneksi, $query_produk);
        $data_produk = mysqli_fetch_assoc($result_produk);

        if ($data_produk) {
    ?>

            <!-- Form Tambah Gambar -->
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="produk_id" value="<?php echo $data_produk['id']; ?>">
                <label for="gambar">Tambah Gambar:</label>
                <input type="file" name="gambar" id="gambar" required>
                <input type="submit" name="submit_tambah_gambar" value="Tambah Gambar">
            </form>

            <!-- Daftar Gambar -->
            <h3>Daftar Gambar:</h3>
            <table class="gambar-table">
                <tr>
                    <th>No</th>
                    <th>Nama Gambar</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $query_daftar_gambar = "SELECT * FROM img WHERE produk_id = $id_produk";
                $result_daftar_gambar = mysqli_query($koneksi, $query_daftar_gambar);
                $nomor = 1;

                while ($data_gambar = mysqli_fetch_assoc($result_daftar_gambar)) {
                ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data_gambar['nama']; ?></td>
                        <td><img src="../images/product/<?php echo $data_gambar['nama']; ?>" alt="Gambar"></td>
                        <td>
                            <a href="?produk_id=<?php echo $id_produk; ?>&aksi_hapus_gambar&id_gambar=<?php echo $data_gambar['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus gambar ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $nomor++;
                }
                ?>
            </table>

    <?php
        } else {
            echo "Produk tidak ditemukan.";
        }
    } else {
        echo "ID Produk tidak ditemukan.";
    }
    ?>

</body>

</html>
