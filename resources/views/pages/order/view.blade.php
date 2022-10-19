@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    {{--  Ini bg tosca  --}}
    <div class="container-fluid">
        <div class="header-body">
            {{--  <h3 class="mb-3">Detail Order</h3>  --}}
            <!-- Card stats -->
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Nomor Pesanan</h5>
                                    <span class="h2 font-weight-bold mb-2">{{$order->tracking_no}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Status Pembayaran</h5>
                                    <span>
                                        @if($order->order_status == NULL)
                                        <span class="h2 font-weight-bold mb-0">Belum Bayar</span>
                                        @else($order->order_status == '1')
                                        <span class="h2 font-weight-bold mb-0">Sudah Bayar</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Bukti Pembayaran</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        <a href="{{ asset('assets/img/invoice/' .$order->invoice) }}">{{ $order->invoice }}</a>
                                    </span>
                                    {{--  <img width="200px" height="200px" src="{{ asset('assets/img/invoice/' .$order->invoice) }}" alt="{{ $order->invoice }}">  --}}
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
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Detail Order</h3>
            </div>
            <!-- Order table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tgl. Order</th>
                    <th scope="col">Nama Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @php $total="0"; @endphp
                    @foreach ($order->orderitem as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                    <td>{{ $item->treatment->name_t }}</td>
                    <td>{{$item->quantity}}</td>
                    <td>Rp. {{$item->price}}</td>
                    <td>Rp. {{$item->price * $item->quantity}}</td>
                </tr>
                    @php $total = $total + $item->price * $item->quantity @endphp
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><b>Grand Total</b></td>
                        <td><b>Rp. {{ $total }}</b></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      {{--  Tabel User  --}}
      <div class="row">
        <div class="col">
            <div class="card mt-4">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Users Data</h3>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor HP</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <tr>
                        <th scope="row">{{$order->user->name}}</th>
                        <td>{{$order->user->email}}</td>
                        <td>{{$order->user->address}}</td>
                        <td>{{$order->user->phone_n}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>
    <!-- Footer -->
    @include('layouts.footers.auth')
@endsection