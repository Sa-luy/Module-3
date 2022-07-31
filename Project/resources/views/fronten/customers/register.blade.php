<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-infor">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 50px">
                <h4>Customer Resgister</h4>

                <form>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="exampleInputname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputname" name="name" value="{{ old('name')}}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="exampleInputPhone" name="phone" value="{{ old('phone')}}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="exampleInputAddress" name="address" value="{{ old('address')}}">
                        </div>

                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email')}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password Enter</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
