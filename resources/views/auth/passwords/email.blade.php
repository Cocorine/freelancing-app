<?php $page="forgot-password";?>

@extends('livewire.frontend.layouts.index')

@section('front-content')


<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-6 offset-md-3">

							<!-- Forgot Password Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="index"><img src="{{ asset('assets/img/logo-01.png') }}" alt="logo" class="img-fluid"></a>
											<h3>{{ __("First, let's find your account") }}</h3>
											<p>{{ __("Please enter your email or phone Number") }}</p>
										</div>
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
											<div class="form-group form-focus">
                                                @error('email')
                                                    <span class="invalid-feedback focus-label" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												<input type="email" class="form-control floating">
												<label class="focus-label">{{ __('Email Address') }}</label>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ __('FIND OUT PASSWORD') }}</button>
											<div class="row form-row">
											<div class="col-6 text-left">
												<a class="forgot-link" href="{{ route('login') }}"> {{ __('Remember your password?') }}</a>
											</div>
											<div class="col-6 text-right dont-have">{{ __('New to Kofejob?') }} <a href="{{ route('register') }}">{{ __('Click here') }}</a></div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Forgot Password Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->


        </div>
		<!-- /Main Wrapper -->
@endsection

{{--
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
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
