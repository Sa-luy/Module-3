@extends('admin.main');
@section('content')
    <div class="product">
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.name-product')}}</b>
            <p class="text-info">{{ $product->name }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.category-name')}}</b>
           <p><a href="{{route('category.show',$product->category->id)}}"
            style="text-decoration: none">{{ $product->category->name  }}</a></p> 
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label ">{{__('lang.quantity')}}</b>
            <p class="text-info">{{ $product->amouth  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.description')}}</b>
            <p class="text-info">{{ $product->description  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.use')}}</b>
            <p class="text-info">{{ $product->use  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.appendix')}}</b>
            <p class="text-info">{{ $product->status  }}</p>
            <hr>
        </div>
        <div class="mb-3">
            <b for="exampleInputEmail1" class="form-label">{{__('lang.image')}}</b>
            <p><img src="{{ asset('storage/images/' . $product->image) }}" alt=""></p>
            <hr>
        </div>

    </div>
@endsection
