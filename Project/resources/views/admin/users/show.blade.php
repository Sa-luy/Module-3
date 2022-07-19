@extends('admin.main');
@section('content')
    <div>
        <h3>Danh Sách Người dùng</h3>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th> Số Điện Thoại</th>
                    <th> Địa chỉ</th>
                    <th> Ngày tháng năm sinh</th>
                    <th> Ảnh</th>
                    
                    <th> Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }} </td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->day_of_birth }}</td>
                    <td>
                        <img src="{{ asset('storage/images/user/'. $user->image ) }}" alt=""
                            style="height: 100px">
                    </td>
                        <a href="{{route('user.edit',$user->id)}}">Edit</a>
                        <form action="">
                            <input type="submit" value="DElete">
                        </form>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
@endsection
