@extends('admin.main');
@section('content')
    <div class="row">

        <div class="col"></div>

        <div class="col">
            @if (Session::has('fail'))
                <p class="text-danger">{{ Session::get('fail') }}</p>
            @endif
            
        </div>

        <div class="col"></div>

    </div>

    <div class="customer col-6">
        <form action="{{route('customer.update',$customer->id)}}" method="POST">
          @csrf
          @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name" value="{{ $customer->name }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="phone" value="{{ $customer->phone }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $customer->email }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{ $customer->address }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Register Date</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="created_at"
                    value="{{ $customer->created_at }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
