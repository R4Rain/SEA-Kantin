@extends('layouts.main')

@section('content')
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url({{url('images/background2.jpg')}});"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 class="fw-bold">Reset Password</h3>
            <form action="{{ route('login') }}" method="POST">
              @csrf
              @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
              @endif
              <div class="form-group first mb-5">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="d-flex mb-5 flex-column align-items-center justify-content-center">
                <input type="submit" value="Send Password Reset Link" class="btn btn-block btn-primary mb-3">
                <a href="{{ url('login') }}"
                  >Log in</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
