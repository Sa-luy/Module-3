<div class="cart">
    <h1>Giỏ Hàng</h1>
    @if (empty($carts))
        <p>chưa có sản phẩm nào</p>
        <a href="{{ route('home') }}">tiếp tục mua sắm</a>
    @else
        <table class="table updateCartUrl" data-url="{{ route('updateToCart') }}">
            <thead>
                <tr>
                    <th scope="col">Ma San Pham</th>
                    <th scope="col">Anh</th>
                    <th scope="col">Tên Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tạm tính</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                <form action="{{ route('customerOrder') }}" method="POST">
                    @csrf
                    @php
                        $total = 0;
                        $totalAll = 0;
                    @endphp
                    @foreach ($carts as $item)
                        @php
                            $total = $item['price'] * $item['quantity'];
                            $totalAll += $total;
                            // dd($total)
                        @endphp
                        <tr>
                            <th scope="row">
                                <input class="product_id" type="hidden" value="{{ $item['product_id'] }}"
                                name="product_id[]">
                                {{ $item['product_id']}}
                            </th>
                            <td>
                                <div class="featured__item__pic set-bg" style="width: 200;"
                                    data-setbg="{{ asset('storage/images/' . $item['image']) }}">
                            </td>
                            <td>
                                <input class="name" type="hidden" value="{{ $item['name'] }}"
                                    name="name[]">{{ $item['name'] }}
                            </td>
                            <td>
                                <input class="price" type="hidden" value="{{ $item['price'] }}"
                                    name="price[]">{{ $item['price'] }}
                            </td>
                            <td>
                                <input class="quantity" type="number" value="{{ $item['quantity'] }}"
                                    name="quantity[]">
                            </td>
                            <td>
                                <input class="name" type="hidden" value="{{ $total }}"
                                    name="total">{{ $total }}
                                    <input class="name" type="hidden" value="{{ $totalAll }}"
                                    name="totalAll">

                            </td>

                            <td>
                                <a data-url="{{ route('updateToCart') }}"data-id="{{ $item['product_id'] }}"
                                    class="btn btn-primary cart_update">
                                    cập nhật
                                </a>
                                <a href="" data-id="{{ $item['product_id']}}" class="btn btn-danger cart_delete"
                                    data-url="{{ route('deleteToCart') }}">
                                    xóa
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  
            </tbody>
        </table>

        <h5>Form Checkout</h5>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
                Name
            </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="fullname"
                value="{{ Auth::guard('customer')->user()->name }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
                Email address
            </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="email" value="{{ Auth::guard('customer')->user()->email }}">
        </div>
         
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
                Address
            </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address"
                value="{{ Auth::guard('customer')->user()->address }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
                Phone
            </label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="phone"
                value="{{ Auth::guard('customer')->user()->phone }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
                Total Money
            </label>
            <input  disabled type="text" class="form-control" id="exampleInputPassword1" name="totalmoney" 
            value="{{number_format($totalAll)}}">
        </div>
        <button type="submit" class="btn btn-primary">Check Out</button>
        </form>

</div>
</div>
@endif
