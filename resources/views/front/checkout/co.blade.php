@extends('front.main')
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Check-out</li>
        </ol>
        <h2>Check-out</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="co-page" id="co-page">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-6">
             <h4 class="my-2">Billing Address</h4>
             <form action="{{ url ('place_order')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field()}}
              <div class="col my-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name}}" placeholder="Name" disabled>
              </div>
              <div class="col my-3">
                <label class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email}}" placeholder="Email" disabled>
              </div>
              <div class="col my-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address}}" placeholder="Address" required>
              </div>
              <div class="col my-3">
                <label class="form-label">Phone Number</label>
                <p><input type="text" name="phone_n" class="form-control" value="{{ Auth::user()->phone_n}}" placeholder="Phone" required></p>
              </div>
              <div class="col my-3">
                <label class="form-label">Payment Confirmation</label>
                <p><input type="file" name="invoice" class="form-control" required></p>
              </div>

              <div class="order_button pt-3">
                <button class="btn btn-primary my-2" name="place_order" type="submit">Proceed to Order</button>
              </div>
            </form>
          </div>
          <div class="col-md-4" >
            @if(isset($cart_data))
              @if(Cookie::get('shopping_cart'))
                @php $total="0" @endphp
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Your cart</span>
                  <span class="badge bg-primary rounded-pill"></span>
                </h4>
                <ul class="list-group mb-3">
                  @foreach ($cart_data as $data)
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">{{ $data['item_name'] }}</h6>
                      <small class="text-muted">Qty : {{$data['item_quantity']}}</small>
                    </div>
                    <span class="text-muted">Rp. {{ number_format($data['item_price'], 0) }}</span>
                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                  </li>
                  @endforeach
                  <li class="list-group-item d-flex justify-content-between">
                    <span><b>Total (IDR)</b></span>
                    <strong>{{ number_format($total) }}</strong>
                  </li>
                </ul>
                @endif
                @else
                <div class="container">
                  <div class="row">
                      <div class="col-lg-8 offset-lg-2 text-center">
                          <div class="error-text">
                              <i class="far fa-sad-cry"></i>
                              <h1>Oops! Sorry no Items.</h1>
                              <p>you don't have any items to checkout.</p>
                              <a href="{{'/'.'#category'}}" class="boxed-btn">Back to Shopping</a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
      @endif
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection