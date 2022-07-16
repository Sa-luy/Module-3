@extends('admin.main');
@section('content')
<style>
    .form-select{
        padding: 8;
    margin: 0px !important;
    }
</style>
    <h1>Sửa Thông Tin Sản Phẩm </h1>
    @error('msg')
    <h3 style="color: rgb(232, 13, 16); height:40px;" class="alter alert-primary text-center">{{ $message }}</h3>
@enderror
    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$product->name}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Danh Mục Sản Phẩm</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id">
                            <option  value="{{$product->category->id}}" selected>{{$product->category->name }}</option>
                            @foreach ($categories as $category)
                                
                            <option value="{{$category->id}}">{{$category->name }}</option>
                            @endforeach
                            <
                          </select>
                        {{-- <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_id"> --}}
                        {{-- @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('category_id')}}</div>
                        @endif --}}
                        @error('category_id')
                        <div style="color: red" class="form-text">{{$errors->first('category_id')}}</div>
                            @enderror
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giá Sản Phẩm</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="{{$product->price}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('price')}}</div>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mô tả Sản Phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description" value="{{$product->description}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Công Dụng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="use" value="{{$product->use}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('use')}}</div>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số Lượng Hiện Có</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amouth" value="{{$product->amouth}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('amouth')}}</div>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phụ lục</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="{{$product->status}}">
                        @if($errors->any())
                        <div style="color: red" class="form-text">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hình Ảnh</label>
                    <input type="file" accept="image/*" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="file" style="width: 600px" value="{{$product->image}}">
                    @if($errors->any())
                    <div style="color: red" class="form-text">{{$errors->first('file')}}</div>
                   
                    @endif
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt=""
                    style="width: 150px">
                </div>
            </td>

        </tr>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
