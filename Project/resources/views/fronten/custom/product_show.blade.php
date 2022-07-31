@extends('fronten.layouts.main')
@section('hot_product')
<style>
    .featured__item__pic{
        height: 350px;
    }
</style>
    <div class="product">
        <div class="row">
            <div class="col-md-4">
                <div class="mix oranges fresh-meat">
                    <div class="featured__item">
                        @include('fronten.custom.cart')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    {{-- <b for="exampleInputEmail1" class="form-label">{{ __('lang.category-name') }}</b> --}}
                    <h4><a href="{{ route('category.show', $product->category->id) }}"
                            style="text-decoration: none">{{ $product->category->name }}</a></h4>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label ">{{ __('lang.quantity') }}</b>
                    <p class="text-info">{{ $product->amouth }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">{{ __('lang.description') }}</b>
                    <p class="text-info">{{ $product->description }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">{{ __('lang.use') }}</b>
                    <p class="text-info">{{ $product->use }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">{{ __('lang.appendix') }}</b>
                    <p class="text-info">{{ $product->status }}</p>
                    <hr>
                </div>

            </div>
        </div>
    </div>
@endsection
