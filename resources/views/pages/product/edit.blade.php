@extends('layouts.app')

@section('content')
{{--  ini add untuk product  --}}
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
        <div class="container-fluid mt--6">
            <form action="{{ url('update_product/'.$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Edit Product</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Category</label>
                                <select class="form-select form-control" name="category_id">
                                    @foreach ( $categories as $category)
                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Name</label>
                                <input type="text" name="name_p" class="form-control" value="{{ old('name_p') }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingPassword">Image</label>
                                <input type="file" name="images_p" class="form-control" value="{{ old('images_p') }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Price</label>
                                <input type="text" name="price_p" class="form-control" value="{{ old('price_p') }}" placeholder="ex: 30000">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Description</label>
                                <input type="text" name="desc_p" class="form-control" value="{{ old('desc_p') }}">
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