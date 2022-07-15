@extends('admin.main');
@section('content')
    <h1>Danh mục Sản Phẩm</h1>

    <a href="{{ route('category.create') }}" class="btn btn-primary ">THÊM</a>
    @if (Session::has('success'))
        <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
        </p>
    @endif
    <div class="input-group">
        {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
        <span class="input-group-btn">
            <a href="{{route('admin.category.trashed')}}" class="btn btn-sm btn-default">Thùng Rác</a>
        </span>
    </div>
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
            @foreach ($categories as $category)
                <tr class="item-{{$category->id}}">
                    <th>{{ $category->id }}</th>
                    <td class="text-center">{{ $category->name }}</td>
                    <td>12</td>
                    {{-- <td class="text-center">{{ $category->products->count() }}</td> --}}
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary align-middle">Sửa</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger align-middle" type="submit" onclick="return confirm('Bạn muốn xóa {{$category->name}} ?')">Xóa</button>
                        </form>
                       
                        {{-- <a href="#" id="{{ $category->id }}" class="text-danger mx-1 deleteIcon"><i
                            class="bi-trash h4 h4"></i></a > --}}
                        </td>
                </tr>
            @endforeach
        </tbody>
        <script>
 
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </table>
@endsection
