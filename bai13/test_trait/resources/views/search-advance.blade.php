<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Advanced </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="" style="margin-bottom: 50px; margin-top: 20px">Search advance</div>
    <div class="row" id="search" >
        <form id="search-form" action="{{ route('search_advance_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div>Name:</div>
                 <input class="form-control" type="text" name="name" placeholder="name" />
            </div>

            <div class="form-group">
                <div>Status:</div>
                <select data-filter="make" name="status" class="filter-make filter form-control">
                    <option value="0">NEW</option>
                    <option value="1">OLD</option>
                </select>
            </div>
            <div class="form-group">
                <div>Type:</div>
                <select data-filter="make" name="type" class="filter-make filter form-control">
                    <option value="0">SMART_PHONE</option>
                    <option value="1">LAPTOP</option>
                </select>
            </div>

            <div class="form-group">
                <div>Price:</div>
                <select data-filter="make" class="filter-make filter form-control" name="price">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                </select>
            </div>

            <div class="form-group col-xs-3">
                <button type="button" class="btn btn-block btn-primary" id="search-product" onclick="search()">Search</button>
            </div>
        </form>
    </div>
    @if(!empty($products))
    <div class="row" id="products">
        <table class="table table-bordered">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Type</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
    3214657496841
    @endif
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

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
</html>


