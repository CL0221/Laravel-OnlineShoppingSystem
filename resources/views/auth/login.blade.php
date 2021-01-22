@extends('layouts.navbar')
@section('content')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form.form {border: 3px solid #f1f1f1;}

    input[type=email], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .signin{
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    span.password {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.password {
            display: block;
            float: none;
        }
    }
</style>
<body>
    <br>
    <form action="{{route('login')}}" method="POST" class="form">
        @csrf
        <div class="container">
            <h1>Login</h1>
            <hr>

            <label for="email"><b>Email</b></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password"><b>Password</b></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    Remember Me
                </label>

            <button type="submit" class="signin">Login</button>

        </div>

        <div class="container">

            <span class="password">
                <a href="{{route('register')}}" class="btn btn-link">New Member</a>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </span>
        </div>
    </form>
</body>
@endsection
