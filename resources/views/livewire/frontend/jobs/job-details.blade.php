@extends('livewire.frontend.layouts.index')

@section('front-content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar"></div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div id="detailsContainer" class="content" style="transform: none; min-height: 26px;">
    <div class="container" style="transform: none;">
        <div class="row">
            <div class="col-md-12">
                <div class="profile">
                    <div class="profile-box">
                        <div class="provider-widget row">
                            <div class="pro-info-left col-md-8">
                                <div class="profile-info">
                                    <h2 class="profile-title">{{ str_replace('\\','',$job->name) }}</h2>
                                    <p class="profile-position">{{ str_replace('\\', '', optional(optional($job)->project_owner)->profil) }}</p>
                                    <div></div>
                                    <ul class="profile-preword align-items-center">
                                        <li><i class="fas fa-clock"></i> Posted {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</li>
                                        <li><a href="#" class="btn full-btn">{{ $job->job_type }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-info-right profile-inf col-md-4">
                                <ul class="profile-right">
                                    <li>

                                        <div class="amt-hr"> @if($job->price_type != 'Biding') {{ '$'.$job->min_price.'.00' }} @endif <p>( {{ $job->price_type }} )</p>
                                        </div>

                                    </li>
                                </ul>
                                <div class="d-flex align-items-center justify-content-md-end justify-content-center">
                                    <a href="javascript:void(0)"><i class="fas fa-heart heart fa-2x mr-2 orange-text"></i></a>
                                    @auth
                                        @if(!auth()->user()->user_proposals->where('project_id',intval($job->id))->first())
                                            <a data-toggle="modal" href="#app-modal" onclick="$('#app-modal-form')[0].reset();" class="btn bid-btn">Send Proposal <i class="fas fa-long-arrow-alt-right"></i></a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="transform: none;">
            <div class="col-lg-8 col-md-12">
                <div class="pro-view">
                    <!-- Job Detail -->
                    <div class="post-widget">
                        <div class="pro-content">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="pro-post job-type">
                                        <p>Job Expiry </p>
                                        <h6>

                                            @if((\Carbon\Carbon::parse($job->delay)->isPast()))
                                            {{ \Carbon\Carbon::parse($job->delay)}}
                                            @else

                                            @php
                                              $number = \Carbon\Carbon::parse($job->created_at)->diffInDays(\Carbon\Carbon::now()) ;
                                            @endphp

                                                {{ $number }} Days Left

                                            @endif

                                        </h6>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="pro-post job-type">
                                        <p>Location</p>
                                        <h6><i class="fas fa-map-marker-alt mr-1"></i>{{ optional(optional($job)->location)->country }}</h6>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="pro-post job-type">
                                        <p>Proposals</p>
                                        <h6>{{ count($job->project_proposals) }} Received</h6>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="pro-post job-type">
                                        <p>Price type</p>
                                        <h6>{{ $job->price_type }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Job Detail -->

                    <div class="pro-post widget-box exp-widget pb-0">
                        <div class="pro-content pt-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-01.png">
                                        <div class="exp-info">
                                            <p>Developer Type</p>
                                            <h5>Individual</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-02.png">
                                        <div class="exp-info">
                                            <p>Project Duration</p>
                                            <h5>{{ $job->duree }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-03.png">
                                        <div class="exp-info">
                                            <p>Level </p>
                                            <h5>{{ $job->level }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-04.png">
                                        <div class="exp-info">
                                            <p>Job Type</p>
                                            <h5>Remote Job</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-05.png">
                                        <div class="exp-info">
                                            <p>Experience</p>
                                            <h5>{{ $job->experience }} years</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="exp-detail">
                                        <img class="img-fluid" alt="" src="assets/img/icon/exp-icon-06.png">
                                        <div class="exp-info">
                                            <p>Qualifications</p>
                                            <h5>Under Garduate</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Senior Animator  -->
                    <div class="pro-post widget-box">
                        <h3 class="pro-title">Senior Animator</h3>
                        <div class="pro-content">
                            {!! $job->description !!}
                        </div>
                    </div>
                    <!-- /Senior Animator  -->

                    <!-- Job Activity  -->
                    <div class="pro-post project-widget widget-box">
                        <h3 class="pro-title">Activity of the Job</h3>
                        <div class="pro-content">
                            <div class="mb-0">
                                <ul class="activity-list clearfix">
                                    <li>Proposals: <span>Less than {{ count($job->project_proposals) }} <i class="fas fa-question-circle" data-toggle="tooltip" title="" data-original-title="Lorem Ipsum"></i></span></li>
                                    <li>Last viewed by client: <span>3 hours ago <i class="fas fa-question-circle" data-toggle="tooltip" title="" data-original-title="Lorem Ipsum"></i></span></li>
                                    <li>Interviewing: <span>1</span></li>
                                    <li>Invites sent: <span>6</span></li>
                                    <li>Unanswered invites: <span>2</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Job Activity  -->

                    <!-- Skills Required  -->
                    <div class="pro-post project-widget widget-box">
                        <h3 class="pro-title">Skills Required</h3>
                        <div class="pro-content">
                            <div class="tags">
                                @foreach($job->skills as $key => $skill)
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">{{ $skill->name }}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Skills Required  -->

                    <div class="pro-post widget-box">
                        <h3 class="pro-title">Project Proposals</h3>
                        <div class="average-bids mt-4">
                            <p><span class="text-highlight">18 proposers</span> are bidding on average <span class="text-highlight">$17.00</span> for this job</p>
                        </div>
                        <div class="proposal-cards">

                            @foreach($job->project_proposals->sortByDesc('created_at') as $project_proposal)
                                <!-- project proposal  -->
                                <div class="bids-card">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <div class="author-img-wrap">
                                                <a href="#"><img class="img-fluid" alt="" src="{{ asset(optional(optional(optional($project_proposal)->proposer)->profile)->url ?? 'assets/img/company/img-1.png') }}"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="author-detail">
                                                <h4>
                                                    <a href="{{ route('backend.profil',optional(optional($project_proposal)->proposer)->id) }}">
                                                        {{ str_replace('\\', '', optional(optional($project_proposal)->proposer)->nom) }} {{ str_replace('\\', '', optional(optional($project_proposal)->proposer)->prenom) }}
                                                    </a>
                                                    <img src="{{ asset('assets/img/flags/us.png') }}" height="16" alt="Lang">
                                                </h4>
                                                <div class="rating">
                                                    <span class="average-rating">4.3</span>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="mb-0"> {!! $project_proposal->description !!}.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="proposal-amnt text-right">
                                                <h3>{{ '$'.$project_proposal->price .'.00' }}</h3>
                                                <p class="mb-0">in {{ $project_proposal->delay }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /project proposal  -->
                            @endforeach



                        </div>
                        @if(count($job->project_proposals)>5)
                            <div class="proposal-btns mt-3">
                                <a href="{{ route('front.proposals',$job->id) }}" class="pro-btn">View all {{ count($job->project_proposals) }} Proposals</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">



                <!-- Link Widget -->

                <!-- /Link Widget -->

                <!-- Attachments Widget -->

                <!-- /Attachments Widget -->

                <!-- Share Widget -->

                <!-- /Share Widget -->

                <div class="theiaStickySidebar" style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="freelance-widget widget-author mt-2 pro-post">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="author-heading">
                                <div class="profile-img">
                                    <a href="#">
                                        <img src="{{ asset(optional(optional(optional($job)->project_owner)->profile)->url ?? 'assets/img/company/img-1.png') }}" alt="author">
                                    </a>
                                </div>
                                <div class="profile-name">
                                    <div class="author-location">{{ str_replace('\\', '', optional(optional($job)->project_owner)->nom) }} {{ str_replace('\\', '', optional(optional($job)->project_owner)->prenom) }} <i class="fas fa-check-circle text-success verified"></i></div>
                                </div>
                                <div class="freelance-info">
                                    <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>{{ optional(optional(optional($job)->project_owner)->location)->country }} {{-- Georgia, USA --}}</div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="average-rating">4.7 (32)</span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-lg btn-primary rounded-pill"><i class="fab fa-whatsapp mr-2"></i>Follow</button>
                                <div class="follow-details">
                                    <div class="row">
                                        <div class="col-6 py-4 text-center">

                                            <!-- Heading -->
                                            <h6 class="text-uppercase text-muted">
                                                Following
                                            </h6>

                                            <!-- Value -->
                                            <h4 class="mb-0">{{ optional(optional(optional($job)->project_owner)->followings)->count() ?? 0 }}</h4>

                                        </div>
                                        <div class="col-6 py-4 text-center border-start">

                                            <!-- Heading -->
                                            <h6 class="text-uppercase text-muted">
                                                Followers
                                            </h6>

                                            <!-- Value -->
                                            <h4 class="mb-0">{{ optional(optional(optional($job)->project_owner)->followers)->count() ?? 0 }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm text-left mb-0">
                                                Member Since
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm"> {{ \Carbon\Carbon::parse(optional(optional($job)->project_owner)->created_at)->isoFormat('MMMM d, Y') }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm text-left mb-0">
                                                Total Jobs
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm">{{ optional(optional($job)->project_owner)->myProjects->count() }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm text-left mb-0">
                                                <i class="fab fa-instagram mr-2"></i>Facebook
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm">{{ optional(optional(optional($job)->project_owner)->fb_link)->url }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm text-left mb-0">
                                                <i class="fab fa-linkedin mr-2"></i>LinkedIn
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm">{{ optional(optional(optional($job)->project_owner)->linkedin_link)->url }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pro-post widget-box post-widget">
                        <h3 class="pro-title">Profile Link</h3>
                        <div class="pro-content pt-0">
                            <div class="form-group profile-group mb-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ optional(optional(optional($job)->project_owner)->personal_link)->url }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-success sub-btn" type="submit"><i class="fa fa-clone"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pro-post widget-box post-widget pb-0">
                        <h3 class="pro-title">Attachments</h3>
                        <div class="pro-content">
                            <div class="row">
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>Jobs Posted</p>
                                        <h6 class="bg-red">{{ optional(optional($job)->project_owner)->myProjects->count() }}</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>Hire rate</p>
                                        <h6 class="bg-blue">22</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>open jobs</p>
                                        <h6 class="bg-violet">48</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>Total spent</p>
                                        <h6 class="bg-yellow">22</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>Hires</p>
                                        <h6 class="bg-pink">48</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pro-post client-list">
                                        <p>Active</p>
                                        <h6 class="bg-green">22</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pro-post widget-box post-widget">
                        <h3 class="pro-title">Share</h3>
                        <div class="pro-content">
                            <a href="#" class="share-icon"><i class="fas fa-share-alt"></i> Share</a>
                        </div>
                    </div>
                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 438px; height: 2083px;"></div>
                        </div>
                        <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Blog Sidebar -->

        </div>
    </div>
</div>
<!-- /Page Content -->


</div>

<!-- /Main Wrapper -->
		<!-- The Modal -->
		<div class="modal fade" id="app-modal">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">SEND PROPOSALS</h4>
						<span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
					</div>
					<div class="modal-body">
						<div class="modal-info">
							<form id="app-modal-form">
								<div class="feedback-form">
									<div class="row">
                                        <div class="col-md-6 form-group" style="display: none;">
											<input type="hidden" class="form-control" name="project_id" id="project_id" value="{{ $job->id }}" >
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
										<div class="col-md-6 form-group">
											<input type="text" class="form-control" {{-- placeholder="Your Price" --}} placeholder="20$" name="price" id="price">
                                            <small class="help-block" style="color:red; font-size:small"></small>
										</div>
										<div class="col-md-6 form-group">
											<input type="text" class="form-control" placeholder="2 weeks" name="delay" id="delay">
                                            <small class="help-block" style="color:red; font-size:small"></small>
										</div>
										<div class="col-md-12 form-group">
											<textarea rows="5" class="form-control" placeholder="Cover Letter" name="description" id="description"></textarea>
                                            <small class="help-block" style="color:red; font-size:small"></small>
										</div>
									</div>
								</div>{{--
								<div class="proposal-features">
									<div class="proposal-widget proposal-success">
										<label class="custom_check">
											<input type="checkbox" name="select_time"><span class="checkmark"></span>
											<span class="proposal-text">Stick this Proposal to the Top</span>
											<span class="proposal-text float-right">$12.00</span>
										</label>
										<p>The sticky proposal will always be displayed on top of all the proposals.</p>
									</div>
									<div class="proposal-widget proposal-light">
										<label class="custom_check">
											<input type="checkbox" name="select_time"><span class="checkmark"></span>
											<span class="proposal-text">$ Make Sealed Proposal</span>
											<span class="proposal-text float-right">$7.00</span>
										</label>
										<p>The sealed proposal will be sent to the project author only it will not be visible publically.</p>
									</div>
									<div class="proposal-widget proposal-danger">
										<label class="custom_check">
											<input type="checkbox" name="select_time"><span class="checkmark"></span>
											<span class="proposal-text">$ Make Sealed Proposal</span>
											<span class="proposal-text float-right">$15.00</span>
										</label>
										<p>The featured proposal will have a distinctive color and popped up between other proposals to get the author's attention.</p>
									</div>
								</div> --}}
							</form>

								<div class="row">
									<div class="col-md-12 submit-section">
										<label class="custom_check">
											<input type="checkbox" name="select_time">
											<span class="checkmark"></span> I agree to the Terms And Conditions
										</label>
									</div>
									<div class="col-md-12 submit-section text-right">
										<button id="app-modal-submit-btn" class="btn btn-primary submit-btn" type="submit">SUBMIT PROPOSAL</button>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
@endsection


@push('front-js')

    <script type="text/javascript">

        $(document).ready(function() {

            //SUBMIT FORM ONCLICK FUNCTION

            $('body').on('click', '#app-modal-submit-btn', function(event) {

                    //var formData =  new FormData($('#app-modal-form')[0]);

                    //Reset input errors message
                    $('input+small').text('');

                    $('input').parent().removeClass('has-error');

                    var project_id = $('#project_id').val();
                    var description = $('#description').val();
                    var delay = $('#delay').val();
                    var price = $('#price').val();


                    // send request
                    $.ajax({

                            url: "{{ route('backend.proposals.store') }}",
                            //$('#app-modal-form').attr('action'),
                            type: "POST",
                            //$('#app-modal-form').attr('method'),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                project_id:project_id,
                                description:description,
                                delay:delay,
                                price:price,
                            },
                            dataType:'json'

                        }).done(function(data) {

                            $('#app-modal').modal('hide');

                            //request is succed
                            $('.alert-success').removeClass('hidden');

                            //refresh table with new data
                            $('#detailsContainer').load(location.href + ' #detailsContainer>*', '');

                            //Hide modal

                            $('#app-modal').modal('hide');

                            alert(data.message);

                        })
                        .fail(function(data) {
                            console.log(data);

                            // set each errors message to corresponding input
                            $.each(data.responseJSON.errors, function(key, value) {

                                var input = '#app-modal input[name=' + key + ']';

                                //console.log($(input + '+small'));

                                $(input + '+small').text(value);

                                $(input).parent().addClass('has-error');

                                if(key == 'description'){

                                    $('#description' + '+small').text(value);

                                    $('#description').parent().addClass('has-error');

                                }

                            });

                        });

            });
        });

    </script>
@endpush
