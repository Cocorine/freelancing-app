<?php $page="login";?>

@extends('livewire.frontend.layouts.index')

@section('front-content')

<!-- Page Content -->
			<div class="content" style="padding-top: 144px;">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-md-3">

							<!-- Login Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/logo-01.png') }}" alt="logo" class="img-fluid"></a>
											<h3>{{ __('Welcome Back') }}</h3>
											<p>{{ __("Don't miss your next opportunity. Sign in to stay updated on your professional world") }}.</p>
										</div>

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success mt-4 mb-4">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger mt-4  mb-4">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li style="list-style-type: none;"><i class="fas fa-times"></i> {{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
											<div class="form-group form-focus">
                                                <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												<label class="focus-label">{{ __('Email Address') }}</label>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

											</div>
											<div class="form-group form-focus">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
												<label class="focus-label">{{ __('Password') }}</label>
											</div>
											<div class="form-group">
												<label class="custom_check">
													<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													<span class="checkmark"></span> {{ __('Remember password') }}
												</label>
											</div>

											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ __('Login') }}</button>
											<div class="login-or">
												<p>{{ __('Or login with') }}</p>
											</div>
											<div class="row social-login">
												<div class="col-4">
													<a href="#" class="btn btn-twitter btn-block"> {{ __('Twitter') }}</a>
												</div>
												<div class="col-4">
													<a href="#" class="btn btn-facebook btn-block"> {{ __('Facebook') }}</a>
												</div>
												<div class="col-4">
													<a href="#" class="btn btn-google btn-block"> {{ __('Google') }}</a>
												</div>
											</div>
											<div class="row">
											<div class="col-6 text-left">
                                                @if (Route::has('password.request'))
                                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
											</div>
											<div class="col-6 text-right dont-have">
                                                {{ __('New to Kofejob?') }}
                                                @if (Route::has('register'))
                                                    <a class="register-link" href="{{ route('register') }}">
                                                        {{ __('Click here') }}
                                                    </a>
                                                @endif
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Content -->

						</div>
					</div>
				</div>
			</div>
<!-- /Page Content -->

@endsection


{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 --}}
