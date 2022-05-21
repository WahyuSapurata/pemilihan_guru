<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <title><?= $title  ?></title>
  <link rel="icon" href="<?= base_url() ?>/img/logo.png">

  <!-- Bootstr<ap CSS File -->
  <link href="<?= base_url() ?>/depan/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Mochiy+Pop+P+One&family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/fontawesome-free/css/all.min.css">
  <link href="<?= base_url() ?>/depan/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/depan/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/depan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/depan/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- slick -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <!-- Main Stylesheet File -->
  <link href="<?= base_url() ?>/depan/css/style.css" rel="stylesheet">

  <!-- animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>

<body>

  <!-- <audio hidden autoplay loop>
    <source src="<?= base_url() ?>/audio.mp3" type="audio/mp3">
  </audio> -->

  <!-- <audio src="<?= base_url() ?>/audio.mp3" autoplay="autoplay" hidden="hidden"></audio> -->

  <section class=" container-section shadow" style="background-color: rgba(0, 168, 89, 0.1);">
    <div class="content-0">
      <span class="ml-2 mr-0 text-white coba">WAKTU :</span>
      <span class="mr-2 ml-0 text-white coba" id="jam"></span>
    </div>

    <div class="content-1 d-inline-flex">
      <marquee class="marque text-dark">
        <img class="img-marque" src="<?= base_url() ?>/img/logo.png">
        YAYASAN PENDIDIKAN ARIFAH
        <img class="img-marque" src="<?= base_url() ?>/img/logo.png">
      </marquee>
    </div>

    <div class="content-2 position-relative float-right">
      <span class="m-2 text-white" id="tanggalwaktu"></span>
    </div>
  </section>
  <section class="s-jumbotron">
    <!--==========================
    Header
    ============================-->
    <header id="header" style="height: 100%;" class="fixed-top">
      <div class="container-fluid">
        <div id="logo" class="pull-left clock">
          <a class="h5co"><img src="<?= base_url() ?>/img/logo.png" width="100px" height="100px"> </a>
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?= base_url() ?>">BERANDA</a></li>
            <li><a href="<?= base_url('login_admin/index') ?>">LOGIN ADMIN</a></li>
            <li><a href="<?= base_url('login_ketua/index') ?>">LOGIN KETUA YAYASAN</a></li>
          </ul>
          <hr class="garis">
        </nav><!-- #nav-menu-container -->
      </div>

      <div class="carousel-content">

        <h1 class="clock text-selamat">SELAMAT DATANG</h1>
        <h1 class="lead"></h1>

      </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
    ============================-->
    <section id="intro" style="height: auto;">
      <div class="slider">
        <div class="background-video">
          <img src="<?= base_url() ?>/img/gambar1.jpg" class="video-fluid d-inline-block" alt="">
        </div>
        <div class="background-video">
          <img src="<?= base_url() ?>/img/gambar2.jpg" class="video-fluid d-inline-block" alt="">
        </div>
        <div class="background-video">
          <img src="<?= base_url() ?>/img/gambar3.jpeg" class="video-fluid d-inline-block" alt="">
        </div>
      </div>
    </section><!-- #intro -->
  </section>

  <!--==========================
    Footer
    ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>YAYASAN PENDIDIKAN ARIFAH</strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- #footer -->


  <!-- JavaScript Libraries -->
  <script src="<?= base_url() ?>/depan/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/easing/easing.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/superfish/hoverIntent.js"></script>
  <script src="<?= base_url() ?>/depan/lib/superfish/superfish.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/wow/wow.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/waypoints/waypoints.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/counterup/counterup.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?= base_url() ?>/depan/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?= base_url() ?>/depan/contactform/contactform.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

  <!-- Template Main Javascript File -->
  <script src="<?= base_url() ?>/depan/js/main.js"></script>

  <!-- slick -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        arrows: false,
      });
    });
  </script>

  <script>
    var tw = new Date();
    if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
    else(a = tw.getTime());
    tw.setTime(a);
    var tahun = tw.getFullYear();
    var hari = tw.getDay();
    var bulan = tw.getMonth();
    var tanggal = tw.getDate();
    var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
    var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;

    const marque = document.querySelector('.marque');
    marque.addEventListener('mouseenter', (event) => {
      event.target.stop();
    });
    marque.addEventListener('mouseleave', (event) => {
      event.target.start();
    })
  </script>

  <script type="text/javascript">
    window.onload = function() {
      jam();
    }

    function jam() {
      var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h + ' : ' + m + ' : ' + s;

      setTimeout('jam()', 1000);
    }

    function set(e) {
      e = e < 10 ? '0' + e : e;
      return e;
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
  <script>
    gsap.registerPlugin(TextPlugin);
    gsap.to('.lead', {
      duration: 5,
      delay: 1,
      text: 'DI APLIAKSI PEMILIHAN GURU TETAP YAYASAN UNGGULAN ARIFAH'
    });
    gsap.from('.jumbotron img', {
      duration: 1,
      rotateY: 360,
      opacity: 0
    });
    gsap.from('.table', {
      duration: 1.5,
      y: '-100%',
      opacity: 0,
      ease: 'bounce'
    });
    gsap.from('.clock', {
      duration: 2,
      y: '-100%',
      opacity: 0,
      ease: 'bounce'
    });
    gsap.from('.display-4', {
      duration: 1,
      x: -50,
      opacity: 0,
      ease: 'back'
    });
  </script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    const galeryImage = document.querySelectorAll('.galery-img');

    galeryImage.forEach((img, i) => {
      img.dataset.aos = 'fade-down';
      img.dataset.aosDelay = i * 100;
      img.dataset.aosDuration = 1000;
    });

    AOS.init({
      once: true,
    });
  </script>

</body>

</html>