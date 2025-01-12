<!-- shop section -->

<!-- shop section -->
<?php
include_once("koneksi.php");
$query = "SELECT produk.*, jenis.nama AS nama_jenis FROM produk LEFT JOIN jenis ON produk.jenis_id = jenis.id LIMIT 8";
$hasil = mysqli_query($koneksi, $query);
?>
<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Products
      </h2>
    </div>
    <div class="row">
      <?php while ($data = mysqli_fetch_array($hasil)) { ?>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <div id="carouselExampleControls<?= $data['id'] ?>" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php
                    // Ambil data gambar sesuai produk_id
                    $gambar_query = "SELECT * FROM img WHERE produk_id = " . $data['id'];
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
                <h6>
                  <?= $data['nama'] ?>
                </h6>
              </div>
              <div class="detail-box">
                <p>
                  <?= $data['nama_jenis'] ?>
                </p>
              </div>
              <div class="detail-box">
                <h6>
                  <span>
                    <?= "Rp. " . number_format($data['harga'], 0, ',', '.') ?>
                  </span>
                </h6>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="btn-box">
      <a href="index.php?page=allproduct">
        View All Products
      </a>
    </div>
  </div>
</section>


  <!-- end shop section -->

  <!-- saving section -->

 

  <!-- end why section -->


  <!-- gift section -->

  

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Azka
                  </h5>
                  <h6 style="color: yellow;">
                  <i class="fa fa-star" aria-hidden="true" ></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Mantap bro boosting game nya!             </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Hanif
                  </h5>
                  <h6 style="color: yellow;">
                  <i class="fa fa-star" aria-hidden="true" ></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Gak pernah gagal boosting game disini, recommend ya ges ya              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Iko
                  </h5>
                  <h6 style="color: yellow;">
                  <i class="fa fa-star" aria-hidden="true" ></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Gacor abis!            </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->