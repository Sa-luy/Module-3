@extends('fronten.layouts.main')
@section('hot_product')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .featured__item__pic {
            height: 350px;
        }
    </style>
    <div class="product">
        <div class="row">
            <div class="col-md-4">
                <div class="mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/images/' . $product->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="bx bx-heart"></i></a></li>
                                <li><a href="#"><i class='bx bx-message-rounded-edit'></i></a></li>
                                <li><a href="#"
                                        data-url="
                                @if (Auth::guard('customer')->check()) {{ route('addToCart', $product->id) }} @endif
                                "
                                        class="addCart"><i class='bx bx-cart-alt'></i></a></li>
                            </ul>
                            {{-- @include('fronten.custom.cart') --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <p>Danh mục Sản phẩm</p>
                    <h4><a href="{{ route('category.show', $product->category->id) }}"
                            style="text-decoration: none">{{ $product->category->name }}</a></h4>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label ">Số lượng hiện có</b>
                    <p class="text-info">{{ $product->amouth }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">Mô Tả</b>
                    <p class="text-info">{{ $product->description }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">Cách dùng</b>
                    <p class="text-info">{{ $product->use }}</p>

                </div>
                <div class="mb-3">
                    <b for="exampleInputEmail1" class="form-label">Thông tin bổ sung</b>
                    <p class="text-info">{{ $product->status }}</p>
                    <hr>
                </div>

            </div>
        @endsection
        @section('content')
            <div class="row">
                {{-- product->category --}}
                <h5>Sản phẩm cung danh mục</h5>
                @foreach ($categoryitems as $product_item)

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('storage/images/' . $product_item->image) }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li>$: {{$product_item->price}}</li>
                                <li>còn :{{$product_item->amouth}} sản phẩm</li>
                                <li><a href="#"
                                    data-url="
                            @if (Auth::guard('customer')->check()) {{ route('addToCart', $product->id) }} @endif
                            "
                                    class="btn btn-success addCart">Add To Cart</a></li>
                            </ul>
                            <h5><a href="{{ route('category.show', $product_item->category->id) }}">{{$product_item->description}} </a></h5>
                            <p>{{$product_item->status}}  </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $('.addCart').on('click', addToCart)
    })

    function addToCart(event) {
        event.preventDefault();
        let url = $(this).data('url');

        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'successfully added to cart',
                    showConfirmButton: false,
                    timer: 1500
                })
                window.location.reload();
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="{{ route('customer.login') }}">To be continue shopping, login please!</a>'
                })
            }

        });
    }
</script>
@endsection
