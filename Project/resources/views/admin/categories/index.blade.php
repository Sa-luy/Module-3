@extends('admin.main');
@section('content')
    <h1>
        Danh mục Sản Phẩm</h1>
    <div class="row">
        <div class="col">
            <a href="{{ route('category.create') }}" class="btn btn-primary ">THÊM</a>
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
            {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
            <span class="input-group-btn">
                <a href="{{ route('category-trashed') }}" class="btn btn-sm btn-danger">
                    <button type="subit" class="btn btn-labeled btn-danger">
                        <span class="btn-label"><i class="fa fa-trash"></i>Đã xóa</span></button></a>
            </span>
        </div>
    </div>
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">số lượng sản phẩm</th>
                <th scope="col" class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="item-{{ $category->id }}">
                    <th>{{ $category->id }}</th>
                    <td class="text-center">{{ $category->name }}</td>
                    {{-- <td>12</td> --}}
                    <td class="text-center">{{ $category->products->count() }}</td>
                    <td>
                        <label class="row">
                              <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"><a href="{{ route('category.show', $category->id) }}"
                                    class="btn btn-primary align-middle">Xem</a></div>
                            <div class="col"><a href="{{ route('category.edit', $category->id) }}"
                                    class="btn btn-primary align-middle">Sửa</a></div>
                            <div class="col">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger align-middle" type="submit"
                                        onclick="return confirm('Bạn muốn xóa {{ $category->name }} ?')">Xóa</button>
                                </form>
                            </div>
                          


                        </label>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $categories->links() }}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@endsection
