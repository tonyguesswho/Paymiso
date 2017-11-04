@extends('layouts.structure')

@section('content')
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo center">
                    <img src="images/logow2.png" alt="Image"
                     class="img-responsive">
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="login-username" type="email" name="email" required="" class="input-material">
                      <label for="login-username" class="label-material">Email Address</label>

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="login-password" type="password" name="password" required="" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                       @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                     <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}

                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <button id="login" class="btn btn-primary" type="submit">Login</button>
                    <!-- <a id="login" href="index.html" class="btn btn-primary">Login</a> -->
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="/register" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection
      