@extends('admin.main');
@section('content')

    <br>
    <a href="{{ route('product.create') }}" class="btn btn-primary ">THÊM</a>
    <h1>Danh Sách Sản Phẩm</h1>
    @if (Session::has('success'))
        <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
        </p>
    @endif
    <table class="table-light">
        {{-- <table class="table table-striped table-hover align-middle"> --}}
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Danh Mục Sản Phẩm</th>
                <th>Ảnh Thu nhỏ</th>
                <th>Chi Tiết Sản Phẩm</th>
                <th>Cách dùng</th>
                <th>Phụ Lục</th>
                <th>Chức năng</th>
            </tr>
            @if (count($products) == 0)
                <p>Chưa có Sản Phẩm </p>
            @else
                @foreach ($products as $product)
                <tr class="table-dark">
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->amouth }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="" style="width: 150px">
                        </td>
                        <td class="word_break">{{ $product->description }}</td>
                        <td>{{ $product->use }}</td>
                        <td>{{ $product->status }}</td>
                        <td><a href="{{ route('product.edit', $product->id) }}"
                                class="btn btn-primary align-middle">Sửa</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger align-middle" type="submit"
                                    onclick="return confirm('Bạn muốn xóa {{ $product->name }} ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </thead>
    </table>

@endsection
