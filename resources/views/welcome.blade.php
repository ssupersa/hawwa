<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Landing Page</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('start/img/favicon.png')}}" rel="icon">
  <link href="{{asset('start/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('start/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('start/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('start/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('start/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('start/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('start/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{asset('start/img/logo.png')}}" alt="">
        <h1 class="sitename">Hawwa Al-Hasanah</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#beranda" class="active">Beranda</a></li>
          <li><a href="#tentang">Tentang Kami</a></li>
          <li class="dropdown"><a href="#aktivitas"><span>Aktivitas</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
              <li><a href="#materi">Materi Kajian</a></li>
              <li><a href="#jadwal">Jadwal Kajian</a></li>
              <li><a href="#diskusi">Diskusi</a></li>
              <li><a href="#feedback">Feedback</a></li>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="login">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- BERANDA -->
    <section id="beranda" class="hero section">
      <div class="hero-bg">
        <img src="{{asset('start/img/hero-bg-light.webp')}}" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Hawwa<span>Edu</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">
            Kajian Al-Qur’an dalam Genggaman!<br>
            Belajar lebih fleksibel dengan materi terstruktur dan komunitas aktif.</p>

          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <!-- <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300"> -->
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- TENTANG-->
    <section id="tentang" class="about section">
            <div class="container">
                <!-- Bagian Tentang Kami -->
                <div class="row align-items-start mb-5">
                <!-- Gambar -->
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="hawwa.jpg" class="img-fluid rounded-circle" alt="Tentang Kami">

                </div>

                <!-- Teks Tentang Kami -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-center">Tentang Kami</h3>
                    <p class="fst-italic small" style="text-align: justify;">
                    <h5>Hawwa Al-Hasanah adalah komunitas keagamaan di wilayah Cikijing yang berfokus pada pembelajaran ilmu Tafsir Al-Qur’an. Bernaung di bawah Masjid Al-Hasanah, komunitas ini terdiri dari pemuda, pemudi, dan ibu-ibu masjid yang rutin mengadakan kajian mingguan, pengajian tematik, dan diskusi keagamaan. Selain itu, komunitas juga aktif dalam kegiatan sosial seperti penyaluran zakat, infak, sedekah, dan qurban untuk membantu sesama.
                    </p></h5>
                </div>
                </div>

                <!-- Bagian Visi dan Misi -->
                <section class="py-5">
                <div class="container">
                  <div class="row justify-content-center g-4">

                    <!-- Visi -->
                    <div class="col-md-4">
                      <div class="p-4 border rounded-4 shadow-sm bg-light h-100">
                        <h4 class="text-center fw-bold">Visi</h4 >
                        <p class="fst-italic text-justify mb-0">
                          Mewujudkan komunitas yang berilmu, berakhlak, dan berdaya melalui pembelajaran Tafsir Al-Qur’an.
                        </p>
                      </div>
                    </div>

                    <!-- Misi -->
                    <div class="col-md-4">
                      <div class="p-4 border rounded-4 shadow-sm bg-light h-100">
                        <h4 class="text-center fw-bold">Misi</h4>
                        <ul class="fst-italic text-justify mb-0">
                          <li>Menyelenggarakan pembelajaran keislaman berfokus pada ilmu Tafsir Al-Qur’an secara rutin dan terstruktur.</li>
                          <li>Memanfaatkan teknologi digital untuk mendokumentasikan, menyebarluaskan, dan memudahkan akses kajian keagamaan.</li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </section>



            </div>
    </section>

    <!-- AKTIVITAS -->
    <section id="aktivitas" class="services section light-background">

      <!-- AKTIVITAS -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Aktivitas</h2>
      </div><!-- End Section Title -->

            <div class="container">
            <div class="row g-4"> <!-- bisa ganti g-5 kalau mau jarak antar kotaknya lebih jauh -->

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div id="materi" class="service-item item-cyan position-relative">
                    <i class="bi bi-activity icon"></i>
                    <div>
                    <h3>Materi Kajian</h3>
                    <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div id="jadwal" class="service-item item-orange position-relative">
                    <i class="bi bi-broadcast icon"></i>
                    <div>
                    <h3>Jadwal Kajian</h3>
                    <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div id="diskusi" class="service-item item-red position-relative">
                    <i class="bi bi-bounding-box-circles icon"></i>
                    <div>
                    <h3>Forum Diskusi</h3>
                    <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div id="feedback" class="service-item item-red position-relative">
                    <i class="bi bi-bounding-box-circles icon"></i>
                    <div>
                    <h3>Feedback</h3>
                    <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                </div>

            </div>
            </div>
        </div>

      </div>

    </section><!-- /Services Section -->
  </main>

  <!-- FOOTER -->
  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Hawwa Al-Hasanah </span>
          </a>
          <div class="footer-contact pt-3 d-flex gap-3 flex-wrap">
          <p class="mb-0">Mushola Al-Hasanah, pinggir rumah kayu Bali</p>
          <p class="mb-0"><strong>Phone:</strong> <span>085520741445</span></p>
          <p class="mb-0"><strong>Email:</strong> <span>@hawwa.alhasanah01@gmail.com</span></p>          
        </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('start/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('start/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('start/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('start/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('start/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('start/js/main.js')}}"></script>

</body>

</html>