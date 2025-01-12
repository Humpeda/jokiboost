<?php
include_once("../koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM produk WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: produk.php"); // Redirect ke halaman daftar produk setelah hapus
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($koneksi);
    }
} else {
    header("Location: produk.php");
}
?>
