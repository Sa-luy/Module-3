@extends('admin.main');
@section('content')
    <style>
       h6 span {
            text-decoration-line: line-through;
        }
    </style>
    <div class="row">
        <div class="col-lg-4">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="">

        </div>
        <div class="col-lg-7">
            <h3> <strong>{{ $product->name }}</strong> </h3>
            <h6>Giá Cũ :<span>300000</span><sup>đ</sup></h6>
            <h6 style="color: red">Giá mới: <label for="">{{ $product->price }} </label> <sup>đ</sup></h6>
            <p>{{ $product->description }}</p>
            <strong>Công dụng :</strong>
            <p>{{ $product->use }}</p> <br>
            <p>{{ $product->status }}</p>
        </div>
        <div>
            <button type="button" class="btn btn-warning"><a href="#">Thêm vào giỏ hàng</a></button>
            <button type="button" class="btn btn-warning"><a href="#">Mua ngay</a></button>
        </div>
    </div>
@endsection
