@extends('layouts.app')

@section('content')
{{--  ini add untuk treatment  --}}
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
        <div class="container-fluid mt--6">
            <form action="{{ url('update_treatment/'.$treatment->treatment_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Edit Treatment</h3>
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
                                <input type="text" name="name_t" class="form-control" value="{{ old('name_t') }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingPassword">Image</label>
                                <input type="file" name="images_t" class="form-control" value="{{ old('images_t') }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Price</label>
                                <input type="text" name="price_t" class="form-control" value="{{ old('price_t') }}" placeholder="ex: 30000">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Description</label>
                                <input type="text" name="description_t" class="form-control" value="{{ old('description_t') }}">
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