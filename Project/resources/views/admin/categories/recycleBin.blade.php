@extends('admin.main');
@section('content')
    <h1>Danh mục Sản Phẩm Đã Xóa</h1>

    <a href="{{ route('category.create') }}" class="btn btn-primary ">THÊM</a>
    @if (Session::has('success'))
        <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
        </p>
    @endif
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">số lượng sản phẩm</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories_trashed as $category__trashed)
                <tr>
                    <th>{{ $category__trashed->id }}</th>
                    <td class="text-center">{{ $category__trashed->name }}</td>
                    <td class="text-center">{{ $category__trashed->products->count() }}</td>
                    <td><a href="{{ route('category.edit', $category__trashed->id) }}" class="btn btn-primary align-middle">Sửa</a>
                        <form action="{{ route('admin.category.restore', $category__trashed->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger align-middle" type="submit"
                             onclick="return confirm('Bạn muốn khôi phục {{$category__trashed->name}} ?')">Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
