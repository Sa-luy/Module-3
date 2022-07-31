{{-- @php
           dd($category_products);

@endphp() --}}
@extends('fronten.layouts.main')
@section('hot_product')
<div class="category">
    <h3 class="text-success">{{$categories_id->name}}</h3>
    <h3 class="text-info">List Product</h3>
    <div class="row featured__filter">
        @foreach ($category_products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    {{-- <div class="featured__item__pic set-bg"
                        data-setbg="{{ asset('storage/images/' . $product->image) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="bx bx-heart"></i></a></li>
                            <li><a href="#"><i class='bx bx-message-rounded-edit'></i></a></li>
                            <li><a href="#" data-url="{{ route('addToCart', $product->id) }}"
                                    class="addCart"><i class='bx bx-cart-alt'></i></a></li>
                        </ul>
                    </div> --}}
                    @include('fronten.custom.cart')
                    <div class="featured__item__text">
                        <h6><a href="#">{{ $product->name }}</a></h6>
                        <h5>{{ number_format($product->price) }}</h5>
                        <h6>{{ $product->description }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $category_products->links() }}
</div>
@endsection