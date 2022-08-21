@extends('layouts.app')

@section('content')

<div class="login-wrap">
	<div class="login-html">
        <div >
           <img src="{{ asset('img/car.jpg') }}" alt="" class="CarWashLogo"> 
        </div>
        
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">{{ __('Email Address') }}</label>
					<input id="user" type="text"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="input @error('email') is-invalid @enderror">
                    
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="group">
					<label for="pass" class="label">{{ __('Password') }}</label>
					<input id="pass" type="password" class="input"  name="password" required autocomplete="current-password" data-type="password">
                    
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" name="remember" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
                
                </form>
				<div class="hr"></div>
				<div class="foot-lnk">
                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
					<!-- <a href="#forgot">Forgot Password?</a> -->
				</div>
			</div>
			<div class="sign-up-htm">
            <form method="POST" action="{{ route('register') }}">
                        @csrf
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
                <div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
				</div>
				<div class="group">
					<label for="password-confirm" class="label">Repeat Password</label>
					<input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<!-- <div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div> -->
            </form>
			</div>
		</div>
	</div>
</div>
@endsection
