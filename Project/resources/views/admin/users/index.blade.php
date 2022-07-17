@extends('admin.main');
@section('content')
<div>
    <h3>Danh Sách Người dùng</h3>
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
            <tr>
                <td><a href="">1</a>
                <a href="">A</a>
                <a href="">B</a>
                <a href="">c</a>
                    <a href="#">Informartion</a>
                    <a href="">Edit</a>
                    <form action="">
                        <input type="submit" value="DElete">
                    </form>
                </td>
            </tr>
        </tbody>

    </table>
</div>
@endsection