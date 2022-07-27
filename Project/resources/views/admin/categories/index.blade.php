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
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">số lượng sản phẩm</th>
                <th scope="col" class="text-center">Thao tác</th>
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
                        {{-- <label class="row">
                              <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"><a href="{{ route('category.show', $category->id) }}"
                                    class="align-middle show"><i class="fa-solid fa-eye"></i></a></div>
                            <div class="col"><a href="{{ route('category.edit', $category->id) }}"
                                    class=" align-middle show"><i class="fa-solid fa-file-pen"></i></a></div>
                            <div class="col">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    {{-- <input type="submit" value="DElete"> --}}
                                    {{-- <button type="subit" class="btn btn-labeled btn-danger" 
                                    onclick="return confirm('Bạn muốn xóa  {{ $category->name }} ?!!!')">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span></button>
                                </form>
                                

                            </div>
                          


                        </label> --}}
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info sm">
                            <i class="fas fa-edit "></i>
                        </a>

                        {{-- @endcan --}}
                        {{-- @can('Product delete') --}}
                        <a data-href="{{ route('category.destroy', $category->id) }}" id="{{ $category->id }}"
                            class="btn btn-danger sm deleteIcon"><i class=" fas fa-trash-alt "></i>
                        </a>
                        {{-- @endcan --}}
                        {{-- @can('Product view') --}}
                        <a href="{{ route('category.show', $category->id) }}"
                            class="btn btn-primary waves-effect waves-light">
                            <i class="fa-solid fa-eye"></i>
                        </a>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@endsection
