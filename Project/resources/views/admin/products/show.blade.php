@extends('admin.main');
@section('content')
    <div class="product">
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Tên Sản Phẩm : </b>
            <p class="text-info">{{ $product->name }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Danh Mục Sản Phẩm : </b>
           <p><a href="{{route('category.show',$product->category->id)}}"
            style="text-decoration: none">{{ $product->category->name  }}</a></p> 
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label ">Số Lượng Sản Phẩm : </b>
            <p class="text-info">{{ $product->amouth  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Chi Tiết Sản Phẩm : </b>
            <p class="text-info">{{ $product->description  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Cách dùng : </b>
            <p class="text-info">{{ $product->use  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Phụ Lục : </b>
            <p class="text-info">{{ $product->status  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">Ảnh chính : </b>
            <p><img src="{{ asset('storage/images/' . $product->image) }}" alt=""></p>
            <hr>
        </div>

    </div>
@endsection
