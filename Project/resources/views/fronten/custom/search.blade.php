@extends('fronten.layouts.main')
@section('hot_product')
<h1>list search</h1>
@extends('fronten.layouts.main')
@section('hot_product')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="category">
    <h3 class="text-success">list</h3>
    <h3 class="text-info"></h3>
    <div class="row featured__filter">
        @foreach ($search_products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"
                        data-setbg="{{ asset('storage/images/' . $product->image) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="bx bx-heart"></i></a></li>
                            <li><a href="#"><i class='bx bx-message-rounded-edit'></i></a></li>
                            <li><a href="#" data-url="@if(Auth::guard('customer')->check()) 
                                {{ route('addToCart', $product->id) }}
                                @endif"
                                    class="addCart"><i class='bx bx-cart-alt'></i></a></li>
                        </ul>
                    </div>
                    {{-- @include('fronten.custom.cart') --}}
                    <div class="featured__item__text">
                        <h6><a href="#">{{ $product->name }}</a></h6>
                        <h5>{{ number_format($product->price) }}</h5>
                        <h6>{{ $product->description }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- {{ $search_products->links() }} --}}
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
  footer: '<a href="">Why do I have this issue?</a>'
})
            }

        });
    }
</script>
@endsection
@endsection