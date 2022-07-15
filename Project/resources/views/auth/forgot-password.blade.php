<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('fronten/css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url({{ asset('fronten/images/bg.jpg') }});">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Forgot PassWord</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <div class="mb-3">
                                    <x-input id="email" class="form-control" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    @if ($errors->any())
                                        <div style="color: red" class="form-text">{{ $errors->first('email') }}</div>
                                </div>
                                @endif
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="submit" class="form-control btn btn-primary submit px-3">
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div>
                        </form>
              
                     
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('fronten/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fronten/js/popper.js') }}"></script>
    <script src="{{ asset('fronten/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fronten/js/main.js') }}"></script>

</body>

</html>
