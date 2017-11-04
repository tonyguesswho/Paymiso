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
                    <img src="images/logown.jpg" alt="Image"
                     class="img-responsive">
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="register-form" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                      <input id="register-username" type="text" name="firstname" required class="input-material" value="{{old('firstname')}}">
                      <label for="register-username" class="label-material">First Name</label>
                      @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                    </div>
                     <div class="form-group{{ $errors->has('lastname') ? 'has-error' : '' }}">
                      <input id="register-username" type="text" name="lastname" required class="input-material" value="{{old('lastname')}}">
                      <label for="register-username" class="label-material">Last Name</label>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="register-email" type="email" name="email" required class="input-material" value="{{old('email')}}">
                      <label for="register-email" class="label-material">Email Address</label>
                       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                     <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                      <input id="register-email" type="phone" name="phone" required class="input-material" value="{{old('phone')}}">
                      <label for="register-phone" class="label-material">Phone</label>
                       @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="register-passowrd" type="password" name="password" required class="input-material">
                      <label for="register-passowrd" class="label-material">Password</label>
                       @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="register-passowrd" type="password" name="password_confirmation" required class="input-material">
                      <label for="register-passowrd" class="label-material">Confirm Password</label>
                    </div>
                    <div class="form-group terms-conditions">
                      <input id="license" type="checkbox" class="checkbox-template">
                      <label for="license">Agree the terms and policy</label>
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
                    <button id="register" type="submit" class="btn btn-primary">Sign up</button>
                  </form><small>Already have an account? </small><a href="/login" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection