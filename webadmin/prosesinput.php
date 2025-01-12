<?php
include_once("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $keterangan = $_POST["keterangan"];
    $jenis_id = $_POST["jenis_id"];

    // Gunakan prepared statement
    $query = "INSERT INTO produk (nama, harga, keterangan, jenis_id) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);
    
    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sdsi", $nama, $harga, $keterangan, $jenis_id);
    
    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: produk.php"); // Redirect ke halaman daftar produk setelah tambah
    } else {
        echo "Gagal menambahkan produk: " . mysqli_error($koneksi);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>
