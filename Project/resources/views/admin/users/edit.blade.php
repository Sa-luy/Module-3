@extends('admin.main');
@section('content')
    <div>
        <h3>Sửa thông tin Người dùng</h3>
        @error('msg')
        <h3 style="color: rgb(232, 13, 16); height:40px;" class="alter alert-primary text-center">{{ $message }}</h3>
    @enderror
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                    value="{{ $user->name }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $user->email }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone"
                    value="{{ $user->phone }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dia chi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{ $user->address }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ngay Sinh</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="day_of_birth" value="{{ $user->day_of_birth }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <x-label for="role_id" :value="__('Chon Vai tro')" />
                <select class="js-example-basic-multiple form-control" name="role_id[]"  multiple="multiple">
                 
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" 
                            @foreach ($user_role as $item)
                                @if ($item== $role->id)
                                {{'selected'}}
                                    
                                @endif
                            @endforeach
                            >{{ $role->name }}</option>
                    @endforeach
                </select>
                @if($errors->any())
                <p style="color:red"> {{$errors->first('role_id')}}</p>
             @endif
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
