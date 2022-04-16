{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<?php $page="verify";?>

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

							<!-- Verify Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/logo-01.png') }}" alt="logo" class="img-fluid"></a>
											<h3>{{ __('Verify Your Email Address') }}</h3>
                                            @if (session('resent'))
                                                <p class="alert alert-success" role="alert">
                                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                                            <p>{{ __('If you did not receive the email') }},</p>
										</div>

                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <div class="col-6 offset-md-3 text-center">
												<button type="submit" class="btn btn-twitter btn-block">{{ __('click here to request another') }}</button>
											</div>
                                            {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                                        </form>
									</div>
								</div>
							</div>
							<!-- /Verify Content -->

						</div>
					</div>
				</div>
			</div>
<!-- /Page Content -->

@endsection
