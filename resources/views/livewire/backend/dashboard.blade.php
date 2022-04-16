<?php $page = 'dashboard'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@if(auth()->user()->isCompagny())

<div class="dashboard-sec">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Projects Posted</div>
                    <div class="dash-widget-count">{{ auth()->user()->myProjects->count() }}</div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Ongoing Projects</div>
                    <div class="dash-widget-count">{{ auth()->user()->myProjects->count() }}</div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Completed Projects</div>
                    <div class="dash-widget-count">{{ auth()->user()->myProjects->count() }}</div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Content -->
    <div class="row">
        <div class="col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Profile Views</h5>
                        <div class="dropdown">
                            <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Monthly
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chartprofile"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Static Analytics</h5>
                        <div class="dropdown">
                            <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Monthly
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chartradial"></div>
                    <ul class="static-list">
                        <li><span><i class="fas fa-circle text-violet mr-1"></i> Applied Jobs</span> <span class="sta-count">{{ auth()->user()->myProjects->count() }}</span></li>
                        <li><span><i class="fas fa-circle text-pink mr-1"></i> Active Proposals</span> <span class="sta-count">{{ auth()->user()->user_proposals->where('hire',true)->loadCount('project')->sum('project_count') }}</span></li>
                        <li><span><i class="fas fa-circle text-yellow mr-1"></i> Applied Proposals</span> <span class="sta-count">{{ auth()->user()->user_proposals->count() }}</span></li>
                        <li><span><i class="fas fa-circle text-blue mr-1"></i> Bookmarked Projects</span> <span class="sta-count">{{ auth()->user()->myProjects->count() }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Chart Content -->

    <!-- Past Earnings -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-table">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">Recently Posted Jobs</h4>
                        </div>
                        <div class="col-auto">
                            <a href="manage-projects" class="btn-right btn btn-sm fund-btn">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-job">
                        <table class="table table-hover table-center mb-0">
                            <thead class="thead-pink">
                                <tr>
                                    <th>Details</th>
                                    <th>Job Type</th>
                                    <th>Budget</th>
                                    <th>Created on</th>
                                    <th>Proposals</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->myProjects->where('hire_at',null)->sortByDesc('created_at') as $project)

                                    <tr>
                                        <td>
                                            <span class="detail-text">{{ __(str_replace('\\','',$project->name)) }}</span>
                                            <span class="d-block text-expiry">Expiring on : {{ $project->delay }}



                                            </span>
                                        </td>
                                        <td>{{ $project->job_type }}</td>
                                        <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">{{'$'.$project->min_price }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($project->created_at)->isoFormat('d MMMM, Y')}}</td>
                                        <td>{{ $project->project_proposals->count() }}</td>
                                        <td class="text-right"><a href="{{ route('backend.projects.show',$project->id) }}" class="text-success">View</a></td>
                                    </tr>

                                @endforeach

                                <tr>
                                    <td>
                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                    </td>
                                    <td>Full-Time</td>
                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                    <td>12 July, 2021</td>
                                    <td>47</td>
                                    <td class="text-right"><a href="view-project-detail" class="text-success">View</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                    </td>
                                    <td>Full-Time</td>
                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                    <td>12 July, 2021</td>
                                    <td>47</td>
                                    <td class="text-right"><a href="view-project-detail" class="text-success">View</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                    </td>
                                    <td>Full-Time</td>
                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                    <td>12 July, 2021</td>
                                    <td>47</td>
                                    <td class="text-right"><a href="view-project-detail" class="text-success">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Past Earnings -->

    <div class="row">
        <!-- Plan  Details-->
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="card-title">Membership Plan Details</h5>
                        </div>
                        <div class="col-auto">
                            <a href="javascript:void(0);" class="btn-right btn btn-sm fund-btn">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @php
                                $plan = auth()->user()->membership;
                            @endphp
                            <div class="plan-details">
                                <h4>{{ optional($plan)->plan }}</h4>
                                <div class="yr-amt">Anually Price</div>

                                <h4>{{ '$'.optional($plan)->price }}</h4>
                                <div class="yr-duration">Duration: {{ optional($plan)->periode }} One Year</div>

                                <div class="expiry">Expiry: 24 JAN 2022</div>

                                <a href="javascript:void(0)" class="btn btn-primary btn-plan">Change Plan</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="plan-feature">
                                <ul>
                                    {{-- @foreach(optional(auth()->user()->membership)->criteres as $critere)
                                        <li>{{ $critere->critere }}</li>
                                    @endforeach --}}
                                    {{ auth()->user()->membership }}
                                    <li>12 Project Credits</li>
                                    <li>10 Allowed Services</li>
                                    <li>20 Days visibility</li>
                                    <li>5 Featured Services</li>
                                    <li>20 Days visibility</li>
                                    <li>30 Days Package Expiry</li>
                                    <li>Profile Featured</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Plan  Details -->

        <!-- Notifications -->
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="card-title">Notifications</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('backend.projects.index') }}" class="btn-right btn btn-sm fund-btn">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pro-body p-0">
                    @foreach(auth()->user()->unreadNotifications as $notification)


                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-02.jpg" alt="User Image">
                        <p>{!! nl2br(e(str_replace('\\', '', $notification->data['data']))) !!} </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /Notifications -->
    </div>

</div>

@elseif(auth()->user()->isFreelancer())

<div class="dashboard-sec">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Completed Jobs</div>
                    <div class="dash-widget-count">{{ auth()->user()->user_proposals->where('hire',true)->loadCount('project',function($query){
                        $query->where('status','completed');
                    })->sum('project_count') }}</div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Task Completed</div>
                    <div class="dash-widget-count">
                        {{
                            auth()->user()->user_proposals->where('hire',true)->loadCount('project',function($query){
                                $query->where('status','completed')->loadCount('milestones','tasks');
                            })->sum('tasks_count')
                        }}
                    </div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Reviews</div>
                    <div class="dash-widget-count">25</div>
                </div>
                <div class="dash-widget-more">
                    <a href="{{ route('backend.projects.index') }}" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Content -->
    <div class="row">
        <div class="col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="pro-head">
                    <h5 class="card-title mb-0">Your Profile View</h5>
                    <div class="month-detail">
                        <select class="form-control">
                            <option value="0">Last 6 months</option>
                            <option value="1">Last 2 months</option>
                        </select>
                    </div>
                </div>
                <div class="pro-body">
                    <div id="chartprofile"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="flex-fill card">
                <div class="pro-head b-0">
                    <h5 class="card-title mb-0">Static Analytics</h5>
                </div>
                <div class="pro-body">
                    <div id="chartradial"></div>
                    <ul class="static-list">
                        <li><span><i class="fas fa-circle text-violet mr-1"></i> Applied Jobs</span> <span class="sta-count">{{ auth()->user()->myProjects->count() }}</span></li>
                        <li><span><i class="fas fa-circle text-pink mr-1"></i> Active Proposals</span> <span class="sta-count">{{ auth()->user()->user_proposals->where('hire',true)->loadCount('project')->sum('project_count') }}</span></li>
                        <li><span><i class="fas fa-circle text-yellow mr-1"></i> Applied Proposals</span> <span class="sta-count">{{ auth()->user()->user_proposals->count() }}</span></li>
                        <li><span><i class="fas fa-circle text-blue mr-1"></i> Bookmarked Projects</span> <span class="sta-count">{{ auth()->user()->myProjects->count() }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Chart Content -->

    <div class="row">
        <!-- Plan  Details-->
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="pro-head">
                    <h2>Membership Plan Details</h2>
                    <div><i class="fas fa-check-circle verified orange-text fa-2x"></i></div>
                </div>
                <div class="pro-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="plan-details">
                                <h4>The Ultima</h4>
                                <div class="yr-amt">Anually Price</div>
                                <h3>$1200</h3>
                                <div class="yr-duration">Duration: One Year</div>
                                <div class="expiry">Expiry: 24 JAN 2022</div>
                                <a href="javascript:void(0)" class="btn btn-primary btn-plan">Change Plan</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="plan-feature">
                                <ul>
                                    <li>12 Project Credits</li>
                                    <li>10 Allowed Services</li>
                                    <li>20 Days visibility</li>
                                    <li>5 Featured Services</li>
                                    <li>20 Days visibility</li>
                                    <li>30 Days Package Expiry</li>
                                    <li>Profile Featured</li>
                                </ul>
                                <a href="javascript:void(0)">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Plan  Details -->

        <!-- Ongoing Projects -->
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="pro-head">
                    <h2>Ongoing Projects</h2>
                    <a href="{{ route('backend.projects.index') }}" class="btn fund-btn">View All</a>
                </div>
                <div class="pro-body p-0">
                    <div class="on-project">
                        <h5>Web Scraping</h5>
                        <p>I need some data to be scraped from various social media....</p>
                        <div class="pro-info">
                            <ul class="list-details">
                                <li>
                                    <div class="slot">
                                        <p>Job Type</p>
                                        <h5>Hourly</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Project Price</p>
                                        <h5>$120</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Location</p>
                                        <h5>3 Received</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Expiry</p>
                                        <h5>4 Days Left</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="on-project">
                        <h5>New Service</h5>
                        <p>I need some data to be scraped from various social media....</p>
                        <div class="pro-info">
                            <ul class="list-details">
                                <li>
                                    <div class="slot">
                                        <p>Job Type</p>
                                        <h5>Hourly</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Project Price</p>
                                        <h5>$90</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Location</p>
                                        <h5>3 Received</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Expiry</p>
                                        <h5>5 Days Left</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="on-project">
                        <h5>Website Layout changes</h5>
                        <p>I need some data to be scraped from various social media....</p>
                        <div class="pro-info">
                            <ul class="list-details">
                                <li>
                                    <div class="slot">
                                        <p>Job Type</p>
                                        <h5>Hourly</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Project Price</p>
                                        <h5>$70</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Location</p>
                                        <h5>3 Received</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="slot">
                                        <p>Expiry</p>
                                        <h5>7 Days Left</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Ongoing Projects -->
    </div>

    <!-- Past Earnings -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="pro-head">
                    <h2>Past Earnings</h2>
                    <a href="javascript:void(0)" class="btn fund-btn">View All</a>
                </div>
                <div class="pro-body p-0">
                    <div class="earn-feature">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="earn-info">
                                    <p>I want some customization and installation on wordpress</p>
                                    <div class="date">October 5, 2021</div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="earn-img">
                                    <span><img src="assets/img/user/avatar-1.jpg" alt="logo" class="img-fluid avatar-md rounded-circle"> George Wells</span>
                                    <div class="price">$90</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="earn-feature">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="earn-info">
                                    <p>I want simple Joomla 4 component development </p>
                                    <div class="date">October 12, 2021</div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="earn-img">
                                    <span><img src="assets/img/user/avatar-2.jpg" alt="logo" class="img-fluid avatar-md rounded-circle"> Timothy Smith</span>
                                    <div class="price">$150</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="earn-feature">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="earn-info">
                                    <p>I want migrate Wordpress website </p>
                                    <div class="date">October 15, 2021</div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="earn-img">
                                    <span><img src="assets/img/user/avatar-3.jpg" alt="logo" class="img-fluid avatar-md rounded-circle"> Janet Paden</span>
                                    <div class="price">$70</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="earn-feature">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="earn-info">
                                    <p>I want Landing Page Redesign / Sales Page Redesign</p>
                                    <div class="date">October 20, 2021</div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="earn-img">
                                    <span><img src="assets/img/user/avatar-4.jpg" alt="logo" class="img-fluid avatar-md rounded-circle"> James Douglas</span>
                                    <div class="price">$120</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Past Earnings -->

</div>

@else

@endif

@endsection

@push('dash-js')
{{-- <script type="text/javascript">
    $(document).ready(function() {
        document.getElementsByTagName('body')[0].removeAttribute("class");
        document.getElementsByTagName('body')[0].setAttribute("class",'dashboard-page');
    });
</script> --}}

@endpush
