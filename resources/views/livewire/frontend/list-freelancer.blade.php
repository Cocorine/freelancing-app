@extends('livewire.frontend.layouts.index')

@section('front-content')

<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<h2 class="breadcrumb-title">{{ __('Developers') }}</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __('Home') }}</a></li>
									<li class="breadcrumb-item active" aria-current="page">{{ __('Developers') }}</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header d-flex justify-content-between">
									<h4 class="card-title mb-0">FILTERS</h4>
									<a href="javascript:void(0);">Clear All</a>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<h4>Keywords</h4>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter Keywords">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Location</h4>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter Location">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Category</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>Select Category</option>
											<option>Developer</option>
											<option>UI Developer</option>
											<option>React Developer</option>
											<option>.Net Developer</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Completed Projects</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>Select Projects</option>
											<option>Node Projects</option>
											<option>UI Projects</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Pricing Type</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>Hourly Rate</option>
											<option>Full Day Rate</option>
											<option>Half Day Rate</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Add Skills</h4>
									<div class="form-group">
										<span class="badge badge-pill badge-skill">+ Web Design</span><span class="badge badge-pill badge-skill">+ UI Design</span><span class="badge badge-pill badge-skill">+ Node Js</span><span class="badge badge-pill badge-skill">+ Angular</span><span class="badge badge-pill badge-skill">+ Wordpress</span>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Avalability</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_time" checked>
											<span class="checkmark"></span> Hourly
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_time">
											<span class="checkmark"></span> Part Time
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_time">
											<span class="checkmark"></span>  Full Time
										</label>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Experience</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist">
											<span class="checkmark"></span>  0-1 years
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_exp" checked>
											<span class="checkmark"></span> 2-5 years
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_exp">
											<span class="checkmark"></span>  5-8 years
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_exp">
											<span class="checkmark"></span>  9-12 years
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_exp">
											<span class="checkmark"></span>  Mastered
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_exp">
											<span class="checkmark"></span> Professional
										</label>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Hourly Rate</h4>
									<div id="slider-range"></div>
									<div class="row slider-labels">
										<div class="col-xs-12 caption">
											<span id="slider-range-value1"></span> - <span id="slider-range-value2"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
										<form>
											<input type="hidden" name="min-value" value="">
											<input type="hidden" name="max-value" value="">
										</form>
										</div>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Currency</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>USD</option>
											<option>Euro</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Profile type</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>Individual</option>
											<option>Individual</option>
											<option>Individual</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Reviews</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="pro_ratings">
											<span class="checkmark"></span>
											<span class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<span class="average-rating">(5)</span>
											</span>
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="pro_ratings">
											<span class="checkmark"></span>
											<span class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="far fa-star"></i>
												<span class="average-rating">(4)</span>
											</span>
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="pro_ratings">
											<span class="checkmark"></span>
											<span class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<span class="average-rating">(6)</span>
											</span>
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="pro_ratings">
											<span class="checkmark"></span>
											<span class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<span class="average-rating">(7)</span>
											</span>
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="pro_ratings">
											<span class="checkmark"></span>
											<span class="rating">
												<i class="fas fa-star filled"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
												<span class="average-rating">(8)</span>
											</span>
										</label>
									</div>
								</div>
									<div class="btn-search">
										<button type="button" class="btn btn-block">Search</button>
									</div>
								</div>
							</div>
							<!-- /Search Filter -->

						</div>

						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="sort-tab">
								<div class="row align-items-center">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="d-flex align-items-center">
										   <div class="freelance-view">
											  <h4>Showing 1 - 12 of 455</h4>
										   </div>
										</div>
									 </div>
									 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="d-flex justify-content-sm-end">
										   <div class="sort-by">
											  <select class="custom-select">
												 <option>Relevance</option>
												 <option>Rating</option>
												 <option>Popular</option>
												 <option>Latest</option>
												 <option>Free</option>
											  </select>
										   </div>
										</div>
									</div>
								</div>
						   </div>

							<div class="bootstrap-tags text-left pl-0">
								<span class="badge badge-pill badge-skills">UI/UX Developer <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">Germany <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">Hourly <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">0-1 years <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">USD <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
							</div>

							<div class="row">
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-1.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">George Wells</a></h3>
												<div class="freelance-specific">UI/UX Designer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Alabama, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">4.7 (32)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$25 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite favourited"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-2.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
													<h3><a href="#">Timothy Smith</a></h3>
													<div class="freelance-specific">PHP Developer</div>
													<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Illinois, USA</div>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="average-rating">4.8 (55)</span>
													</div>
													<div class="freelance-tags">
														<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
														<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
														<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
													</div>
													<div class="freelancers-price">$21 Hourly</div>
												</div>
											</div>
											<div class="cart-hover">
												<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
											</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-3.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Janet Paden</a></h3>
												<div class="freelance-specific">Graphic Designer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">4.1 (30)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">Free</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-4.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">James Douglas</a></h3>
												<div class="freelance-specific">iOS Developer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">3.2 (22)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">Free</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-5.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Floyd Lewis</a></h3>
												<div class="freelance-specific">SEO Developer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">4.9 (40)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$30 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-6.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Jacqueline Daye</a></h3>
												<div class="freelance-specific">SM Developer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">4.3 (35)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$12 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-7.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Crystal Kemper</a></h3>
												<div class="freelance-specific">Network Engineer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Maryland, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">3.5 (28)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$20 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-8.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Tony Ingle</a></h3>
												<div class="freelance-specific">Business Analyst</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Missouri, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">2.1 (15)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">Free</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-9.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Kathleen Kaiser</a></h3>
												<div class="freelance-specific">IT Project Manager</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Kansas, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">4.5 (36)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$25 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-10.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Veronica Cheek</a></h3>
												<div class="freelance-specific">Software Architect</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Vermont, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">2.3 (20)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$26 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-11.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Andrew Glover</a></h3>
												<div class="freelance-specific">Software Developer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Virginia, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">5.0 (4)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">$8 Hourly</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="freelance-widget">
										<div class="freelance-content">
											<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
											<div class="freelance-img">
												<a href="#">
													<img src="assets/img/user/avatar-12.jpg" alt="User Image">
													<span class="verified"><i class="fas fa-check-circle"></i></span>
												</a>
											</div>
											<div class="freelance-info">
												<h3><a href="#">Mickey Bernier</a></h3>
												<div class="freelance-specific">QA Engineer</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Colorado, USA</div>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="average-rating">5.0 (4)</span>
												</div>
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
												<div class="freelancers-price">Free</div>
											</div>
										</div>
										<div class="cart-hover">
											<a href="developer-details" class="btn-cart" tabindex="-1">View Profile</a>
										</div>
									</div>
								</div>

							</div>


						</div>

					</div>
				</div>

			</div>
			<!-- /Page Content -->


        </div>

		<!-- /Main Wrapper -->
		<!-- The Modal -->
		<div class="modal fade" id="rating">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header d-block b-0 pb-0">
						<span class="modal-close float-right"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
					</div>
					<div class="modal-body">
						<form action="project">
							<div class="modal-info">
								<div class="text-center pt-0 mb-5">
									<h3>Please login to Favourite Freelancer</h3>
								</div>
								<div class="submit-section text-center">
									<button  data-dismiss="modal" class="btn btn-primary black-btn click-btn">Cancel</button>
									<button type="submit" class="btn btn-primary click-btn">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
@endsection
