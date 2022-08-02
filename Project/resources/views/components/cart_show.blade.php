<div class="cart">
    <h1>Giỏ Hàng</h1>
    @if (empty($carts))
        <p>chưa có sản phẩm nào</p>
        <a href="{{ route('home') }}">tiếp tục mua sắm</a>
    @else
        <table class="table updateCartUrl" data-url="{{ route('updateToCart') }}">
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
                        <td><a href="" data-id="{{ $key }}" class="btn btn-primary cart_update"> cập
                                nhật</a>
                            <a href="" data-id="{{ $key }}" class="btn btn-danger cart_delete"
                                data-url="{{ route('deleteToCart') }}">xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h5><b>Tạm Tổng</b><strong>{{ number_format($total) }}</strong> </h5>
        <div class="order">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('order.store') }}" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-10">

                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="fullname">
                                        @error('fullname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="phone">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="address">
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Total Money</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="totalmoney" value="">
                                        @error('totalmoney')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Pay</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>
@endif
