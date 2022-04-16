<?php $page="project";?>
@extends('livewire.frontend.layouts.index')

@section('front-content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<h2 class="breadcrumb-title">{{ __('Projects') }}</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __('Home') }}</a></li>
									<li class="breadcrumb-item active" aria-current="page">{{ __('Projects') }}</li>
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
									<h4 class="card-title mb-0">{{ __('FILTERS') }}</h4>
									<a href="javascript:void(0);">Clear All</a>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<h4>Category</h4>
									<div class="form-group">
										<select class="form-control select">
											<option value="">Select Category</option>
                                            @foreach ( $categories as $category )
											    <option value="{{ $category->id }}">{{ __($category->category) }}</option>
                                            @endforeach
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Location</h4>
									<div class="form-group">
										<select class="form-control select">
											<option>Country, City, Zipcode</option>
											<option>UK</option>
											<option>London</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Completed Projects</h4>
									<div class="form-group">
										<select class="form-control select">
											<option value="">Select Projects</option>
											<option value="">Node Projects</option>
											<option value="">UI Projects</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Pricing Type</h4>
									<div class="form-group">
										<select class="form-control select" name="price_type">
											<option value="hourly">Hourly Rate</option>
											<option value="full day">Full Day Rate</option>
											<option value="half day">Half Day Rate</option>
										</select>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Add Skills</h4>
									<div class="form-group">
										<span class="badge badge-pill badge-skill">+ Web Design</span>
										<span class="badge badge-pill badge-skill">+ UI Design</span>
										<span class="badge badge-pill badge-skill">+ Node Js</span>
										<span class="badge badge-pill badge-skill">+ Angular</span>
										<span class="badge badge-pill badge-skill">+ Wordpress</span>
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
									<h4>Keywords</h4>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Enter Keywords">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Currency</h4>
									<div class="form-group">
										<select class="form-control select">
											<option value="$">USD</option>
											<option value="£">Euro</option>
											<option value="btc">Bitcoin</option>
										</select>
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
								<span class="badge badge-pill badge-skills">USA <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">Hourly <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">0-1 years <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
								<span class="badge badge-pill badge-skills">USD <span class="tag-close" data-role="remove"><i class="fas fa-times"></i></span></span>
							</div>

							<div class="row">
								<!-- Project Content -->

                                @foreach($jobs->where('hire_at',null) as $job)


								<div class="col-md-6 col-lg-12 col-xl-6">

									<div class="freelance-widget widget-author">
										<div class="freelance-content">
										<a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
		                                <div class="author-heading">
		                                    <div class="profile-img">
		                                        <a href="#">
		                                            <img src="{{ asset(optional(optional(optional($job)->project_owner)->profile)->url ?? 'assets/img/company/img-1.png') }}" alt="author">
		                                        </a>
		                                    </div>
		                                    <div class="profile-name">
		                                        <div class="author-location">
                                                    {{ optional(optional($job)->project_owner)->nom }}
                                                    @if(optional(optional($job)->project_owner)->compagny)
                                                    {{ str_replace('\\', '', optional(optional($job)->project_owner)->compagny) }}
                                                    @else
                                                    {{ str_replace('\\', '', optional(optional($job)->project_owner)->nom) }} {{ str_replace('\\', '', optional(optional($job)->project_owner)->prenom) }}
                                                    @endif
                                                    <i class="fas fa-check-circle text-success verified"></i></div>
		                                    </div>
											<div class="freelance-info">
												<h3><a href="#">{{ str_replace('\\', '', optional(optional($job)->project_owner)->profil) }}</a></h3>
												<div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</div>
												<div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>{{ optional(optional($job)->location)->country }}</div>
											</div>
											<div class="freelance-tags">
                                                @foreach($job->skills as $key => $skill)
                                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">{{ __($skill->name) }}</span></a>
                                                @endforeach
											</div>
											<div class="freelancers-price">{{ '$'.$job->min_price }}</div>
		                                </div>
										<div class="counter-stats">
		                                        <ul>
		                                            <li>
		                                                <h3 class="counter-value">
                                                            @if((\Carbon\Carbon::parse($job->delay)->isPast()))
                                                            {{ \Carbon\Carbon::parse($job->delay)}}
                                                            @else

                                                            @php
                                                              $number = \Carbon\Carbon::parse($job->created_at)->diffInDays(\Carbon\Carbon::now()) ;
                                                            @endphp

                                                                {{ $number }} Days Left

                                                            @endif
                                                        </h3>
		                                                <h5>Expiry</h5>
		                                            </li>
		                                            <li>
		                                                <h3 class="counter-value">{{ count($job->project_proposals) }}</h3>
		                                                <h5>Proposals</h5>
		                                            </li>
		                                            <li>
		                                                <h3 class="counter-value"><span class="jobtype">{{ $job->job_type }}</span></h3>
		                                                <h5>Job Type</h5>
		                                            </li>
		                                        </ul>
		                                    </div>
		                                </div>
										<div class="cart-hover">
											<a href="{{ route('jobs.show',$job->id) }}" class="btn-cart" tabindex="-1">Bid Now</a>
										</div>
		                            </div>
								</div>

                                @endforeach

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
									<h3>{{ __('Please login to Favourite Project') }}</h3>
								</div>
								<div class="submit-section text-center">
									<a  data-dismiss="modal" href="#" class="btn btn-primary black-btn click-btn">{{ __('Cancel') }}</a>
									<button type="submit" class="btn btn-primary click-btn">{{ __('Submit') }}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
@endsection
