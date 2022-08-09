@extends('fronten.layouts.main')
@section('hot_product')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
    <div class="col-8">
        @if ($customer_curent->avatar)
        <img src="{{asset('storage/images/user/'. $customer_curent->avatar )}}" >
            @else
        <img src="{{asset('img/user.PNG')}}" >
        @endif
    <h2>Avarta</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#avatarModal">
        Edit Avarta
      </button>
</div>
<div class="col-4">
    <p>Tên:</p>
  <p><b>{{$customer_curent->name}}</b> </p>  
    <p> Số Điện thoại:</p>
   <p><b>{{$customer_curent->phone}}</b> </p> 

    <p> Email:</p>
   <p><b>{{$customer_curent->email}}</b> </p> 
    <p> Địa chỉ:</p>
  <p><b>{{$customer_curent->address}}</b> </p> 
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
                     <img type="hidden" width="120px" height="100px" id="blah" src="#" alt="your image" /> <br>
            <input accept="image/*" type='file' id="imgInp" name="avatar" />
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</form>
<script>
  jQuery(document).ready(function() {
    $('#blah').hide();
      jQuery('#imgInp').change(function() {
          const file = jQuery(this)[0].files;
          if (file[0]) {
              jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
              $('#blah').show();
              $('#imgInp').hide();
          }
      });
  });
</script>
@endsection