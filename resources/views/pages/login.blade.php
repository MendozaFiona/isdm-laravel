@extends('layouts/pages')

@section('content')
<div class="main">

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button text-right">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                        <div class="form-group">
                            <a href="#" class="signup-image-link">No account yet? Register here.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection