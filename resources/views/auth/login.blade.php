@extends('layouts.master')

@section('subpagecontent')
<div class="resultsbox">
    <h1>Login</h1>

    Don't have an account? <a href='/register'>Register here...</a>
<br><br>
    <form id='login' method="POST" action="/login">

        {{ csrf_field() }}

        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
<br><br>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @if ($errors->has('password'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
<br><br>
        <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
<br><br>
        <br>
        <button type="submit" class="btn btn-primary">Login</button>

        <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>

    </form>
  </div>

@endsection
