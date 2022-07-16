@extends('admin.main');
@section('content')
 
<h1>Thêm  Danh Mục Sản Phẩm</h1>
@error('msg')
<div style="color: rgb(224, 18, 18)" class="alter alert-primary text-center">{{$message}}</div>
@enderror
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Tên Danh Mục</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"
                    name="name" placeholder="nhập tên">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Vui Lòng nhập trên 8 kí tự.
                </span>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Thêm</button>
    </form>
@endsection
