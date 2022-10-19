@extends('front.main')
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>{{ $category->category_name }}</li>
        </ol>
        <h2>{{ $category->category_name }}</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Cards Section ======= -->
    <section id="cards" class="cards">
      <div class="container">
        <div class="row">
          @foreach ($treatment as $tr)
          <div class="col-md-4 my-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('assets/img/treatment/'.$tr->images_t) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $tr->name_t }}</h5>
                <span><strong>Rp. {{ $tr->price_t }}</strong></span>
                <p class="card-text">{{ $tr->description_t }}</p>
                <a href="{{ url('details-treatment/'.$tr->treatment_id) }}" class="btn-get-started">Order Now</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection