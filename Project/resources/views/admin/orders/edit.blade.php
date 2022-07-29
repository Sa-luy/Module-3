@extends('admin.main');
@section('content')
    <h3>Create New Oder</h3>
    <div class="col-10">
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                value="{{$order->fullname}}" name="fullname">
                @error('fullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$order->email}}"  name="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
               
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$order->phone}}" name="phone">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$order->address}}" name="address">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Notes</label>
                <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{$order->notes}}"   name="notes">
                @error('notes')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Notes</label>
                <div class="form-floating">
                    <select  class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                      {{-- <option selected>Open this select menu</option> --}}
                      <option {{$order->status=='no'? 'selected':'' }} value="{{$order->status}}">{{$order->status}}</option>
                      <option {{$order->status=='no'? 'selected':'' }} value="{{$order->status}}">{{$order->status}}</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Total Money</label>
                <input   type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="totalmoney" value="{{$order->totalmoney}}" name="fullname">
                    @error('totalmoney')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
