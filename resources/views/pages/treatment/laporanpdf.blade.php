<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h3 class="mb-0">List Treatment</h3>    
    <div class="col-12"></div>
        <table class="table" style="border-collapse: ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Categories</th>
                    {{--  <th scope="col">Image</th>  --}}
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    {{--  <th scope="col"></th>  --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($treatment as $item)
                <tr>
                    <td>{{ $item->treatment_id }}</td>
                    <td>{{ $item->name_t }}</td>
                    <td>{{ $item->categories->category_name }}</td>
                    {{--  <td>
                        <img src="{{ asset('assets/img/treatment/' .$item->images_t) }}" alt="">
                    </td>  --}}
                    <td>{{ $item->price_t }}</td>
                    <td>{{ $item->description_t }}</td>
                    {{--  <td>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{ url('edit_treatment/'.$item->treatment_id) }}">Edit</a>
                                <a class="dropdown-item" href="{{ url('delete_treatment/'.$item->treatment_id) }}">Delete</a>
                        </div>
                    </td>  --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    