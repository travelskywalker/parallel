@extends('layouts.app')


@section('login-content')

<!-- <div class="wrapper">
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
</div> -->



<div class="row">
  <div class="col s6 offset-s3">
    <div class="card-panel">
        <div class="row">
            <h5 class="center">
                Login to your Parallel Account
            </h5>
        </div>
      <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="login" type="submit" class="btn btn-primary hide">
                                    Login
                                </button>

                                <a class="waves-effect waves-light btn login-btn" onclick="login()">Login</a>
                               
                            </div>
                        </div>
                    </form>
    </div>
  </div>
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