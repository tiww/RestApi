@extends('front.main')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(frontAssets/img/slide/shoe-1.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Project B</span></h2>
            <p class="animate__animated animate__fadeInUp">Shoescare dan Custom di Samarinda yang telah beroperasi sejak tahun 2019, melayani cuci sepatu, custom sepatu, serta perbaikan sepatu.</p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(frontAssets/img/slide/shoe-2.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Cleaning Treatment</h2>
            <p class="animate__animated animate__fadeInUp">Treatment Cleaning merupakan salah satu jasa yang kami tawarkan. Membersihkan bahan atau material sepatu yang kotor serta melakukan perawatan terhadap sepatu yang disesuaikan dengan jenis bahan atau material.</p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(frontAssets/img/slide/shoe-3.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Repair Treatment & Custom</h2>
            <p class="animate__animated animate__fadeInUp">Treatment untuk memperbaiki kerusakan yang ada pada sepatu kesayangan anda, sehingga sepatu masih bisa digunakan kembali. Custom salah satu jasa yang dimana menambahkan desain yang semula tidak ada pada sepatu menjadi nyata.
            </p>
          </div>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <p>About Us</p>
      </div>
    
      <div class="row content">
        <div class="col-lg-6">
          <p>
            <strong>Project B</strong> merupakan salah satu usaha pada bidang jasa cuci dan perawatan sepatu yang ada di Samarinda. Project B telah beroperasi sejak 2019 yang dimana telah banyak dipercaya oleh customer untuk mencuci dan merawat sepatu.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Kami melayani cuci <strong>Express</strong></li>
            <li><i class="ri-check-double-line"></i> Melayani Custom Sepatu dan Jaket Denim</li>
            <li><i class="ri-check-double-line"></i> Menjual beberapa produk untuk merawat sepatu seperti Cleaner, Parfume, Shoe Shield</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Tak hanya memcuci sepatu, kami juga membuka pelayanan untuk perbaikan sepatu seperti jahit sol, lem sol, pewarnaan ulang pada sepatu sehingga sepatu anda bisa kembali nyaman digunakan.
          </p>
          {{--  <a href="#" class="btn-learn-more">Learn More</a>  --}}
        </div>
      </div>
    
    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
        <p>Check our Services</p>
      </div>
  
      <div class="row">
        @foreach ($category as $item)
          
        <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="{{ 'cards/' .$item->id }}">{{ $item->category_name }}</a></h4>
            <p>{{ $item->category_desc }}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Product Section ======= -->
  <section id="product" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Product</h2>
        <p>Check our Product</p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 justify-content-center">
          <ul id="portfolio-flters">
          </ul>
        </div>
      </div>
  
      
      @foreach ($product as $item)
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 portfolio-item">
          <img src="{{ asset('assets/img/product/'.$item->images_p) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{ $item->name_p }}</h4>
            <p>by Project B</p>
            <a href="{{ asset('assets/img/product/'.$item->images_p) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=""><i class="bx bx-plus"></i></a>
            {{--  <a href="{{ url('details-product/'.$item->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>  --}}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </div>

      <div class="row faq-item align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Berapa Lama Waktu Pengerjaan Sepatu ?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Waktu pengerjaan tergantung dengan treatment yang dilakukan. Untuk Deep Cleaning sendiri umumnya 2 - 3 hari pengerjaan.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Apakah Cara Mencuci Sepatu Yang Dilakukan Aman?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Aman, karena kami menyesuaikan pelayanan dengan masing-masing material sepatu yang ada. Seperti halnya sepatu kulit, setelah kami cuci maka akan kami rawat kembali bahan kulit tersebut agar kulit tidak berjamur atau kering.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Mengapa Setiap Treatment Mempunyai Harga Yang Berbeda?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Karena treatment disesuaikan dengan bentuk dan material sepatu, sehingga pelayanan yang diberikan juga tidak sembarangan.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Apakah Sepatu Yang Telah Dicuci Bisa Kembali Seperti Baru?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Treatment untuk cleaning atau cuci adalah perawatan sepatu untuk <strong>membersihkan</strong> material yang kotor, sehingga jika sepatu terkena noda yang sulit hilang maka sepatu tidak bisa kembali seperti baru hanya saja kembali dengan kondisi bersih.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

    </div>
  </section><!-- End Frequently Asked Questions Section -->

      <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>A. Wahab Syahranie Flyover Street, Kel. Air Hitam, Kec. Samarinda Ulu 75243</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>projectb258@gmail.com</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-box mt-4">
                <a href="https://wa.me/6282347009089">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p><strong> +6282 3470 09089 </strong></p>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

  <!-- Maps Section -->
  <div>
    <iframe class="maps" style="border:0; width: 100%; height: 350px;" data-aos="fade-up" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6829107453373!2d117.13623771432162!3d-0.47204893541197385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f225b450e8d%3A0xb6ce92d3c6c63ff6!2sAngkringan%20Bang%20Ben!5e0!3m2!1sid!2sid!4v1654248368475!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</main> <!-- End #main -->
@endsection