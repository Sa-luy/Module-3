@extends('admin.main');
@section('content')

    <br>
    <h2>{{__('lang.product-list')}}</h2>
    <div class="row">

        @can('create', \App\Models\Product::class)
            <div class="col">
                <a href="{{ route('product.create') }}" class="btn "><i class="fa-solid fa-calendar-plus"></i></a>
            </div>
        @endcan
        <div class="col">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>

        <div class="col">
            <div class="input-group">
                {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
                <span class="input-group-btn">
                    <h2> <a href="{{ route('product-trashed') }}" class="btn btn-sm "><button type="subit"
                                class="">
                                <span class="btn-label"><i class="fa fa-trash"></i></span></button></a></h2>
                </span>
            </div>
        </div>
    </div>
    @if (count($products) == 0)
        <p>{{__('lang.empty-list')}}</p>
    @else
        <table class="table table-striped">
            {{-- <table class="table table-striped table-hover align-middle"> --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.name-product')}}</th>
                    <th>{{__('lang.price')}}</th>
                    <th>{{__('lang.quantity')}}</th>
                    <th>{{__('lang.category-name')}}</th>
                    <th>{{__('lang.image-list')}}</th>
                    {{-- <th>Chi Tiết Sản Phẩm</th> --}}
                    {{-- <th>Cách dùng</th> --}}
                    {{-- <th>Phụ Lục</th> --}}
                    <th>{{__('lang.action')}}</th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->amouth }}</td>
                        <td>{{ $product->category->name ?? 'chưa nhập danh mục' }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="" style="width: 100px">
                        </td>
                        <td>
                            @can('update', \App\Models\Product::class)
                                <a href="{{ route('product.edit', $product->id) }}" class="">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            @endcan

                            @can('delete', \App\Models\Product::class)
                                <a data-url="{{ route('product.destroy', $product->id) }}" id="{{ $product->id }}"
                                    class="sm deleteProduct"><i class=" fas fa-trash-alt "></i>
                                </a>
                            @endcan

                            @can('view', \App\Models\Product::class)
                                <a href="{{ route('product.show', $product->id) }}"
                                    class="waves-effect waves-light">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            @endcan

                        </td>
                    </tr>
                @endforeach
    @endif
    </thead>
    </table>
    {{ $products->links() }}
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-12 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">{{__('lang.showing-1-5-of ').$sum_product .__(' lang.items-product')}}</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">

                </ul>
            </div>
        </div>
    </footer>
    <script>
      
        $(function() {
            $('.deleteProduct').on('click', deleteProduct)
        })

        function deleteProduct(event) {
            event.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');
            Swal.fire({
                title: "Are you sure delete {{$product->name}}?",
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
                                // window.location.reload();
                                alert(data.messages)

                            } 
                            if (data.status === 0) {
                                console.log(data);
                                // window.location.reload();
                                alert(data.messages)

                            } 
                            }
                    });

                }

            })
        }
    </script>

@endsection
