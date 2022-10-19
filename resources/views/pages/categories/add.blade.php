@extends('layouts.app')

@section('content')
{{--  ini add untuk kategori  --}}
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
        <div class="container-fluid mt--6">
            <form action="{{ url('update_category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">{{ $title; }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Name</label>
                                <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}">
                            </div>
                            {{--  <div class="form-floating">
                                <label for="floatingPassword">Image</label>
                                <input type="file" name="category_images" class="form-control">
                            </div>  --}}
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Description</label>
                                <input type="text" name="category_desc" class="form-control" value="{{ old('category_desc') }}">
                            </div>
                        </div>
                        <div class="col-4 my-3">
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </div>
                        
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">  
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            @include('layouts.footers.auth')
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush