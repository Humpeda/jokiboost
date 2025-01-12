<!-- shop section -->
<?php
include_once("koneksi.php");

// Ambil data jenis produk
$query_jenis = "SELECT * FROM jenis";
$hasil_jenis = mysqli_query($koneksi, $query_jenis);

// Dapatkan jenis_id dari parameter URL
$jenis_id = isset($_GET['jenis_id']) ? $_GET['jenis_id'] : 'all';

// Default query untuk menampilkan semua produk atau berdasarkan jenis terpilih
$query_produk = "SELECT produk.*, jenis.nama AS nama_jenis FROM produk LEFT JOIN jenis ON produk.jenis_id = jenis.id";
if ($jenis_id != 'all') {
    $query_produk .= " WHERE produk.jenis_id = $jenis_id";
}
$hasil_produk = mysqli_query($koneksi, $query_produk);
?>

<section class="shop_section layout_padding">
    <div class="container">
       

        <?php
        // Menggunakan array asosiatif untuk menyimpan produk berdasarkan jenis
        $produk_per_jenis = array();

        while ($data = mysqli_fetch_array($hasil_produk)) {
            $jenis_produk = $data['nama_jenis'];

            // Menambahkan produk ke array jenis_produk
            if (!isset($produk_per_jenis[$jenis_produk])) {
                $produk_per_jenis[$jenis_produk] = array();
            }

            $produk_per_jenis[$jenis_produk][] = $data;
        }

        // Menampilkan produk berdasarkan jenis
        foreach ($produk_per_jenis as $jenis_produk => $produk) {
        ?>
            <div class="row mb-4">
                <div class="col-12">
                    <h3><?= $jenis_produk ?></h3>
                </div>
            </div>

            <div class="row" id="produk-container">
                <?php foreach ($produk as $produk_data) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="">
                                <div class="img-box">
                                    <div id="carouselExampleControls<?= $produk_data['id'] ?>" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            // Ambil data gambar sesuai produk_id
                                            $gambar_query = "SELECT * FROM img WHERE produk_id = " . $produk_data['id'];
                                            $gambar_hasil = mysqli_query($koneksi, $gambar_query);
                                            $first = true;
                                            while ($gambar = mysqli_fetch_array($gambar_hasil)) {
                                            ?>
                                                <div class="carousel-item<?= $first ? ' active' : '' ?>">
                                                    <img src="images/product/<?= $gambar['nama'] ?>" class="d-block w-100" alt="...">
                                                </div>
                                            <?php
                                                $first = false;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-box">
                                    <h6><?= $produk_data['nama'] ?></h6>
                                </div>
                                <div class="">
                                    <p><?= $produk_data['nama_jenis'] ?></p>
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        <span><?= "Rp. " . number_format($produk_data['harga'], 0, ',', '.') ?></span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div><br><br>
        <?php } ?>
    </div>
</section>
