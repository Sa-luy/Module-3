@extends('admin.main');
@section('content')
    <h1>
        List Category</h1>
    <div class="row">
        <div class="col">
            @can('create', \App\Models\Category::class)

            <a href="{{ route('category.create') }}" class="btn btn-primary ">Add</a>
            @endcan
        </div>
        <div class="col">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col">
            @if (Session::has('erors'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('erors') }}
                </p>
            @endif
        </div>
        <div class="col input-group">
            <span class="input-group-btn">
                @can('delete', \App\Models\Category::class)
                <a href="{{ route('category-trashed') }}" class="btn btn-sm btn-danger">
                    <button type="subit" class="btn btn-labeled btn-danger">
                        <span class="btn-label"><i class="fa fa-trash"></i>Trash</span></button></a>
                        @endcan
            </span>
        </div>
    </div>
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key =>$category)
                <tr class="item-{{ $category->id }}">
                    <th>{{ $key+1 }}</th>
                    <td class="text-center">{{ $category->name }}</td>
                    {{-- <td>12</td> --}}
                    <td class="text-center">{{ $category->products->count() }}</td>
                    <td>
                        @can('update', \App\Models\Category::class)

                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info sm">
                            <i class="fas fa-edit "></i>
                        </a>

                        @endcan
                        @can('delete', \App\Models\Category::class)
                        <a data-url="{{ route('category.destroy', $category->id) }}"data-id="{{ $category->id }}"
                            class="btn btn-danger sm deleteCategory"><i class=" fas fa-trash-alt "></i>
                        </a>
                        @endcan
                        @can('view', \App\Models\Category::class)
                        
                        <a href="{{ route('category.show', $category->id) }}"
                            class="btn btn-primary waves-effect waves-light">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $categories->links() }}
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-12 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">{{__('lang.showing-1-5-of').$sum_category .__('lang.items-category')}}</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                </ul>
            </div>
        </div>
    </footer>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      
        $(function() {
            $('.deleteCategory').on('click', deleteCategory)
        })

        function deleteCategory(event) {
            event.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');
            Swal.fire({
                title: "Are you sure delete ?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        type: "delete",
                        'url': url,
                        'data': {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        dataType: 'json',
                        success: function(data, ) {
                            if (data.status === 1) {
                                console.log(data);
                                window.location.reload();
                                alert(data.messages)

                            } 
                            if (data.status === 0) {
                                console.log(data);
                                window.location.reload();
                                alert(data.messages)

                            } 
                            }
                    });

                }

            })
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@endsection
