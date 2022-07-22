<div class="cart" >
    <h1>Giỏ Hàng</h1>
    @if (empty($carts))
        <p>chưa có sản phẩm nào</p>
        <a href="{{ route('home') }}">tiếp tục mua sắm</a>
    @else
        <table class="table updateCartUrl"  data-url="{{route('updateToCart')}}">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Anh</th>
                    <th scope="col">Tên Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tạm tính</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp


                @foreach ($carts as $key => $item)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>
                            <div class="featured__item__pic set-bg" style="width: 200;"
                                data-setbg="{{ asset('storage/images/' . $item['image']) }}">
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td><input class="quantity" type="number" value="{{ $item['quantity'] }}"></td>
                        <td>{{ number_format($item['price'] * $item['quantity']) }}</td>
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
                        <td><a href="" data-id="{{$key}}" class="btn btn-primary cart_update"> cập nhật</a>
                            <a href="" data-id="{{$key}}" class="btn btn-danger cart_delete" data-url="{{route('deleteToCart')}}">xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h5><b>Tạm Tổng</b><strong>{{ number_format($total) }}</strong> </h5>
</div>
@endif