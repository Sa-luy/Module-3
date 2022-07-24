@extends('admin.main');
@section('content')
    <div class="category">
        <center><div class="mb-3">
            <b for="category" class="form-label">Tên Danh Mục :</b>
            <h5 class="text-success">{{ $category->name }}</h5>
        </div></center>
        
        <div class="mb-3">

            <b for="category" class="form-label">Sản phẩm trong danh mục :</b>
            @foreach ($products_category as $product_category)
          <p> <a href="{{ route('product.show', $product_category->id) }}"
            style="text-decoration: none"
                class="text-center">{{$product_category->name}}</a></p> 
            @endforeach

        </div>

    </div>
@endsection
