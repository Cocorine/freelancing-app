<?php $page = 'dashboard'; ?>
@extends('backend.layouts.base')

@push('css')


@endpush
@section('backend-content')

<div class="dashboard-sec">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Projects Posted</div>
                    <div class="dash-widget-count">30</div>
                </div>
                <div class="dash-widget-more">
                    <a href="manage-projects" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Ongoing Projects</div>
                    <div class="dash-widget-count">5</div>
                </div>
                <div class="dash-widget-more">
                    <a href="ongoing-projects" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="dash-widget">
                <div class="dash-info">
                    <div class="dash-widget-info">Completed Projects</div>
                    <div class="dash-widget-count">25</div>
                </div>
                <div class="dash-widget-more">
                    <a href="completed-projects" class="d-flex">View Details <i class="fas fa-arrow-right ml-auto"></i></a>
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
                        <li><span><i class="fas fa-circle text-violet mr-1"></i> Applied Jobs</span> <span class="sta-count">30</span></li>
                        <li><span><i class="fas fa-circle text-pink mr-1"></i> Active Proposals</span> <span class="sta-count">30</span></li>
                        <li><span><i class="fas fa-circle text-yellow mr-1"></i> Applied Proposals</span> <span class="sta-count">30</span></li>
                        <li><span><i class="fas fa-circle text-blue mr-1"></i> Bookmarked Projects</span> <span class="sta-count">30</span></li>
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
                            <div class="plan-details">
                                <h4>The Ultima</h4>
                                <div class="yr-amt">Anually Price</div>
                                <h4>$1200</h4>
                                <div class="yr-duration">Duration: One Year</div>
                                <div class="expiry">Expiry: 24 JAN 2022</div>
                                <a href="membership-plans" class="btn btn-primary btn-plan">Change Plan</a>
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
                            <a href="freelancer-ongoing-projects" class="btn-right btn btn-sm fund-btn">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pro-body p-0">
                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-02.jpg" alt="User Image">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                    </div>
                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-03.jpg" alt="User Image">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                    </div>
                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-04.jpg" alt="User Image">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                    </div>
                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-05.jpg" alt="User Image">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                    </div>
                    <div class="news-feature">
                        <img class="avatar-sm rounded-circle" src="assets/img/img-01.png" alt="User Image">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Notifications -->
    </div>

</div>
@endsection

@push('js')


    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById("main-menu-wrapper").style.display = "none";
        });
    </script>

@endpush
