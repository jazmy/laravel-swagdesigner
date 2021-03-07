@extends('layouts.master')

@section('subpagecontent')
<div class="resultsbox">

  <h1>Register</h1>

  <form method="POST" id='register' action="{{ route('register') }}">

    {{ csrf_field() }}

    <p>* Required fields</p>
    <br><br>
    <label for="name">* Name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    @if($errors->has('name'))
    <span class="help-block">
      <div class="error">{{ $errors->first('name') }}</div>
    </span>
    @endif
    <br><br>
    <label for="email">* E-Mail Address</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
    <span class="help-block">
      <div class="error">{{ $errors->first('email') }}</div>
    </span>
    @endif
    <br><br>
    <label for="password">* Password (min: 6)</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
    <div class="error">{{ $errors->first('password') }}</div>
    @endif
    <br><br>
    <label for="password-confirm">* Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" required>
    <br><br>
    <br>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>

@endsection
