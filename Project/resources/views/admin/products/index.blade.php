@extends('admin.main');
@section('content')

    <br>
    <h2>Danh Sách Sản Phẩm</h2>
    <div class="row">
        <div class="col">
            <a href="{{ route('product.create') }}" class="btn btn-primary ">THÊM</a>
        </div>
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
                    <h2> <a href="{{ route('product-trashed') }}" class="btn btn-sm btn-danger"><button type="subit"
                                class="btn btn-labeled btn-danger">
                                <span class="btn-label"><i class="fa fa-trash"></i>Đã xóa</span></button></a></h2>
                </span>
            </div>
        </div>
    </div>
    <table class="table table-striped">
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
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->amouth }}</td>
                        <td>{{ $product->category->name ?? 'chưa nhập danh mục' }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="" style="width: 100px">
                        </td>
                        <td class="word_break">{{ $product->description }}</td>
                        <td>{{ $product->use }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <div class="row">
                                <div class="col"><a href="{{ route('product.show', $product->id) }}"
                                        class="btn btn-primary align-middle">Xem</a></div>
                                <div class="col"><a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-primary align-middle">Sửa</a></div>
                                <div class="col">
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger align-middle" type="submit"
                                            onclick="return confirm('Bạn muốn xóa {{ $product->name }} ?')">Xóa</button>
                                    </form>
                                </div>


                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </thead>
    </table>
    {{ $products->links() }}

@endsection
