<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1>Them khách hàng</h1>
    <form action="">
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        {{-- <th>Thao tác</th> --}}
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td><input class="form-control" type="text" name="" placeholder="nhap ten"></td>
        <td><input class="form-control" type="Text" name="" placeholder="nhap sdt"></td>
        <td><input class="form-control" type="text" name="" placeholder="nhap emai"></td>
        <td>
         <input type="submit" value="add" class="btn btn-info">
        </td>
    </tr>
</tbody>
</table>
</form>
  </body>
</html>