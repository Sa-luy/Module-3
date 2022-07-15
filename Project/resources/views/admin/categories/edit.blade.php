@extends('admin.main');
@section('content')
    <br>
    <br>
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Sửa Tên Danh Mục</label>
            </div>
            <div class="">
                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline"
                    name="name" value="{{ $category->name }}">
                    @if($errors->any())
                    <p style="color: rgb(181, 33, 33)">{{$errors->first('name')}}</p>
                    @endif
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Vui Lòng nhập trên 8 kí tự.
                </span>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Lưu lại</button>
    </form>
@endsection
