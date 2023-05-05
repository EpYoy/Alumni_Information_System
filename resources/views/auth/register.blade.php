@extends('layouts.app')
<title>Sign Up</title>
@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="POST" action="{{ route('register') }}">
        @csrf
          <div class="form-outline mb-4">
            <input type="name" id="name" class="form-control form-control-lg" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
              placeholder="Name" />
              @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email"
              placeholder="Email Address" />
              @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="new-password"
              placeholder="Password" />
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>

          <div class="form-outline mb-3">
            <input type="password-confirm" id="password-confirm" class="form-control form-control-lg" class="form-control" name="password_confirmation" required autocomplete="new-password"
              placeholder="Confirm Password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Register') }}</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
                <a href="{{ route('login') }}" class="link-danger">Log In</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection

