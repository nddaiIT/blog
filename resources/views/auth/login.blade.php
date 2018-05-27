{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V12</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset('blog_assets/blog/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/blog/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset("blog_assets/blog/images/img-01.jpg")}}');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login100-form-avatar">
                        <img src="{{ asset('PNN.jpg') }}" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        D.Dai Nguyen
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                         
                        <input class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus" type="text"  placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                            
                        <input id="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="#" class="txt1">
                            Forgot Username / Password?
                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href="#">
                            Create new account
                            <i class="fa fa-long-arrow-right"></i>                      
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="{{ asset('blog_assets/blog/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('blog_assets/blog/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('blog_assets/blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('blog_assets/blog/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('blog_assets/blog/js/main.js') }}"></script>

</body>
</html>
