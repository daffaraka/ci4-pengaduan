 <?= $this->extend('home/home_layout'); ?>
 <?= $this->section('content'); ?>

 <!-- Hero Section -->
 <section id="hero" class="hero section">

     <div class="container">
         <div class="row gy-4">
             <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                 <h1>Sistem Pengaduan Masyarakat</h1>
                 <p>Mengadukan masalah yang Anda hadapi dan dapatkan bantuan dari kami</p>
                 <div class="d-flex">
                     <a href="beranda/buat-pengaduan" class="btn-get-started">Buat Pengaduan</a>
                 </div>
             </div>
             <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                 <img src="<?= base_url('home/assets/img/hero-img.png') ?>" class="img-fluid animated" alt="">
             </div>
         </div>
     </div>

 </section><!-- /Hero Section -->

 <!-- Featured Services Section -->


 <!-- About Section -->
 <section id="about" class="about section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
         <span>About Us<br></span>
         <h2>About</h2>
         <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
     </div><!-- End Section Title -->

     <div class="container">

         <div class="row gy-4">
             <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                 <img src="assets/img/about.png" class="img-fluid" alt="">
                 <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
             </div>
             <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                 <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                 <p class="fst-italic">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                     magna aliqua.
                 </p>
                 <ul>
                     <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                     <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                     <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                 </ul>
                 <p>
                     Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                     velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                 </p>
             </div>
         </div>

     </div>

 </section><!-- /About Section -->

 <!-- Stats Section -->
 <section id="stats" class="stats section">

     <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row gy-4">

             <div class="col-lg-3 col-md-6">
                 <div class="stats-item text-center w-100 h-100">
                     <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                     <p>Clients</p>
                 </div>
             </div><!-- End Stats Item -->

             <div class="col-lg-3 col-md-6">
                 <div class="stats-item text-center w-100 h-100">
                     <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                     <p>Projects</p>
                 </div>
             </div><!-- End Stats Item -->

             <div class="col-lg-3 col-md-6">
                 <div class="stats-item text-center w-100 h-100">
                     <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                     <p>Hours Of Support</p>
                 </div>
             </div><!-- End Stats Item -->

             <div class="col-lg-3 col-md-6">
                 <div class="stats-item text-center w-100 h-100">
                     <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                     <p>Workers</p>
                 </div>
             </div><!-- End Stats Item -->

         </div>

     </div>

 </section><!-- /Stats Section -->



 <?= $this->endSection(); ?>