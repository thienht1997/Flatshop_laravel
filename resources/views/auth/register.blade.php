@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title p-b-37">
                Register
            </span>
            <h4>Name</h4>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter your name">
    
                <input id="name" type="text" class="input100" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="focus-input100"></span>
            </div>
            <h4>Email</h4>
            <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter email">
                <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="focus-input100"></span>
            </div>
            <h4>Password</h4>
            <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
            <input id="password" type="password" class="input100" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
            @enderror
                <span class="focus-input100"></span>
            </div>
            <h4>Confirm password</h4>
            <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                                <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
            </div>


            <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Sign up
            </button>
            </div>

            <div class="text-center p-t-57 p-b-20">
                <span class="txt1">
                    Or login with
                </span>
            </div>

            <div class="flex-c p-b-112">
                <a href="#" class="login100-social-item">
                    <i class="fa fa-facebook-f"></i>
                </a>

                <a href="#" class="login100-social-item">
                    <img src="images/icons/icon-google.png" alt="GOOGLE">
                </a>
            </div>
        </form>

        
    </div>
</div>



<div id="dropDownSelect1"></div>
@endsection
