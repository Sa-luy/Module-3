@extends('admin.main');
@section('content')


    <div class="row">
        <div class="col-6">
            <h2>Danh Sách Sản Phẩm Đã Xóa</h2>
        </div>
        <div class="col">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>

        <div class="col">

        </div>
    </div>
    @if (count($producs_trasheds) == 0)
        <p>Chưa có Sản Phẩm đã xóa</p>
    @else
        <table class="table table-hover">
            {{-- <table class="table table-striped table-hover align-middle"> --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('lang.name-product') }}</th>
                    <th>{{ __('lang.price') }}</th>
                    <th>{{ __('lang.quantity') }}</th>
                    <th>{{ __('lang.category-name') }}</th>
                    <th>{{ __('lang.image-list') }}</th>
                    <th>{{ __('lang.description') }}</th>
                    <th>{{ __('lang.use') }}</th>
                    <th>{{ __('lang.appendix') }}</th>
                    <th>{{ __('lang.action') }}</th>
                </tr>


                @foreach ($producs_trasheds as $product)
                    <tr class="table-dark">
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->amouth }}</td>
                        <td>{{ $product->category->name ?? 'chưa nhập danh mục' }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt=""
                                style="width: 150px">
                        </td>
                        <td class="word_break">{{ $product->description }}</td>
                        <td>{{ $product->use }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <form action="{{ route('admin.product.restore', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success align-middle" type="submit"
                                    onclick="return confirm('Bạn muốn khôi phục {{ $product->name }} ?')">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </form>
                            <form action="{{ route('product-force-delete', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger align-middle" type="submit"
                                    onclick="return confirm('Bạn muốn xóa vĩnh viễn  {{ $product->name }} ?')">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    @endif
    </thead>
    </table>

@endsection
