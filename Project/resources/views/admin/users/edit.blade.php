@extends('admin.main');
@section('content')
    <div>
        <h3>Sửa thông tin Người dùng</h3>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                    value="{{ $user->name }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $user->email }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone"
                    value="{{ $user->phone }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{ $user->address }}">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="day_of_birth" value="{{ $user->day_of_birth }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="image" value="{{ asset('storage/images/user/'. $user->image ) }}">
                    <img src="{{ asset('storage/images/user/'. $user->image ) }}" alt=""
                            style="height: 100px">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
