@extends('fronten.layouts.main')
@section('hot_product')
<div class="row">
    <div class="col-8">
        <img src="{{asset('img/user.PNG')}}" >
    <h2>Avarta</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#avatarModal">
        Edit Avarta
      </button>
</div>
<div class="col-4">
    <p>Tên:</p>
    <b>{{$customer_curent->name}}</b>
    <p> Số Điện thoại</p>
    <b>{{$customer_curent->phone}}</b>

    <p> Email</p>
    <b>{{$customer_curent->email}}</b>
    <p> Địa chỉ</p>
    <b>{{$customer_curent->address}}</b>
</div>
    
</div>
<form method="post" action="{{route('editprofile')}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa Ảnh Đại diện</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="file" name="avatar"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</form>
@endsection