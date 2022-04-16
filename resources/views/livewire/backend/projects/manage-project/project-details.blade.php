@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@if(auth()->user()->isCompagny())
    <div class="page-title">
        <h3>Manage Projects</h3>
    </div>
@endif

@include('livewire.backend.projects.partials.details-nav')


<!-- project list -->
<div class="my-projects">

    <!-- project list -->

    <div class="my-projects-list pro-list-view">
        <div class="row">
            @if(!auth()->user()->isFreelancer())
            <div class="col-lg-10 flex-wrap">
                <div class="projects-card flex-fill">
                    <div class="card-body">
                        <div class="projects-details align-items-center">
                            <div class="project-info">
                                <h2>{{ str_replace('\\', '', $project->name) }}</h2>
                                <div class="customer-info">
                                    <ul class="list-details">
                                        <li>
                                            <div class="slot">
                                                <p>{{ __('Price type') }}</p>
                                                <h5>{{ $project->price_type }}</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="slot">
                                                <p>Location</p>
                                                <h5><img src="{{ asset('assets/img/en.png') }}" height="13" alt="Lang"> UK</h5>
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
                            <div class="project-hire-info">
                                <div class="content-divider"></div>
                                <div class="projects-amount">
                                    <h3>{{ '$'.$project->min_price.'.00' }}</h3>
                                    <h5>{{ __('in') }} {{ $project->duree }} </h5>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center">
                                    <a href="#" class="hired-detail">Hired on 19 JUN 2021</a>
                                    <div class="pro-status">
                                        <div class="hire-select">
                                            <select class="form-control select">
                                                <option> {{ __('Is job completed?') }} </option>
                                                <option>{{ __('Ongoing') }}</option>
                                                <option>{{ __('Completed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="col-lg-9 d-flex">
                <div class="pro-post w-100">
                    <div class="card-body">
                        <div class="projects-list">
                            <h2>{{ str_replace('\\', '', $project->name) }}</h2>
                            <ul class="prolist-details">
                                <li>
                                    <div class="list-slot">
                                        <h5>Client Final Price</h5>
                                        <p class="price">{{ '$'.$project->min_price.'.00' }}</p>
                                        <p class="mb-0">( {{ $project->price_type }} )</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-slot">
                                        <h5>Job Type</h5>
                                        <p class="red-text">{{ $project->job_type }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-slot">
                                        <h5>Location</h5>
                                        <p><img src="{{ asset('assets/img/en.png') }}" height="13" alt="Lang"> Germany</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(!auth()->user()->isFreelancer())

            @php
                $proposer = $project->project_proposals->where('hire',true)->first()->proposer;
            @endphp
                <div class="col-lg-2 d-flex flex-wrap">
                    <div class="projects-card flex-fill">
                        <div class="card-body">
                            <div class="prj-proposal-count text-center hired">
                                <img src="{{ asset(optional($proposer->profile)->url ?? 'assets/img/developer/developer-01.jpg') }}" alt="" class="img-fluid">
                                <p class="mb-2">{{ $proposer->prenom }} {{ $proposer->nom }}</p>
                                <a href="{{ route('inbox') }}" class="btn btn-chat">{{ __('Chat Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-3 mb-3 d-flex flex-wrap">
                    <div class="pro-post mb-3 w-100">
                        <div class="card-body">
                            <div class="hire-box text-center">
                                @php
                                    $client = $project->project_owner;
                                @endphp
                                <h6>Hired</h6>
                                <img alt="profile image" src="{{ asset( optional(optional($client)->profile)->url ?? 'assets/img/img-04.jpg') }}" class="avatar-lg rounded-circle">
                                <p> {{ $client->prenom }} {{ $client->nom }} - Client</p>
                                <a href="{{ route('inbox') }}" class="btn btn-chat">{{ __('Chat Now') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="hire-select w-100">
                        <select class="form-control select">
                            <option> Is job completed? </option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                        </select>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- /project list -->

</div>

<!-- Overview -->
<div class="pro-post widget-box">
    <h3 class="pro-title">Overview</h3>
    <div class="pro-overview">
        {!! $project->description !!}
    </div>
</div>
<!-- /Overview -->

<!-- Skills Required -->
<div class="pro-post widget-box">
    <h3 class="pro-title">Skills Required</h3>
    <div class="pro-content">
        <div class="tags">
            @foreach($project->skills as $key => $skill)
            <span class="badge badge-pill badge-design">{{ $skill->name }}</span>
            @endforeach
        </div>
    </div>
</div>
<!-- /Skills Required -->


@endsection

@push('dash-js')

@endpush
