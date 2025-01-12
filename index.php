<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/logo12.jpg" type="image/x-icon">

  <title>
  HUMPEDA'S GAME
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
        @font-face {
            font-family: 'Knight Warrior'; /* Ganti dengan nama font yang sesuai */
              src: url('../font/Knight Warrior.ttf') format('truetype'), /* Format untuk .ttf */
                  url('../font/Knight Warrior.otf') format('opentype'); /* Format untuk .otf */
        }

        .welcome-hum {
            font-family: 'Knight Warrior', sans-serif; /* Gunakan font sesuai dengan nama yang ditentukan di @font-face */
        }

   /* Untuk Chrome, Safari, dan Browser Lainnya */
body {
  scrollbar-width: thin;
}

body::-webkit-scrollbar {
  width: 8px; /* Lebar scrollbar */
}

body::-webkit-scrollbar-thumb {
  background-color: #632a1d; /* Warna thumb scrollbar */
}

body::-webkit-scrollbar-track {
  background-color: #f5f5f5; /* Warna track scrollbar */
}

    </style>
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php?page=home">
          <span>
          HUMPEDA'S GAME
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item <?= $page === "home" ? 'active' : '' ?>">
              <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?=  $page == "profile" ? 'active' : '' ?>">
              <a class="nav-link" href="index.php?page=profile">
                Profile
              </a>
            </li>
            <li class="nav-item <?php echo $page == "product" || $page == "allproduct" ? 'active' : '' ?>">
              <a class="nav-link" href="index.php?page=product">
                Product
              </a>
            </li>
            <li class="nav-item <?php echo $page == "contact" ? 'active' : '' ?>">
              <a class="nav-link" href="index.php?page=contact">
                Contact
              </a>
            </li>
          </ul>
          <div class="user_option">
            <a href="login/index.html">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <?php
      
        if($page == "home") {
          include "halaman/jumbotron.html";
        }
     
    ?>
  </div>
  <!-- end hero area -->

  
  <?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "halaman/home.php";
				break;
			case 'product':
				include "halaman/produk.php";
				break;
			case 'allproduct':
				include "halaman/all-product.php";
				break;
			case 'profile':
				include "halaman/profile.html";
				break;		
			case 'contact':
				include "halaman/contact.html";
				break;		
			case 'login';
				include "login/login.php";
				break;
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "halaman/home.php";
	}
 
	 ?>
  

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        
        <a href="https://instagram.com/raanggara73">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
            Tempat jual & beli akun Game, Humpeda's game menyediakan berbagai layanan seperti boosting, pemasangan bid, jual item's, skin dan lain-lain.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="https://wa.me/6285156046571">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+62 85156046571</span>
              </a>
              <a href="mailto:raisan.anggara@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> raisan.anggara@gmail.com</span>
              </a>
              <audio autoplay controls loop>
				<source src="music/music.mp3" type="audio/mpeg">
				Browsermu tidak mendukung tag audio, upgrade donk!
			  </audio>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
        Copyright &copy; 2024 - HUMPEDA'S GAME by Raisan Anggara Putra
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var audio = document.getElementById('audio-player');
    audio.play();
  });
</script>
</body>

</html>