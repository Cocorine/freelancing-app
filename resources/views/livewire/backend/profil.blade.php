@extends('layouts.index')

@push('css')

<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Bootstrap Tag CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

<!-- Summernote CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

@stack('dash-css')

<style>
    .footer {
        display: none;
    }

</style>



@endpush

@section('app-content')

@include('livewire.frontend.layouts.partials.header')

{{-- <div class="breadcrumb-bar"></div>

<div class="content" style="transform: none; min-height: 17px;">
    <div class="container" style="transform: none;">
        <div class="row">
            <div class="col-md-12">
                <div class="profile">
                    <div class="profile-box">
                        <div class="provider-widget">
                            <div class="pro-info-left">
                                <div class="provider-img"><img src="assets/img/img-01.png" alt="User"></div>
                                <div class="profile-info">
                                    <h2 class="profile-title">David Peterson</h2>
                                    <p class="profile-position">iOS Expert</p>
                                    <div><a href="#" class="btn full-btn">Full time</a></div>
                                    <ul class="profile-preword">
                                        <li><img src="assets/img/flags/pl.png" alt="" height="16"> Poland</li>
                                        <li>
                                            <div class="rating">
                                                <span class="average-rating">4.6</span>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-info-right profile-inf">
                                <a class="btn profile-edit-btn" href="{{ route('backend.account',$user['id']) }}.html">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-list">
                        <ul>
                            <li>
                                <span class="cont bg-blue">22</span>
                                <strong class="proj-title"> Completed Projects</strong>
                            </li>
                            <li>
                                <span class="cont bg-red">5</span>
                                <strong class="proj-title"> Ongoing Projects</strong>
                            </li>
                            <li>
                                <span class="cont bg-violet">89%</span>
                                <strong class="proj-title"> Recommended</strong>
                            </li>
                            <li>
                                <span class="cont bg-yellow">12</span>
                                <strong class="proj-title"> Rehired</strong>
                            </li>
                            <li>
                                <span class="cont bg-pink">48</span>
                                <strong class="proj-title"> Clients</strong>
                            </li>
                            <li>
                                <span class="cont bg-navy">5</span>
                                <strong class="proj-title"> Feedbacks</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="transform: none;">
            <div class="col-lg-8 col-md-12">
                <div class="pro-view">

                    <!-- Tab Detail -->
                    <nav class="provider-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" href="#overview">
                                    <img src="assets/img/icon/tab-icon-01.png" height="25" alt="User Image">
                                    <p class="bg-red">Overview</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#project">
                                    <img src="assets/img/icon/tab-icon-02.png" height="25" alt="User Image">
                                    <p class="bg-blue">Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#experience">
                                    <img src="assets/img/icon/tab-icon-03.png" height="25" alt="User Image">
                                    <p class="bg-violet">Experience</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#education">
                                    <img src="assets/img/icon/tab-icon-04.png" height="25" alt="User Image">
                                    <p class="bg-yellow">Education</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#skill">
                                    <img src="assets/img/icon/tab-icon-05.png" height="25" alt="User Image">
                                    <p class="bg-pink">Skills</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#feedback">
                                    <img src="assets/img/icon/tab-icon-06.png" height="25" alt="User Image">
                                    <p class="bg-green">Feedbacks</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Detail -->

                    <!-- Overview Tab Content -->
                    <div class="pro-post widget-box" id="overview">
                        <h3 class="pro-title">Overview</h3>
                        <div class="pro-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus.</p>
                            <div class="mt-4">
                                <h4 class="widget-title">My services include:</h4>
                                <ul class="pro-list">
                                    <li>Cross-platform games</li>
                                    <li>Game concept and level designing</li>
                                    <li>Multiplayer integration</li>
                                    <li>Re-skin</li>
                                    <li>Ads and in-app purchase (Maximize your Revenue)</li>
                                    <li>Game Optimisations</li>
                                    <li>2D/3D Animation</li>
                                </ul>
                            </div>
                            <p>Graphic DesigningSocial Network IntegrationVirtual Reality (VR)Augmented Reality (AR)Game con promotional graphics and video app store and Playstore publishing </p>
                        </div>
                    </div>
                    <!-- /Overview Tab Content -->

                    <!-- Experience Tab Content -->
                    <div class="pro-post project-widget widget-box" id="experience">
                        <h3 class="pro-title">Experience</h3>
                        <div class="pro-content">
                            <div class="widget-list mb-0">
                                <ul class="clearfix">
                                    <li>
                                        <h4>Logo Designer</h4>
                                        <h5>Techline July 9, 2018 - March 18, 2021</h5>
                                        <p>I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                    </li>
                                    <li>
                                        <h4>Logo Designer</h4>
                                        <h5>Techline July 9, 2018 - March 18, 2021</h5>
                                        <p>I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                    </li>
                                    <li>
                                        <h4>Logo Designer</h4>
                                        <h5>Techline July 9, 2018 - March 18, 2021</h5>
                                        <p>I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Experience Tab Content -->

                    <!-- Educational Tab Content -->
                    <div class="pro-post project-widget widget-box" id="education">
                        <h3 class="pro-title">Educational Details</h3>
                        <div class="pro-content">
                            <div class="widget-list mb-0">
                                <ul class="clearfix">
                                    <li>
                                        <h4>Bachelor of Science in Game Programming &amp; Development</h4>
                                        <h5>Hampshire University January 12, 2015 - January 19, 2019</h5>
                                        <p>Graphic Designing artworks through making plans and utilizing the helpful analysis of companions, educators, and bosses to improve those plans. Careful discipline brings about promising results, and the capacity to acknowledge and gain from analysis from peers and even the purchaser everywhere is pivotal for accomplishment in this field.</p>
                                    </li>
                                    <li>
                                        <h4>Master in Gaming STudi Design</h4>
                                        <h5>Techline July 9, 2018 - March 18, 2021</h5>
                                        <p>I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Educational Tab Content -->

                    <!-- Technical Tab Content -->
                    <div class="pro-post project-widget widget-box" id="skill">
                        <h3 class="pro-title">Technical Skills</h3>
                        <div class="pro-content">
                            <div class="tags">
                                <span class="badge badge-pill badge-skills">+ Web Design</span>
                                <span class="badge badge-pill badge-skills">+ UI Design</span>
                                <span class="badge badge-pill badge-skills">+ Node Js</span>
                                <span class="badge badge-pill badge-skills">+ Javascript</span>
                            </div>
                        </div>
                    </div>
                    <!-- /Technical Tab Content -->

                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">







                <!-- Categories -->

                <!-- /Categories -->

                <!-- Link Widget -->

                <!-- /Link Widget -->

                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="pro-post widget-box follow-widget">
                        <a href="#" class="btn follow-btn">+ Follow</a>
                        <ul class="follow-posts pro-post">
                            <li>
                                <p>Following</p>
                                <h6>49</h6>
                            </li>
                            <li>
                                <p>Followers</p>
                                <h6>422</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-post widget-box language-widget">
                        <h4 class="pro-title">LANGUAGE SKILLS</h4>
                        <ul class="latest-posts pro-content pt-0">
                            <li>
                                <p>English</p>
                                <div class="progress progress-md mb-0">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li>
                                <p>Russian</p>
                                <div class="progress progress-md mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li>
                                <p>German</p>
                                <div class="progress progress-md mb-0">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-post widget-box about-widget">
                        <h4 class="pro-title mb-0">ABOUT ME</h4>
                        <ul class="latest-posts pro-content">
                            <li>
                                <p>Gender</p>
                                <h6>Male</h6>
                            </li>
                            <li>
                                <p>Experience</p>
                                <h6>5 Years</h6>
                            </li>
                            <li>
                                <p>Location</p>
                                <h6>Istanbul/Turkey</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-post category-widget">
                        <div class="widget-title-box">
                            <h4 class="pro-title">SOCIAL LINKS</h4>
                        </div>
                        <ul class="latest-posts pro-content">
                            <li><a href="#">http://www.facebook.com/john...</a></li>
                            <li><a href="#">http://www.Twitter.com/john...</a></li>
                            <li><a href="#">Http://www.googleplus.com/john... </a></li>
                            <li><a href="#"> Http://www.behance.com/john...</a></li>
                            <li><a href="#"> Http://www.pinterest.com/john...</a></li>
                        </ul>
                    </div>
                    <div class="pro-post widget-box post-widget">
                        <h3 class="pro-title">Profile Link</h3>
                        <div class="pro-content">
                            <div class="form-group profile-group mb-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="https://www.kofejob.com/developer/daren/12454687">
                                    <div class="input-group-append">
                                        <button class="btn btn-success sub-btn" type="submit"><i class="fa fa-clone"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 438px; height: 1893px;"></div>
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
</div> --}}



<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="inner-content">
                    <label class="file-upload image-btn">
                        Change Image <input type="file">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- User Profile Details -->
                <div class="profile">
                    <div class="profile-box">
                        <div class="provider-widget">
                            <div class="pro-info-left">
                                <div class="provider-img">
                                    <img src="{{ asset('assets/img/img-04.jpg') }}" alt="User">
                                    <div class="camera-bg"><i class="fa fa-camera"></i></div>
                                </div>
                                <div class="profile-info profile-edit-form">
                                    <h2 class="profile-title">{{ str_replace('\\', '', optional($user)->nom) }} {{ str_replace('\\', '', optional($user)->prenom) }}</h2>
                                    <div class="pro-text3">
                                        <p class="profile-position">{{ str_replace('\\', '', optional($user)->profil) }} </p>
                                        <div><a href="#" class="btn full-btn">{{ str_replace('\\', '', optional($user)->price_type) }}</a></div>
                                        <ul class="profile-preword">
                                            <li><i class="fas fa-map-marker-alt mr-1"></i> {{optional(optional($user)->location)->country}}</li>
                                            <li><div class="rating">
                                                <span class="average-rating">4.6</span>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                            </div></li>
                                        </ul>
                                    </div>
                                    <div class="pro-new3">
                                        <div class="row">
                                            <div class="col-12">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Professional Headline</label>
                                                            <input type="text" class="form-control" placeholder="IOS Developer">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Select  Work type</label>
                                                            <select class="form-control select">
                                                                <option>Select woktype</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Professional Headline</label>
                                                            <input type="text" class="form-control" placeholder="IOS Developer">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Hourly Rate</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">$</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Username">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">USD / HR</span>
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Select Country</label>
                                                            <select class="form-control select">
                                                                <option>-</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label></label>
                                                            <div class=" submit-profile-sec">
                                                                <a href="#" class="btn btn-primary profile-update-btn">Update</a>
                                                                <a href="javascript:void(0);" class="btn btn-light profile-cancel-btn">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-info-right profile-inf">
                                @if(auth()->user()->isFreelancer())
                                <a class="btn profile-edit-btn" href="javascript:void(0)">Edit Profile</a>
                                @elseif(auth()->user()->isCompagny())
                                {{-- <a href="javascript:void(0);" id="edit_name" class="sub-title edit-sub-title"><i class="fa fa-pencil-alt mr-1"></i></a> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="profile-list">
                        <ul>
                            <li>
                                <span class="cont bg-blue">22</span>
                                <strong class="proj-title"> Completed Projects</strong>
                            </li>
                            <li>
                                <span class="cont bg-red">5</span>
                                <strong class="proj-title"> Ongoing Projects</strong>
                            </li>
                            <li>
                                <span class="cont bg-violet">89%</span>
                                <strong class="proj-title"> Recommended</strong>
                            </li>
                            <li>
                                <span class="cont bg-yellow">12</span>
                                <strong class="proj-title"> Rehired</strong>
                            </li>
                            <li>
                                <span class="cont bg-pink">48</span>
                                <strong class="proj-title"> Clients</strong>
                            </li>
                            <li>
                                <span class="cont bg-navy">5</span>
                                <strong class="proj-title"> Feedbacks</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /User Profile Details -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12">

                <div class="pro-view">
                    <!-- Tab Heading -->
                    <nav class="provider-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#overview" data-toggle="tab">
                                    <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/icon/tab-icon-01.png') }}">
                                    <p class="bg-red">Overview</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bids" data-toggle="tab">
                                    <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/icon/tab-icon-02.png') }}">
                                    <p class="bg-blue">Bids</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#jobs" data-toggle="tab">
                                    <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/icon/tab-icon-05.png') }}">
                                    <p class="bg-pink">Jobs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#portfolio" data-toggle="tab">
                                    <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/icon/tab-icon-07.png') }}">
                                    <p class="bg-yellow">Portfolio</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#feedbacks" data-toggle="tab">
                                    <img alt="User Image" height="28" src="assets/img/icon/tab-icon-06.png">
                                    <p class="bg-green">Feedbacks</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#payments" data-toggle="tab">
                                    <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/icon/tab-icon-08.png') }}">
                                    <p class="bg-violet">Payments</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Heading -->

                    <!-- Tab Details -->
                    <div class="tab-content pt-0">

                    <!-- Overview Tab Content -->
                    <div role="tabpanel" id="overview" class="tab-pane fade show active">
                    <div class="pro-post widget-box">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="pro-title">Overview</h3>
                            </div>
                            <div class="col-2 text-right">
                                <a href="javascript:void(0);"{{--  id="edit_overview"  --}}class="sub-title edit-sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                            </div>
                        </div>
                        <div class="pro-overview">
                            <div class="pro-content">
                                <div class="pro-text1">
                                    {!! str_replace('\\', '', optional($user)->profil_description) !!}
                                </div>
                                <div class="pro-new1">
                                    <div class="pro-edit scrollable" contentEditable="true">

                                        {!! str_replace('\\', '', optional($user)->profil_description) !!}
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <a href="#" class="btn btn-primary profile-update-btn">Update</a>
                                                <a href="#" class="btn btn-light profile-cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="pro-post project-widget widget-box">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="pro-title">Experience</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="javascript:void(0);" class="sub-title mr-2"><i class="fa fa-plus mr-1"></i> Add Experience</a>
                                <a href="javascript:void(0);"{{--  id="edit_experiance"  --}}class="sub-title edit-sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="widget-list mb-0 profile-edit-form">

                                <ul class="clearfix pro-text">
                                    @foreach(optional($user)->user_experiences as $key => $experience)
                                    <li>
                                        <h4>{{ str_replace('\\', '', optional($experience)->name) }}</h4>
                                        <h5>{{ str_replace('\\', '', optional($experience)->compagny) }} {{ $experience['start-at'] }} {{-- {{ \Carbon\Carbon::parse($experience['start-at'])->isoFormat('MMMM d, Y') }} - {{ \Carbon\Carbon::parse($experience['end-at'])->isoFormat('MMMM d, Y') }} --}}</h5>

                                        <p>{!! str_replace('\\', '', optional($experience)->description) !!}</p>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="pro-overview pro-new">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Position ot title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Company name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Start</label>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <select class="form-control select">
                                                            <option>Select</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control select col-md-6">
                                                            <option>Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>End</label>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <select class="form-control select">
                                                            <option>Select</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control select col-md-6">
                                                            <option>Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            I'm currently working here
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Select</label>
                                            <textarea rows="6" class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <a href="#" class="btn btn-primary profile-update-btn">Update</a>
                                                <a href="javascript:void(0);" class="btn btn-light profile-cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Experience -->

                    <!-- Educational -->
                    <div class="pro-post project-widget widget-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="pro-title">Educational Details</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="javascript:void(0);" class="sub-title mr-2"><i class="fa fa-plus mr-1"></i> Add Education</a>
                                <a href="javascript:void(0);" {{-- id="edit_education"  --}}class="sub-title edit-sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="widget-list mb-0">
                                <div class="pro-text2">
                                    <ul class="clearfix">
                                        @foreach(optional($user)->user_educations as $key => $education)
                                            <li>
                                                <h4>{{ str_replace('\\', '', optional($education)->degree) }}</h4>
                                                <h5>{{ str_replace('\\', '', optional($education)->school) }} {{ \Carbon\Carbon::parse($education['start-at'])->isoFormat('MMMM d, Y') }} - {{ \Carbon\Carbon::parse($education['end-at'])->isoFormat('MMMM d, Y') }}</h5>
                                                <p>{!! str_replace('\\', '', optional($education)->description) !!}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="pro-overview profile-edit-form pro-new2">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Country</label>
                                                <select class="form-control select">
                                                    <option>Select Country</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>University/College</label>
                                                <select class="form-control select">
                                                    <option>Select University/College </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Start year</label>
                                                <select class="form-control select">
                                                    <option>-</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>End year</label>
                                                <select class="form-control select">
                                                    <option>-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input type="text" name="degree" class="form-control" placeholder="Enter Degree">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <a href="#" class="btn btn-primary profile-update-btn">Update</a>
                                                <a href="javascript:void(0);" class="btn btn-light profile-cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Educational -->

                    <!-- Skills -->
                    <div class="pro-post project-widget widget-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="pro-title">Technical Skills</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="javascript:void(0);"{{--  data-toggle="modal" data-target="#add-skills"  --}}class="sub-title mr-2"><i class="fa fa-plus mr-1"></i> Add Skills</a>
                                <a href="javascript:void(0);" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="tags">
                                @foreach(optional($user)->skills as $key => $skill)
                                    <span class="badge badge-pill badge-skills">+ {{ $skill['name'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Skills -->

                </div>
                <!-- /Overview Tab Content -->

                <!-- Bids Tab Content -->
                <div role="tabpanel" id="bids" class="tab-pane fade">
                    <div class="pro-post project-widget widget-box">
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#manage_bids" data-toggle="tab">Manage Bids</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#manage_bidders" data-toggle="tab">Manage Bidders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#active_bids" data-toggle="tab">My Active Bids</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Bids Tab Details -->
                        <div class="tab-content pt-0">

                        <!-- Manage Bids Tab Content -->
                        <div role="tabpanel" id="manage_bids" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Manage Bids Tab Content -->

                        <!-- Manage Bidders Tab Content -->
                        <div role="tabpanel" id="manage_bidders" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Manage Bidders Tab Content -->

                        <!-- Active Bids Tab Content -->
                        <div role="tabpanel" id="active_bids" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Active Bids Tab Content -->

                        </div>
                    </div>
                </div>

                <!-- Jobs Tab Content -->
                <div role="tabpanel" id="jobs" class="tab-pane fade">
                    <div class="pro-post project-widget widget-box">
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#manage_jobs" data-toggle="tab">Manage Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#saved_jobs" data-toggle="tab">Saved Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#applied_jobs" data-toggle="tab">Applied Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#applied_candidates" data-toggle="tab">Applied Candidates</a>
                                </li>
                            </ul>
                        </nav>

                        <div class="tab-content pt-0">
                        <!-- Manage Jobs Tab Content -->
                        <div role="tabpanel" id="manage_jobs" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Manage Jobs Tab Content -->

                        <!-- Saved Jobs Tab Content -->
                        <div role="tabpanel" id="saved_jobs" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Saved Jobs Tab Content -->

                        <!-- Applied Jobs Tab Content -->
                        <div role="tabpanel" id="applied_jobs" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Applied Jobs Tab Content -->

                        <!-- Applied Candidates Tab Content -->
                        <div role="tabpanel" id="applied_candidates" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$40-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">4 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">15</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-2.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Park INC <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">PHP Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>California, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$30-$300</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">5 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">22</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">

                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-3.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Tech Zone <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">Graphic Designer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 30 mins ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>New York, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$15-$500</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">8 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">30</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-4.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">ABC Software <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">iOS Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 day ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Florida, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$25-$250</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">1 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">16</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="freelance-widget widget-author">
                                        <div class="freelance-content">
                                        <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="assets/img/company/img-5.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Host Technologies <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">SEO Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 3 days ago</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt mr-1"></i>Texas, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                            <div class="freelancers-price">$50-$700</div>
                                        </div>
                                        <div class="counter-stats">
                                                <ul>
                                                    <li>
                                                        <h3 class="counter-value">10 Days Left</h3>
                                                        <h5>Expiry</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value">25</h3>
                                                        <h5>Proposals</h5>
                                                    </li>
                                                    <li>
                                                        <h3 class="counter-value"><span class="jobtype">Full Time</span></h3>
                                                        <h5>Job Type</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="project-details" class="btn-cart" tabindex="-1">Bid Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Applied Candidates Tab Content -->


                    </div>
                    </div>
                </div>
                <!-- /Job Tab Content -->

                <!-- Portfolio Tab Content -->
                <div role="tabpanel" id="portfolio" class="tab-pane fade">
                    <div class="pro-post project-widget widget-box">
                        <h3 class="pro-title">Portfolio</h3>
                        <div class="pro-content">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-1.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-2.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-3.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-4.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-5.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-6.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-7.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-2.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-3.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-5.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="project-widget">
                                        <div class="pro-image">
                                            <a href="project-details">
                                                <img class="img-fluid" alt="User Image" src="{{ asset('assets/img/project-6.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="pro-detail">
                                            <h3 class="pro-name">
                                                <a href="project-details">Project name</a>
                                            </h3>
                                            <p class="pro-designation">Web design</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Tab Content -->

                <!-- Feedback Tab Content -->
                <div role="tabpanel" id="feedbacks" class="tab-pane fade">
                    <div class="pro-post project-widget widget-box">
                        <h3 class="pro-title mb-3">Feedbacks</h3>

                        <div class="pro-post mt-4">
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="review"><img class="img-fluid" alt="" src="assets/img/img-01.png"></a>
                                </div>
                            </div>
                            <div class="author-details">
                                <a href="review" class="blog-author-name">Logo Designer</a>
                                <h5>Techline  Oct 25, 2021 - Nov 18, 2021</h5>
                                <p class="mb-0">I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                            </div>
                        </div>
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="review"><img class="img-fluid" alt="" src="assets/img/img-02.jpg"></a>
                                </div>
                            </div>
                            <div class="author-details">
                                <a href="review" class="blog-author-name">Logo Designer</a>
                                <h5>Techline  Oct 12, 2021 - Nov 18, 2021</h5>
                                <p class="mb-0">I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                            </div>
                        </div>
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="review"><img class="img-fluid" alt="" src="assets/img/img-03.jpg"></a>
                                </div>
                            </div>
                            <div class="author-details">
                                <a href="#" class="blog-author-name">Logo Designer</a>
                                <h5>Techline  Oct 18, 2021 - Nov 22, 2021</h5>
                            </div>

                            <div class="form-group reply-group mt-5 mb-0">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="Reply">
                                <div class="input-group-append">
                                    <button class="btn btn-success sub-btn" type="submit">SEND</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Feedback Tab Content -->

                <!-- Payment Tab Content -->
                <div role="tabpanel" id="payments" class="tab-pane fade">
                    <div class="pro-post project-widget">
                        <div class="widget-title-box ">
                            <h3 class="pro-title mb-3">PAYMENTS</h3>
                        </div>
                        <div class="widget-box">
                        <div class="pro-post billing-method">
                            <p class="mb-0">Add Billing Method <a href="javascript:void(0);" class="add-bill float-right"><i class="fa fa-plus-circle orange-text"></i></a></p>
                        </div>
                        <h4 class="pb-2">PAYMENT ACTIVITY</h4>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="pro-post payment-detail">
                                    <img class="img-fluid" alt="" src="assets/img/icon/pay-icon-01.png">
                                    <h2 class="bg-blue">$4,745</h2>
                                    <p>Total Income</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="pro-post payment-detail">
                                    <img class="img-fluid" alt="" src="assets/img/icon/pay-icon-02.png">
                                    <h2 class="bg-pink">$4,450</h2>
                                    <p>Withdrawn</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="pro-post payment-detail">
                                    <img class="img-fluid" alt="" src="assets/img/icon/pay-icon-03.png">
                                    <h2 class="bg-yellow">$1,145</h2>
                                    <p>Sent</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="transaction">
                            <img class="img-fluid" alt="" src="assets/img/icon/redeem-icon.png">
                            <h5>All your transactions are saved here.</h5>
                            <a href="#" class="btn-primary click-btn">Click Here </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <p class="mb-0">With workwise payment protection , only pay for work delivered</p>
                        </div>
                        <div class="card-body">
                            <div class="payment-list">
                                <h3>Add Billing Method</h3>
                                <label class="payment-radio credit-card-option mb-3">
                                    <input type="radio" name="radio" checked="">
                                    <span class="checkmark"></span>
                                    Credit or Debit Cards
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="card_number">Card Number</label>
                                            <input class="form-control" id="card_number" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" id="first_name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" id="last_name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Expires on</label>
                                            <input class="form-control" id="expiry_on" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="cvv">CVV (Security Code) </label>
                                            <input class="form-control" id="cvv" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-8 btn-pad">
                                        <a href="#" class="btn-primary click-btn">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <label class="payment-radio credit-card-option">
                                <input type="radio" name="paypal" checked="">
                                <span class="checkmark"></span>
                                Add Paypal Account
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Payment Tab Content -->

                </div>
                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">
                <!-- Verifications -->
                <div class="pro-post widget-box about-widget">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="pro-title">Verifications</h4>
                        </div>
                    </div>
                    <ul class="latest-posts pro-content">
                        <li class="border-bottom-0">
                            <span><i class="fas fa-check-circle text-success mr-4 f-20"></i></span>
                            <span><b>Identity Verified</b></span>
                            <span class="float-right text-success">Verified</span>
                        </li>
                        <li class="border-bottom-0">
                            <span><i class="fas fa-check-circle text-success mr-4 f-20"></i></span>
                            <span><b> Payment Verified</b></span>
                            <span class="float-right text-success">Verified</span>
                        </li>
                        <li class="border-bottom-0">
                            <span><i class="fas fa-check-circle text-success mr-4 f-20"></i></span>
                            <span><b> Phone Verified</b></span>
                            <span class="float-right text-success">Verified</span>
                        </li>
                        <li class="border-bottom-0">
                            <span><i class="fas fa-times-circle text-danger mr-4 f-20"></i></span>
                            <span><b>Email Verified</b></span>
                            <span class="float-right text-danger">Verify Now</span>
                        </li>
                    </ul>
                </div>
                <!-- /Verifications -->

                <!-- Follow Widget -->
                <div class="pro-post">
                    <div class="follow-widget">
                        <div class="text-right custom-edit-btn">
                            <a href="{{ route('backend.account',$user['id']) }}" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                        </div>
                        <a href="#" class="btn follow-btn">+ Follow</a>
                        <ul class="follow-posts pro-post">
                            <li><p>Following</p><h6>49</h6></li>
                            <li><p>Followers</p><h6>422</h6></li>
                        </ul>
                    </div>
                </div>
                <!-- /Follow Widget -->

                <!-- Language Widget -->
                <div class="pro-post widget-box language-widget">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="pro-title mb-0">Language Skills</h4>
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{ route('backend.account',$user['id']) }}" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                        </div>
                    </div>
                    <ul class="latest-posts pro-content">
                        @foreach($user_langues as $key => $user_langue)

                        <li><p>{{ $user_langue['langue'] }}</p>
                            <div class="progress progress-md mb-0">
                                <div class="progress-bar" role="progressbar" style="width: {{ $user_langue['level'] }} %" aria-valuenow="{{ $user_langue['level'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /Language Widget -->

                <!-- About Widget -->
                <div class="pro-post widget-box about-widget">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="pro-title mb-0">ABOUT ME</h4>
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{ route('backend.account',$user['id']) }}" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                        </div>
                    </div>
                    <ul class="latest-posts pro-content pt-0">
                        <li><p>Gender</p><h6>{{ $user['gender'] == 'm' ? "Male" : 'Female'}}</h6></li>
                        <li><p>Experience</p><h6>{{  $user['experience']  }} Years</h6></li>
                        <li><p>Location</p><h6>Istanbul/Turkey</h6></li>
                    </ul>
                </div>
                <!-- /About Widget -->

                <!-- Categories -->
                <div class="pro-post category-widget">
                    <div class="widget-title-box">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="pro-title">SOCIAL LINKS</h3>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('backend.account',$user['id']) }}" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="latest-posts pro-content">
                        <li><a href="#">{{ optional(optional($user)->fb_link)->url }}</a></li>
                        <li><a href="#">{{ optional(optional($user)->tw_link)->url }}</a></li>
                        <li><a href="#">{{ optional(optional($user)->linkedin_link)->url }}</a></li>
                        <li><a href="#">{{ optional(optional($user)->be_link)->url }}</a></li>
                        <li><a href="#">{{ optional(optional($user)->dribble_link)->url }}</a></li>
                    </ul>
                </div>
                <!-- /Categories -->

                <!-- LInk Widget -->
                <div class="pro-post widget-box post-widget">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="pro-title">Profile Link</h3>
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{ route('backend.account',$user['id']) }}" class="sub-title"><i class="fa fa-pencil-alt mr-1"></i></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <div class="form-group profile-group mb-0">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ optional(optional($user)->personal_link)->url }}">
                            <div class="input-group-append">
                                <button class="btn btn-success sub-btn" type="submit"><i class="fa fa-clone"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /Link Widget -->

                <!-- Share Widget -->
                <div class="pro-post widget-box post-widget">
                    <h3 class="pro-title">Share</h3>
                    <div class="pro-content">
                        <a href="#" class="share-icon"><i class="fas fa-share-alt"></i> Share</a>
                    </div>
                </div>
                <!-- /Share Widget -->
            </div>
            <!-- /Blog Sidebar -->

        </div>
    </div>
</div>
<!-- /Page Content -->


</div>
<!-- /Main Wrapper -->
<!-- add skills Modal -->
<div class="modal fade add-skills" id="add-skills" data-backdrop="static" tabindex="-1">
<div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <img src="assets/img/logo-01.png" alt="" class="img-fluid mb-3">
            <h3 class="modal-title text-center">Select your skills and expertise</h3>
        </div>
        <div class="modal-body profile-edit-form">
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group profile-group mb-2">
                            <label>Select your skills and expertise</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search project">
                                <div class="input-group-append">
                                    <button type="submit" class="bg-none"><i class="fa fa-search orange-text mr-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-text" data-content="or">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4 class="card-title text-white">Select A Category</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="nav flex-column nav-pills list-group scrollable" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link list-group-item list-group-item-action active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-circle f-7 mr-2 text-primary"></i><span>Writing & Content</span> <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                                            <a class="nav-link list-group-item list-group-item-action" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-circle f-7 mr-2 text-primary"></i> Design, Media & Architecture<span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                                            <a class="nav-link list-group-item list-group-item-action" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-circle f-7 mr-2 text-primary"></i> Data Entry & Admin<span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                                            <a class="nav-link list-group-item list-group-item-action" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-circle f-7 mr-2 text-primary"></i> Engineering & Science<span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4 class="card-title text-white">Select Sub Category</h4>
                                    </div>
                                    <div class="card-body p-0 scrollable">
                                        <div class="tab-content p-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active  list-group" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i> PHP
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    HTML
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    Software Architecture
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    JavaScript
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade list-group" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i> PHP
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    HTML
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    Software Architecture
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    JavaScript
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade list-group" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i> PHP
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    HTML
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    Software Architecture
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    JavaScript
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade list-group" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i> PHP
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    HTML
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    Software Architecture
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action">
                                                    <i class="fa fa-circle f-7 mr-2 text-primary"></i>
                                                    JavaScript
                                                    <span class="ml-2 text-primary">(3729 jobs)</span>
                                                    <span class="float-right"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">1 out of 20 skills selected</h4>
                                    </div>
                                    <div class="card-body scrollable">
                                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-pill">Primary
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <a href="#" class="btn btn-primary profile-update-btn" data-dismiss="modal">Update</a>
                        <a href="#" class="btn btn-light profile-cancel-btn"  data-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /add skills Modal -->

@include('livewire.frontend.layouts.partials.footer')
@endsection

@push('js')


<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

<!-- Chart JS -->
@if(Route::is(['dashboard','freelancer-dashboard']))
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
@endif

<!-- Sticky Sidebar JS -->
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

<!-- Fancybox JS -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Range JS -->
@if(Route::is(['developer','project']))
<script src="{{ asset('assets/js/range.js') }}"></script>
@endif

<!-- Slick JS -->
<script src="{{ asset('assets/js/slick.js') }}"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/profile-settings.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        document.getElementsByTagName('body')[0].removeAttribute("class");
    });

</script>

@stack('dash-js')

@endpush
