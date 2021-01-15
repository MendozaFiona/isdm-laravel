@extends('layouts.app')

@section('content')
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">

                    <h2 class="form-title">Register</h2>

                    <div class="card-body">
                        <form method="POST" class="register-form" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"  class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label for="school_id"><i class="zmdi zmdi-n-1-square material-icons-name"></i></label>
                                <input type="text" name="school_id" id="school_id" placeholder="School ID"  class="@error('school_id') is-invalid @enderror" name="school_id" value="{{ old('school_id') }}" required autocomplete="school_id" autofocus>
                                </div>
                                @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"  class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="school_id" autofocus>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Repeat your password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label for="amount"><i class="zmdi zmdi-money material-icons-name"></i></label>
                                <input type="amount" name="amount" id="amount" placeholder="Fee Amount"  class="@error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>
                                </div>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group form-button text-right">
                                <button type="submit" class="form-submit">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('login') }}" class="signup-image-link">Have an account? Login here.</a>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                </div>  
            </div>
        </div>
    </section>
</div>
@endsection
