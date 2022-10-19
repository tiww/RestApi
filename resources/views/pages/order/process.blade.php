@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    {{--  card  --}}
      <div class="container-fluid">
          <div class="header-body">
              <!-- Card stats -->
              <div class="row">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                  <div class="col-xl-6 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Pengiriman</h5>
                                      <span class="h2 font-weight-bold mb-0">
                                            @if($order->tracking_msg == NULL)
                                                No Status update
                                            @else
                                                {{$order->tracking_msg}}
                                            @endif
                                      </span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                          <i class="ni ni-delivery-fast"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Pembayaran</h5>
                                      <span class="h2 font-weight-bold mb-0">
                                        @if($order->payment_status == "1")

                                        Pembayaran Diterima
                
                                        @elseif($order->payment_status == "2")
                
                                        Pembayaran Dibatalkan
                
                                        @endif
                                      </span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                          <i class="ni ni-money-coins"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Status Pengiriman</h3>
                        <hr>
                        {{--  @if($order->order_status == "1")

                            {{$order->tracking_msg}}

                        @elseif($order->order_status == "2")

                            {{$order->tracking_msg}}

                        @else  --}}
                            <form action="{{url('order/update')}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="input-group col-sm-12">
                                    <select name="tracking_msg" class="form-select form-control" id="inputGroupSelect02">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Sedang Diproses">Sedang Diproses</option>
                                        <option value="Pesanan Dibatalkan">Pesanan Dibatalkan</option>
                                    </select>
                                </div>
                                <div class="input-group-append col-4 my-3">
                                    <button type="submit" class="btn btn-md btn-primary" for="inputGroupSelect02">Update</button>
                                </div>
                            </form>
                        {{--  @endif  --}}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Status Pembayaran</h3>
                        <hr>
                            <form action="{{url('order/update')}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="input-group col-sm-12">
                                    <select name="tracking_msg" class="form-select form-control" id="inputGroupSelect02">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Diterima">Pembayaran Diterima</option>
                                        <option value="Ditolak">Pembayaran Dibatalkan</option>
                                    </select>
                                </div>
                                <div class="input-group-append col-4 my-3">
                                    <button type="submit" class="btn btn-md btn-primary" for="inputGroupSelect02" >Update</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection