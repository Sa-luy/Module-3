@extends('fronten.layouts.main')
@section('hot_product')
<div class="container">
    <div class="" style="margin-bottom: 50px; margin-top: 20px">Search advance</div>
    <div class="row" id="search" >
        <form id="search-form" action="{{ route('search_advance_product') }}" method="POST" >
            @csrf
            <div class="form-group">
                <div>Name:</div>
                 <input class="form-control" type="text" name="name" placeholder="name" />
            </div>

            <div class="form-group">
                <div>Status:</div>
                {{-- <select data-filter="make"class="filter-make filter "> --}}
                    <input type="text" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <div>Description</div>
                <input class="form-control" type="text" name="description" placeholder="mô tả" />

            </div>

            <div class="form-group">
                <div>Price:</div>
                <input class="form-control" type="text" name="price" placeholder="price" />
            </div>

            <div class="form-group col-xs-3">
                <button type="button" class="btn btn-block btn-primary" id="search-product" onclick="search()">Search</button>
            </div>
        </form>
    </div>
    <div class="row" id="products">

    </div>
</div>

<script>
        function search() {
                $.ajax({
                    type: "POST",
                    url: '{{ route('search_advance_product') }}',
                    data: $("#search-form").serialize(),
                    success: function(data)
                    {
                        $('#products').html(data);
                    }
                });
        }
</script>
@endsection


