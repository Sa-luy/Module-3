@extends('admin.main');
@section('content')
    <h1>Danh mục Sản Phẩm Đã Xóa</h1>

    <a href="{{ route('category.create') }}" class="btn btn-primary ">THÊM</a>
    @if (Session::has('success'))
        <p class="text-success">
        <h5 style="color: rgb(95, 10, 232)">{{ Session::get('success') }}</h5>

        </p>
    @endif
    @if (Session::has('errors'))
        <p class="text-success">
        <h5 style="color: red">{{ Session::get('errors') }}</h5>
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
                    <td>12</td>
                    {{-- <td class="text-center">{{ $category__trashed->products->count() }}</td> --}}
                    <td>
                        <form action="{{ route('admin.category.restore', $category__trashed->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success align-middle" type="submit"
                                onclick="return confirm('Bạn muốn khôi phục {{ $category__trashed->name }} ?')">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </form>
                        <form action="{{ route('category-force-delete', $category__trashed->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger align-middle" type="submit"
                                onclick="return confirm('Bạn muốn xóa vĩnh viễn  {{ $category__trashed->name }} ?')">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
