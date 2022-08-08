<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
    <form action="/ProductDiscountCalculator" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Description</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">List Price</label>
          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Discount Percent</label >
          <input type="number" class="form-control" id="exampleInputPassword1" name="percent">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          {{-- <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </body>
</html>