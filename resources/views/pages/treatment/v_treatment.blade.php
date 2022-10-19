@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">List Treatment</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('add_treatment') }}" class="btn btn-sm btn-primary">Add Treatment</a>
                                {{--  <a href="{{ url('download-pdf') }}" class="btn btn-sm btn-primary" target="_blank">Report Treatment</a>  --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12"></div>
    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col" style="text-align: center">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treatment as $item)
                                <tr>
                                    <td>{{ $item->treatment_id }}</td>
                                    <td>{{ $item->name_t }}</td>
                                    <td>{{ $item->categories->category_name }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/treatment/' .$item->images_t) }}" alt="">
                                    </td>
                                    <td>Rp. {{ $item->price_t }}</td>
                                    <td>{{ $item->description_t }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ url('edit_treatment/'.$item->treatment_id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ url('delete_treatment/'.$item->treatment_id) }}">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush