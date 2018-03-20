@extends('layouts.app')


@section('login-content')

<div class="wrapper">
  <form class="login" method="POST" action="{{ route('login') }}">
    @csrf
    <p class="title center">Log in to Parallel</p>
    @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <input placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autofocus/>
    <i class="fa fa-user"></i>

    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    <i class="fa fa-key"></i>
    <button >
      <i class="spinner"></i>
      <span class="state">Log in</span>
    </button>

    
  </form>
  </p>
</div>


@endsection
 <!-- <div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>
    </div>
</div> -->
<!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->