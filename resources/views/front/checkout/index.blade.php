@extends('front.main')
@section('content')

  <div class="container">
      <div class="row g-5">
          <div class="col-md-7 col-lg-8">
              <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Billing Address
              </button>
              </h5>
              <div class="card-body">
                <div class="billing-address-form">
                  <br><br><br><br><br>
                  <form action="{{ url ('place_order')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <input type="text" name="name" value="{{ Auth::user()->name}}" placeholder="Name">
                    <input type="text" name="email" value="{{ Auth::user()->email}}" placeholder="Email">
                    <input type="text" name="address" value="{{ Auth::user()->address}}" placeholder="Address">
                    <input type="text" name="phone_n" value="{{ Auth::user()->phone_n}}" placeholder="Phone">
                    <div class="order_button pt-3">
                      <button class="btn btn-md btn-black-default-hover" name="place_order" type="submit">Proceed to Order</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-5 col-lg-4">
        @if(isset($cart_data))
            @if(Cookie::get('shopping_cart'))
                @php $total="0" @endphp
                <div class="order-details-wrap">
                  <table class="order-details">
                      <thead>
                          <tr>
                              <th>Your order Details</th>
                              <th>Price</th>
                          </tr>
                      </thead>
                      <tbody class="order-details-body">
                          <tr>
                              <td>Your order Details</td>
                              <td>Total</td>
                          </tr>
                          @foreach ($cart_data as $data)
                              <tr>
                                  <td> {{ $data['item_name'] }} <strong> × {{$data['item_quantity']}}</strong></td>
                                  <td> {{ number_format($data['item_price'], 0) }}</td>
                                  @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                              </tr>
                          @endforeach
                      </tbody>
                      <tbody class="checkout-details">
                          <tr>
                              <td>Subtotal</td>
                              <td>{{ number_format($total) }}</td>
                          </tr>
                          <tr>
                              <td>Total</td>
                              <td>{{ number_format($total) }}</td>
                          </tr>
                      </tbody>
                    </table>
              @endif
              @else
                <div class="full-height-section error-section">
                    <div class="full-height-tablecell">
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
                </div>
                @endif
                </div>    
              </div>
          </div>
      </div>
  </div>
@endsection