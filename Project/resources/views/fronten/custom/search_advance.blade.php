@extends('fronten.layouts.main')
@section('hot_product')
@if (!empty($search_products))
<<<<<<< HEAD
<table class="table table-striped table-hover">
<thead>
  <tr>
    <th scope="col">Mã Sản phẩm</th>
    <th scope="col">Tên</th>
    <th scope="col">Giá</th>
    <th scope="col">Mô tả</th>
  </tr>
</thead>
<tbody>
@foreach ($search_products as $key =>$items)
@foreach ($items as $item)

      <tr>
        <th scope="row">{{$item->id}}</th>
        <td><a href="{{ route('guest.product_show', $item->id) }}">{{$item->name}}</a></td>
        <td>{{$item->price}}</td>
        <td>{{$item->name}}</td>
      </tr>
    
      
      @endforeach
      @endforeach
    </tbody>
  </table>
  <p>Trống</p>

@endif



@endsection
=======
<p>123</p>
    
@endif
<table class="table table-striped table-hover">

</table>
>>>>>>> 82f006ab2bbdfb020a1922c3523d0087359324b0
