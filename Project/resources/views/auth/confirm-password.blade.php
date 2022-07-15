<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('fronten/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('fronten/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Enter New Password</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				
                  <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
        
                    <!-- Password -->
                    <div>
                        <x-label for="password" :value="__('Password')" />
        
                        <x-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
        
                    <div class="flex justify-end mt-4">
                        <x-button>
                            {{ __('Confirm') }}
                        </x-button>
                    </div>
                </form>
                    {{-- <form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Email" required name="email">
                          @if ($errors->any())
                          <div style="color: red" class="form-text">{{ $errors->first('email') }}</div>
                      @endif
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  @if ($errors->any())
                  <div style="color: red" class="form-text">{{ $errors->first('password') }}</div>
              @endif
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form> --}}
	         
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('fronten/js/jquery.min.js')}}"></script>
  <script src="{{asset('fronten/js/popper.js')}}"></script>
  <script src="{{asset('fronten/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('fronten/js/main.js')}}"></script>

	</body>
</html>

