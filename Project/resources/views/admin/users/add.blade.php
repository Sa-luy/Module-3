@extends('admin.main');
@section('content')
    <div>
        <h3>Thêm mới Người dùng</h3>
       
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                    value="{{ old('name') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ old('email') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="password" value="{{ old('password') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone"
                    value="{{old('phone') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{ old('address') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ngày tháng năm sinh</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="day_of_birth" value="{{ old('day_of_birth') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('day_of_birth') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <x-label for="role_id" :value="__('Chon Vai tro')" />
                <select class="js-example-basic-multiple form-control" name="role_id[]" multiple="multiple">
                   
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{$role->id==4?'selected':''}}
                            >{{ $role->name }}</option>
                    @endforeach
                </select>
                @if($errors->any())
                <p style="color:red"> {{$errors->first('email')}}</p>
             @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="image" value="{{ old('image') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('image') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
