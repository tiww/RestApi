@extends('front.main')
@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>{{ $title; }}</li>
        </ol>
        <h2>{{ $title; }} Details</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
      
        <div class="row gy-4 product_data">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                {{--  <div class="swiper-slide">  --}}
                  <img src="{{ asset('assets/img/treatment/'.$treatment->images_t) }}" alt="">
                {{--  </div>  --}}
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>{{ $treatment->name_t }}</h3>
              <ul>
                {{--  <li><strong>Category</strong>: Web design</li>  --}}
                <li><strong>Price :</strong> Rp. {{ $treatment->price_t }}</li>
                  <input type="hidden" class="product_id" value="{{ $treatment->treatment_id }}">
                  <input type="number" class="qty-input mt-3" value="1">
                  <button type="button" class="add-to-cart-btn btn-get-started">Add to Cart</button>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Details</h2>
              <p>
                {{ $treatment->description_t }}
              </p>
            </div>
           
          </div>
        </div>
        
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  @endsection