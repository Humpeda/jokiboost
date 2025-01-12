<?php
include_once("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $keterangan = $_POST["keterangan"];
    $jenis_id = $_POST["jenis_id"];

    $query = "UPDATE produk SET nama='$nama', harga=$harga, keterangan='$keterangan', jenis_id=$jenis_id WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: produk.php"); // Redirect ke halaman daftar produk setelah edit
    } else {
        echo "Gagal menyimpan perubahan: " . mysqli_error($koneksi);
    }
}
?>
