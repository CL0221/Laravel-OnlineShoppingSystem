@extends('layouts.navbar')
@section('content')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        border: 3px solid #f1f1f1;
        }

    button:hover{
        opacity: 1;
    }
    /* Sign up button */
    .signupbtn {
        padding: 14px 20px;
        background-color:deepskyblue;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
    float: left;
    width: 50%;
    border: none;
    cursor: pointer;
    opacity: 0.9;
    color: white;
    margin: 8px 0;
    }

    /* Clear floats */
    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
    }
</style>
<body>
    <div class="container">
        <h1>Register</h1>
        <hr>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <label for="name"><b>Name</b></label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="email"><b>Email</b></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password"><b>Password</b></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password-confirm"><b>Confirm Password</b></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            <div class="clearfix">
                <button type="button" class="cancelbtn"><a href="{{route('home')}}">Cancel</a></button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </form>
    </div>
</body>
@endsection
