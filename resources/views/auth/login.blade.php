@extends('layouts.app')

@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-lg-auto">
          <div class="row mb-5">
            <div class="col-lg-8 mx-lg-auto text-center">
              <div class="section-title h2 mb-3">
                <h2 class="mb-0">Login</h2>
                <span class="title-letter">L</span>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur, culpa dolor dolore
                dolores eum fugit, iusto magnam maiores neque nisi reiciendis sed velit vero.</p>
            </div>
          </div>

          <div class="contact-form">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-row">
                <div class="form-process"></div>

                <div class="col-12 col-md-7 mgauto">
                  <div class="form-group error-text-white">
                    <input type="email" id="cf-name" name="email" value="{{ old('email') }}"
                           placeholder="Enter your Email"
                           class="form-control required @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>

                <div class="col-12 col-md-7 mgauto">
                  <div class="form-group error-text-white">
                    <input type="password" name="password" id="cf-email" placeholder="Enter your password"
                           class="form-control required @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 offset-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>


                <div class="col-12 text-center">
                  <button class="btn btn-primary" type="submit" id="cf-submit" name="cf-submit">Login</button>
                </div>
              </div>
            </form>
            @if (Route::has('password.request'))
              <a class="btn btn-link offset-md-3" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            @endif
            <div class="contact-form-result text-center"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
