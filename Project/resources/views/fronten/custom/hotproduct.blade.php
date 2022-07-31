@section('hot_product')
    <div class="hero__item set-bg" data-setbg="{{ asset('storage/images/' . $product_new->image) }}">
        <div class="hero__text">
            {{-- <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% tự nhiên</h2>
        <p>nói không với hóa chất</p> --}}
            <a href="#" class="primary-btn">Mua ngay</a>
        </div>
    </div>
@endsection