<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h4 class="mb">List Orders</h4>
    <div class="col-12"></div>
        <table class="table" style="border-collapse: ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Pesan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Tgl. Pesan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tracking_no }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->phone_n }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        @if($item->order_status == NULL)
                        <span class="status">Belum Bayar</span>
                        @else($item->order_status == '1')
                        <span class="status">Sudah Bayar</span>
                        @endif 
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
<br><br><br>
        <table class="table" style="border-collapse: ">
            <thead>
              <tr>
                <th scope="col">Tgl. Order</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody class="list">
                @php $total="0"; @endphp
                @foreach ($orderitem as $item)
            <tr>
                <td>{{$item->created_at->format('d-m-Y')}}</td>
                <td>{{ $item->treatment->name_t }}</td>
                <td>{{$item->quantity}}</td>
                <td>Rp. {{$item->price}}</td>
                <td>Rp. {{$item->price * $item->quantity}}</td>
            </tr>
                @php $total = $total + $item->price * $item->quantity @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><b>Grand Total</b></td>
                    <td><b>Rp. {{ $total }}</b></td>
                </tr>
            </tbody>
          </table>