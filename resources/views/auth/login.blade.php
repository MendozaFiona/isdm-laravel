@extends('layouts.app')

@section('content')

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">{{ __('Login') }}</h2>
                    <form method="POST" class="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user_name" id="user_name" placeholder="Username" class="@error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                        
                            @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="user_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="user_pass" id="user_pass" placeholder="Password" class="@error('user_pass') is-invalid @enderror" name="user_pass" required autocomplete="current-user_pass">
                            
                            @error('user_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                        <div class="form-group form-button text-right">
                            <button type="submit" class="form-submit">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('register') }}" class="signup-image-link">No account yet? Register here.</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
