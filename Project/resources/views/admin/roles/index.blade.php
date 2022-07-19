@extends('admin.main');
@section('content')
    <div>
        <h3>Danh Sách Quyền </h3>
        <div class="row">

            <div class="col"> <a href="{{ route('role.create') }}" class="btn btn-primary ">THÊM</a></div>
            <div class="col">
                @if (Session::has('success'))
                    <p style="color: blue">{{ Session::get('success') }}</p>
                @endif
            </div>
            <div class="col"> <a href="{{ route('role-trashed') }}"> <button type="subit"
                        class="btn btn-labeled btn-danger">
                        <span class="btn-label"><i class="fa fa-trash"></i>Thùng Rác</span></button></a>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên quyền</th>
                        <th>Mô tả </th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                <a href="{{ route('role.show', $role->id) }}"><i class='bx bx-info-circle'></i></i></a>
                                <a href="{{ route('role.edit', $role->id) }}"><i class='bx bxs-edit'></i></a>
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    {{-- <input type="submit" value="DElete"> --}}
                                    <button type="subit" class="btn btn-labeled btn-danger"
                                        onclick="return confirm('Bạn muốn xóa  {{ $role->name }} ?!!!')">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    @endsection
