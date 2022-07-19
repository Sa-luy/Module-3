@extends('admin.main');
@section('content')
    <div>
        <h3>Danh sách người dùng đã xóa</h3>
        @if (count($users) == 0)
            <p>Danh sách trống</p>
        @else
    </div>
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <td>#</td>
                <td>Tên</td>
                <td>Email</td>
                <td> Số Điện Thoại</td>
                <td> Thao tác</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key }}</a> </td>
                    <td> {{ $user->name }}</a></td>
                    <td> {{ $user->email }}</a></td>
                    <td>{{ $user->phone }}</a></td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <form action="{{ route('admin.user.restore', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger align-middle" type="submit"
                                        onclick="return confirm('Bạn muốn khôi phục {{ $user->name }} ?')">Restore</button>
                                </form>
                            </div>
                            <div class="col-3">
                                <form action="{{ route('user-force-delete', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger align-middle" type="submit"
                                        onclick="return confirm('Bạn muốn xóa vĩnh viễn  {{ $user->name }} ?')">
                                        Delete</button>
                                </form>
                            </div>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    @endif
    {{ $users->links() }}

@endsection
