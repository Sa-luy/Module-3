@extends('admin.main');
@section('content')
    <div>
        <h3>Thêm mới quyền</h3>

        <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                <textarea name="" id="" cols="50" rows="8"  name="email" value="{{ old('display_name') }}" class="form-control"></textarea>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ old('display_name') }}"> --}}
                @if ($errors->any())
                    <p style="color:red">{{ $errors->first('display_name') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
