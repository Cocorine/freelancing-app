<?php $page = 'dashboard'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

    <div class="page-title">
        <h3>Manage Projects</h3>
    </div>

    @include('livewire.backend.projects.partials.nav')

    <!-- project list -->
    <div class="my-projects-list">
        <div class="row">
            <div class="col-lg-12 flex-wrap">
                <div class="projects-cancelled-card flex-fill">
                    <div class="card-body">
                        <div class="projects-details align-items-center">
                            <div class="project-info project">
                                <span>Dreamguystech</span>
                                <h2>Website Designer Required For Directory Theme</h2>
                                <div class="proposal-client">
                                    <h4 class="title-info">Client Price</h4>
                                    <div class="d-flex">
                                        <h3 class="client-price mr-2">$599.00</h3>
                                        <p class="amnt-type">( FIXED )</p>
                                    </div>
                                </div>
                            </div>
                            <div class="project-hire-info project">
                                <div class="content-divider"></div>
                                <div class="proposer-info project">
                                    <div class="proposer-img">
                                        <img src="assets/img/developer/developer-01.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="proposer-detail">
                                        <h4>Hannah Finn</h4>
                                        <ul class="proposal-details">
                                            <li> October 15, 2021</li>
                                            <li><i class="fas fa-star text-primary"></i> 4 Reviews</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center project">
                                    <a href="#" class="projects-btn">Remove Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /project list -->

    <!-- project list -->
    <div class="my-projects-list">
        <div class="row">
            <div class="col-lg-12 flex-wrap">
                <div class="projects-cancelled-card flex-fill">
                    <div class="card-body">
                        <div class="projects-details align-items-center">
                            <div class="project-info project">
                                <span>Dreamguystech</span>
                                <h2>PHP Laravel Developer Required (Contractual Employement)</h2>
                                <div class="proposal-client">
                                    <h4 class="title-info">Client Price</h4>
                                    <div class="d-flex">
                                        <h3 class="client-price mr-2">$350.00</h3>
                                        <p class="amnt-type">( FIXED )</p>
                                    </div>
                                </div>
                            </div>
                            <div class="project-hire-info project">
                                <div class="content-divider"></div>
                                <div class="proposer-info project">
                                    <div class="proposer-img">
                                        <img src="assets/img/developer/developer-02.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="proposer-detail">
                                        <h4>James Douglas</h4>
                                        <ul class="proposal-details">
                                            <li> October 20, 2021</li>
                                            <li><i class="fas fa-star text-primary"></i> 4 Reviews</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center project">
                                    <a href="#" class="projects-btn">Remove Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /project list -->

    <!-- project list -->
    <div class="my-projects-list">
        <div class="row">
            <div class="col-lg-12 flex-wrap">
                <div class="projects-cancelled-card flex-fill">
                    <div class="card-body">
                        <div class="projects-details align-items-center">
                            <div class="project-info project">
                                <span>Dreamguystech</span>
                                <h2>Laravel Backend Developer to finish ongoing project</h2>
                                <div class="proposal-client">
                                    <h4 class="title-info">Client Price</h4>
                                    <div class="d-flex">
                                        <h3 class="client-price mr-2">$500.00</h3>
                                        <p class="amnt-type">( FIXED )</p>
                                    </div>
                                </div>
                            </div>
                            <div class="project-hire-info project">
                                <div class="content-divider"></div>
                                <div class="proposer-info project">
                                    <div class="proposer-img">
                                        <img src="assets/img/developer/developer-03.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="proposer-detail">
                                        <h4>Tony Ingle</h4>
                                        <ul class="proposal-details">
                                            <li> October 26, 2021</li>
                                            <li><i class="fas fa-star text-primary"></i> 4 Reviews</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center project">
                                    <a href="#" class="projects-btn">Remove Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /project list -->

    <!-- pagination -->
    <div class="row">
        <div class="col-md-12">
            <ul class="paginations freelancer">
                <li><a href="#"> <i class="fas fa-angle-left"></i> Previous</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- /pagination -->

@endsection

@push('dash-js')

@endpush
