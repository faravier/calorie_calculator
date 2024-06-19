<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Calcounter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     
   <a href="http://127.0.0.1:8000/" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#appointment">Kalkulator</a></li>
          <li><a href="http://127.0.0.1:8000/weekly-progress">Progres Mingguan</a></li>
          <li><a class="nav-link scrollto" href="#recommendations">Rekomendasi dan Saran</a></li>
          <li><a class="nav-link scrollto" href="#rate-us">Nilai Kami</a></li>          
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Selamat Datang di <span>Calcounter!</span></h2>
            <p>Hitung kalori Anda dan dapatkan rekomendasi sesuai dengan antropometri dan rata-rata kalori mingguan Anda! Juga lacak catatan asupan kalori Anda!</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Calculator Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Ingin tahu berapa banyak asupan kalori anda hari ini?</h3>
          <p>Melacak asupan kalori Anda sangat penting untuk menjaga gaya hidup sehat. Gunakan kalkulator kami yang mudah digunakan untuk mengetahui kebutuhan kalori harian Anda. Untuk pelacakan yang akurat dan rekomendasi yang dipersonalisasi, pastikan untuk mengisi formulir ini setiap hari. Mulailah perjalanan Anda menuju kesehatan yang lebih baik hari ini!</p>
          <a class="cta-btn scrollto" href="#appointment">Calculate Now</a>
        </div>

      </div>
    </section><!-- End Calculator Section -->

    <!-- ======= Calculator Form Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kalkulator Kalori</h2>
          <p>Untuk mendapatkan hasil yang paling akurat dan rekomendasi yang dipersonalisasi, harap isi formulir ini setiap hari. Sebaiknya selesaikan setelah makan terakhir atau berolahraga pada hari itu untuk memastikan semua aktivitas dan asupan makanan Anda tercatat. Pelacakan yang konsisten akan membantu Anda mencapai tujuan kesehatan dan kebugaran Anda dengan lebih efektif.</p>
        </div>

        <form action="{{ route('calculateresult') }}" method="post"  class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        @csrf 
        <div class="row">
            <div class="col-md-4 form-group">
              <input type="number" name="age" class="form-control" placeholder="Your Age" value="24" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="height" placeholder="Your Height in centimeters" value="165" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="weight" placeholder="Your Weight in kilograms" value="76" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="gender" id="gender" class="form-select">
                <option value="">Pilih jenis kelamin</option>
                <option value="male" selected>Pria</option>
                <option value="female">Wanita</option>
              </select>
            </div>
            

          <div class="form-group mt-3">
            <label for="food">Makanan/Minuman yang anda konsumsi hari ini:</label>
                <textarea class="form-control" name="food" rows="4" required></textarea>
          <div class="my-3">

          <div class="form-group mt-3">
          <label for="activities">Aktivitas-aktivitas anda hari ini:</label>
                <textarea class="form-control" name="activities" rows="4" required></textarea>
            </div>

            <div class="loading">Loading</div>
            <div class="error-message"></div>

            <div class="sent-message"></div>
            <div class="calorie-result"></div>
          </div>
          <div class="text-center"><button type="submit">Kirim</button></div>
        </form>

        @if (isset($calculatedResults))
                <div class="mt-5">
                    <h2>Calculated Results:</h2>
                        {!! $calculatedResults !!}
                </div>
                @endif

      </div>
    </section><!-- End Calculator Form Section -->

    <!-- ======= Recommendation Section ======= -->
    <section id="recommendations" class="departments">
      <div class="container" data-aos="fade-up">
        <div></div>
        <div class="section-title">
          <h2>Rekomendasi</h2>
          <p>Berdasarkan entri harian Anda, kami memberikan rekomendasi yang dipersonalisasi untuk membantu Anda mencapai tujuan kesehatan dan kebugaran Anda. Mencatat makanan dan aktivitas Anda secara konsisten memungkinkan kami memberikan saran yang paling akurat dan efektif yang disesuaikan dengan kebutuhan unik Anda.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                  <h4>Rata-rata kalori</h4>
                  <p>Lihat asupan kalori harian rata-rata Anda dan lihat apakah Anda berada di jalur yang benar.</p>
                </a>
              </li>
             
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                  <h4>Saran Lanjutan</h4>
                  <p>Dapatkan tips dan saran tambahan untuk meningkatkan diet dan rutinitas olahraga Anda.</p>
                </a>
              </li>
             
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <h3>Rata-rata kalori anda</h3>
                <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
               <p> Rata-rata kalori anda adalah {{ $recommendData->averageTotalCalories }}. {{ $recommendData->recommendation }}</p>
              </div>
              <div class="tab-pane" id="tab-2">
                <h3>Saran Lanjutan</h3>
                <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                <p>{{ $recommendData->additionalRecommendation }}</p>
              </div>
             
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Recommendation Section -->

    <!-- Rate Us Section -->
    <section id="rate-us" class="feedback">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Nilai Kami!</h2>
        <p>Tolong nilai kami sebagai bahan evaluasi kami untuk meningkatkan pelayanan.</p>
      </div>

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
        <form action="{{ route('submit_rating') }}" method="post" role="form" class="php-rating-form">
            @csrf
            <div class="form-group">
              <label for="rating">Nilai pengalaman keseluruhan anda:</label>
              <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" required>
            </div>
            <div class="form-group">
              <label for="comment">Komentar tambahan:</label>
              <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
            </div>
            <div class="text-center mt-2"><button type="submit">Kirim</button></div>
          </form>
        </div>
        <div class="loading"></div>
        <div class="error-message"></div>
      </div>
    </div>

    @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

  </section>
  <!-- End Rate Us Section -->
  
    
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/php-email-form/validateRating.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>