@extends('layouts.main')

@section('content')
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/background2.jpg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 class="fw-bold">Login</h3>
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group first mb-3">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control is-invalid @enderror" placeholder="Enter your email address" @error('email') name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="current-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="d-flex mb-5 align-items-center justify-content-between">
                <label for="remember" class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                  <div class="control__indicator"></div>
                </label>
                @if (Route::has('password.request'))
                  <span><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
                @endif
              </div>
              <div class="d-flex mb-5 flex-column align-items-center justify-content-center">
                <input type="submit" value="Log In" class="btn btn-block btn-primary mb-3">
                <a href="register"
                  >Don't have an account?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
