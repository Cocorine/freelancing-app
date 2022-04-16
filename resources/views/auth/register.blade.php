{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

 <?php $page="register";?>

 @extends('livewire.frontend.layouts.index')

 @section('front-content')
	<!-- Page Content -->
			<div class="content" style="padding-top: 144px;">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-md-3">

							@if ($message = Session::get('success'))
								<div class="alert alert-success mb-4">
									<p>{{ $message }}</p>
								</div>
							@endif

							@if ($errors->any())
								<div class="alert alert-danger  mb-4">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
										<li style="list-style-type: none;"><i class="fas fa-times"></i> {{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<!-- Register Tab Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/logo-01.png') }}" alt="logo" class="img-fluid"></a>
											<h3>{{ __('Join Kofejob') }}</h3>
											<p>{{ __('Make the most of your professional life') }}</p>
										</div>
										<nav class="user-tabs mb-4">
											<ul role="tablist" class="nav nav-pills nav-justified">
												<li class="nav-item">
													<a href="#developer" data-toggle="tab" class="nav-link active">{{ __('FREELANCER') }}</a>
												</li>
												<li class="nav-item">
													<a href="#company" data-toggle="tab" class="nav-link">{{ __('COMPANY') }}</a>
												</li>
											</ul>
										</nav>
										<div class="tab-content pt-0">
											<div role="tabpanel" id="developer" class="tab-pane fade active show">
												<form method="POST" action="{{ route('register') }}">
                                                    @csrf
													<div class="form-group form-focus">
														<input type="text" name="last_name"  class="form-control floating @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
														<label class="focus-label">{{ __('Last Name') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input type="text" name="first_name"  class="form-control floating @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
														<label class="focus-label">{{ __('First Name') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
														<label class="focus-label">{{ __('Email Address') }} </label>
													</div>

													<div class="form-group form-focus">
                                                        <select name="gender" id="gender" class="form-control floating @error('gender') is-invalid @enderror" value="{{ old('gender') }}" required autofocus>
                                                            <option value="" selected></option>
                                                            <option value="m">Male</option>
                                                            <option value="f">Femele</option>
                                                        </select>

														<label class="focus-label">{{ __('Gender') }} </label>
													</div>

													<div class="form-group form-focus">
                                                        <select name="location" id="location" class="form-control floating @error('location') is-invalid @enderror" value="{{ old('location') }}" required autofocus>
                                                            <option value="" selected></option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                            @endforeach
                                                        </select>

														<label class="focus-label">{{ __('Country') }} </label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
														<label class="focus-label">{{ __('Password') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="password" type="password" class="form-control floating @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
														<label class="focus-label">{{ __('Confirm Password') }}</label>
													</div>
													<div class="dont-have">
														<label class="custom_check">
                                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
															<span class="checkmark"></span> {{ __('You agree to the Kofejob') }} <a href="{{ route('privacy-policy') }}">{{ __('User Agreement, Privacy Policy,') }}</a> {{ __('and') }} <a href="{{ route('privacy-policy') }}">{{ __('Cookie Policy') }}</a>.
														</label>
													</div>
													<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ __('Agree TO JOIN') }}</button>
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
                                                                    {{ __('Forgot Password ?') }}
                                                                </a>
                                                            @endif
                                                        </div>


                                                        <div class="col-6 text-right dont-have">
                                                            {{ __('Already on Kofejob') }} <a href="{{ route('login') }}">{{ __('Click here') }}</a>
                                                        </div>
													</div>
												</form>
											</div>
											<div role="tabpanel" id="company" class="tab-pane fade">
												<form method="POST" action="{{ route('register') }}">
                                                    @csrf
													<div class="form-group form-focus">
														<input type="text" name="last_name"  class="form-control floating @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
														<label class="focus-label">{{ __('Last Name') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input type="text" name="first_name"  class="form-control floating @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
														<label class="focus-label">{{ __('First Name') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input type="text" name="compagny"  class="form-control floating @error('compagny') is-invalid @enderror" value="{{ old('compagny') }}" required autocomplete="compagny" autofocus>
														<label class="focus-label">{{ __('Compagny name') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
														<label class="focus-label">{{ __('Email Address') }} </label>
													</div>

													<div class="form-group form-focus">
                                                        <select name="gender" id="gender" class="form-control floating @error('gender') is-invalid @enderror" value="{{ old('gender') }}" required autofocus>
                                                            <option value="" selected></option>
                                                            <option value="m">Male</option>
                                                            <option value="f">Female</option>
                                                        </select>

														<label class="focus-label">{{ __('Gender') }} </label>
													</div>

													<div class="form-group form-focus">
                                                        <select name="location" id="location" class="form-control floating @error('location') is-invalid @enderror" value="{{ old('location') }}" required autofocus>
                                                            <option value="" selected></option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                            @endforeach
                                                        </select>

														<label class="focus-label">{{ __('Country') }} </label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
														<label class="focus-label">{{ __('Password') }}</label>
													</div>
													<div class="form-group form-focus">
                                                        <input id="password" type="password" class="form-control floating @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
														<label class="focus-label">{{ __('Confirm Password') }}</label>
													</div>
													<div class="dont-have">
														<label class="custom_check">
                                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
															<span class="checkmark"></span> {{ __('You agree to the Kofejob') }} <a href="{{ route('privacy-policy') }}">{{ __('User Agreement, Privacy Policy,') }}</a> {{ __('and') }} <a href="{{ route('privacy-policy') }}">{{ __('Cookie Policy') }}</a>.
														</label>
													</div>
													<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ __('Agree TO JOIN') }}</button>
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
                                                                    {{ __('Forgot Password ?') }}
                                                                </a>
                                                            @endif
                                                        </div>


                                                        <div class="col-6 text-right dont-have">
                                                            {{ __('Already on Kofejob') }} <a href="{{ route('login') }}">{{ __('Click here') }}</a>
                                                        </div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Register Tab Content -->

						</div>
					</div>
				</div>
			</div>
	<!-- /Page Content -->

@endsection
