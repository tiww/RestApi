@extends('layouts.app')

@section('content')
{{--  ini add untuk user  --}}
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
        <div class="container-fluid mt--6">
            <form action="{{ url('#') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">{{ ($title) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            {{--  <div class="form-floating mb-3">
                                <select class="form-select" name="category_id">
                                    <label for="floatingInput">Category</label>
                                    <option selected>Select A category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                  </select>
                            </div>  --}}
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            {{--  <div class="form-floating mb-3">
                                <label for="floatingPassword">Image</label>
                                <input type="file" name="images_t" class="form-control">
                            </div>  --}}
                            <div class="form-floating mb-3">
                                <label for="floatingInput">E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="abcd@mail.com">
                            </div>
                            {{--  <div class="form-floating mb-3">
                                <label for="floatingInput">Description</label>
                                <input type="text" name="description_t" class="form-control">
                            </div>  --}}
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