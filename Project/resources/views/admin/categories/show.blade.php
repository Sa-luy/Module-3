@extends('admin.main');
@section('content')
    <style>
        h6 span {
            text-decoration-line: line-through;
        }
     
    </style>
    @php

    @endphp
    <div class="row">
        @foreach ($category_products as $category_product)
            <div class="col-lg-3">
                <img src="{{ asset('storage/images/' . $category_product->image) }}" alt="">
            </div>
        @endforeach
    </div>
    <div class="row">

        @foreach ($category_products as $category_product)
            <div class="col-lg-3">

               <h6><a style=" white-space:unset;" href="{{route('product.show',$category_product->id)}}"> {{ $category_product->name }} </a></h6> 
            </div>
        @endforeach
        <div class="row">

            @foreach ($category_products as $category_product)
                <div class="col-lg-3">

                    <h6>Giá Gốc :<span>{{ number_format($category_product->price + 76000) }}</span><sup>đ</sup></h6>
                    <h6 style="color: red">Giá sale: <label for="">{{ number_format($category_product->price - 1) }} </label>
                        <sup>đ</sup></h6>
                </div>
        @endforeach




        </div>
    @endsection
