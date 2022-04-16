<!-- Footer -->
			<footer class="footer">
				<div class="footer-top">
					<div class="container">

						<div class="row">
							<div class="col-md-3">
								<h2 class="footer-title">{{ __('Office Address') }}</h2>
								<div class="footer-address">
									<div class="off-address">
										<p class="mb-2">{{ __('New York, USA (HQ)') }}</p>
										<address class="mb-0">{{ __('750 Sing Sing Rd, Horseheads, NY, 14845') }}</address>
										<p>{{ __('Call: ') }}<a href="#"><u>{{ __('469-537-2410') }}</u> {{ __('(Toll-free)') }}</a> </p>
									</div>
									<div class="off-address">
										<p class="mb-2">{{ __('Sydney, Australia') }} </p>
										<address class="mb-0">{{ __('24 Farrar Parade COOROW WA 6515') }}</address>
										<p>{{ __('Call: ') }}<a href="#"><u>{{ __('(08) 9064 9807') }}</u> {{ __('(Toll-free)') }}</a> </p>
									</div>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">{{ __('Useful Links') }}</h2>
									<ul>
										<li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
										<li><a href="blog-list">Blog</a></li>

										<li>
                                            @if (Route::has('login'))
                                                <a class="forgot-password" href="{{ route('login') }}">
                                                    {{ __('Login') }}
                                                </a>
                                            @endif
                                        </li>
                                        <li>
                                            @if (Route::has('register'))
                                                <a class="forgot-password" href="{{ route('register') }}">
                                                    {{ __('Register') }}
                                                </a>
                                            @endif
                                        </li>

										<li>
                                            @if (Route::has('password.request'))
                                                <a class="forgot-password" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                            @endif
                                        </li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">{{ __('Help & Support') }}</h2>
									<ul>
										<li><a href="{{ route('chats') }}">{{ __('Chat') }}</a></li>
										<li><a href="{{ route('faq') }}">{{ __('Faq') }}</a></li>
										<li><a href="review">{{ __('Reviews') }}</a></li>
										<li><a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a></li>
										<li><a href="{{ route('term-condition') }}">{{ __('Terms of use') }}</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">{{ __('Other Links') }}</h2>
									<ul>
										<li><a href="{{ route('frontend.freelancers') }}">{{ __('Freelancers') }}</a></li>
										<li><a href="freelancer-portfolio">{{ __('Freelancer Details') }}</a></li>
										<li><a href="{{ route('frontend.jobs') }}">{{ __('Project') }}</a></li>
										<li><a href="project-details">{{ __('Project Details') }}</a></li>
										<li><a href="post-project">{{ __('Post Project') }}</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">{{ __('Mobile Application') }}</h2>
									<p>{{ __('Download our App and get the latest Breaking News Alerts and latest headlines and daily articles near you') }}.</p>
									<div class="row g-2">
										<div class="col">
											<a href="#"><img class="img-fluid" src="{{ asset('assets/img/app-store.svg') }}" alt="app-store"></a>
										</div>
										<div class="col">
											<a href="#"><img class="img-fluid" src="{{ asset('assets/img/google-play.svg') }}" alt="google-play"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Footer Top -->

				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container">

						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; {{ __('2021 All Rights Reserved') }}</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 right-text">
									<div class="social-icon">
										<ul>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a></li>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /Copyright -->
					</div>
				</div>
				<!-- /Footer Bottom -->
			</footer>
			<!-- /Footer -->
