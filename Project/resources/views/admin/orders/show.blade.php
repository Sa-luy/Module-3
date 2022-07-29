@extends('admin.main');
@section('content')
    <h3>Edit Oder</h3>
    <div class="col-10">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->fullname }}" name="fullname">

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->email }}" name="email">

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input disabled type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->phone }}" name="phone">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->address }}" name="address">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Notes</label>
            <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->notes }}" name="notes">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Order date</label>
            <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $order->order_date }}" name="order_date">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <div class="form-floating">
                <select disabled class="form-select" id="floatingSelect" aria-label="Floating label select example"
                    name="status">
                    {{-- <option selected>Open this select menu</option> --}}
                    <option {{ $order->status == 'no' ? 'selected' : '' }} value="{{ $order->status }}">{{ $order->status }}
                    </option>
                    <option {{ $order->status == 'no' ? 'selected' : '' }} value="{{ $order->status }}">{{ $order->status }}
                    </option>
                </select>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Total Money</label>
                <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="totalmoney" value="{{ $order->totalmoney }}">


            </div>
        </div>
    @endsection
