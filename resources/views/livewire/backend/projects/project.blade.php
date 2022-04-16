<?php $page = 'dashboard'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@if(auth()->user()->isCompagny())
<div class="page-title">
    <div class="row">
        <div class="col-md-6">
            <h3>Manage Projects</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('backend.projects.create') }}" class="btn btn-primary back-btn mb-4">Post a Project</a>
        </div>
    </div>
</div>
@else
<div class="page-title">
    <h3>Proposals</h3>
</div>

@endif

@include('livewire.backend.projects.partials.nav')

@foreach($projects as $key => $project)


@if(!auth()->user()->isFreelancer())

<!-- project list -->
<div class="my-projects-list">
    <div class="row">
        <div class="col-lg-10 flex-wrap">
            <div class="projects-card flex-fill">
                <div class="card-body">
                    <div class="projects-details align-items-center">
                        <div class="project-info">
                            <span>{{ str_replace('\\','',optional( $project->owner)->compagny) }}</span>
                            <h2>{{ __(str_replace('\\','',$project->name)) }}</h2>
                            <div class="customer-info">
                                <ul class="list-details">
                                    <li>
                                        <div class="slot">
                                            <p>Price type</p>
                                            <h5>{{ __($project->price_type) }}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slot">
                                            <p>Location</p>
                                            <h5><i class="fas fa-map-marker-alt mr-1"></i> {{ optional($project->location)['slug-country'] }}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slot">
                                            <p>@if((\Carbon\Carbon::parse($project->delay)->isPast())) Expired @else Expiry @endif</p>

                                            <h5>
                                                @if((\Carbon\Carbon::parse($project->delay)->isPast()))
                                                {{ \Carbon\Carbon::parse($project->delay)}}
                                                @else

                                                @php
                                                  $number = \Carbon\Carbon::parse($project->created_at)->diffInDays(\Carbon\Carbon::now()) ;
                                                @endphp

                                                    {{ $number }} Days Left

                                                @endif
                                            </h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="project-hire-info">
                            <div class="content-divider"></div>
                            <div class="projects-amount">
                                <h3> {{ '$'.$project->min_price.'.00' }} </h3>
                                <h5>in {{ __($project->duree) }}</h5>
                            </div>
                            <div class="content-divider"></div>
                            <div class="projects-action text-center">

                                @if($project->hire_at !=null)
                                <a href="{{ route('backend.projects.show',$project->id) }}" class="projects-btn">{{ __('View Details') }} </a>
                                <a href="#" class="hired-detail">Hired on {{ \Carbon\Carbon::parse($project->hire_at)->format('d M Y') }} </a>
                                @else
                                <a href="{{ route('backend.view-proposals',$project->id) }}" class="projects-btn">View Proposals </a>
                                <a href="{{ route('backend.projects.edit',$project->id) }}" class="projects-btn">{{ __('Edit Jobs') }}</a>
                                <a href="javascript:void(0);" onclick="deleteProject({{ $project }})" class="mt-1 projects-btn">{{ __('Remove Jobs') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 d-flex flex-wrap">
            <div class="projects-card flex-fill">
                <div class="card-body p-2">
                    <div class="prj-proposal-count text-center hired">
                        @if($project->hire_at != null)
                            @php
                                $proposer = $project->project_proposals->where('hire',true)->first()->proposer;
                            @endphp
                            <h3>Hired</h3>
                            <img src="{{ asset(optional($proposer->profile)->url ?? 'assets/img/developer/developer-01.jpg') }}" alt="" class="img-fluid">
                            <p class="mb-0"> {{ str_replace('\\','',$proposer->prenom) }} {{ str_replace('\\','',$proposer->nom) }}</p>
                        @else
                            <span>{{ count($project->project_proposals) }}</span>
                            <h3>{{ __('Proposals') }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /project list -->

@else

<!-- Proposals -->
<div class="freelancer-proposals">
    <div class="project-proposals align-items-center freelancer">
        <div class="proposals-info">
            <div class="proposals-detail">
                <h3 class="proposals-title">{{ str_replace('\\','',$project->project->name) }}</h3>
                <div class="proposals-content">
                    <div class="proposal-img">
                        <div class="text-md-center">
                            <img id="ProfileImage" src="{{ asset(optional(optional(optional($project)->project_owner)->profile)->url ?? 'assets/img/developer/developer-01.jpg') }}" alt="" class="img-fluid">
                            <h4>{{ str_replace('\\', '', optional(optional($project)->project_owner)->prenom) }} {{ str_replace('\\', '', optional(optional($project)->project_owner)->nom) }}</h4>
                            <span class="info-btn">client</span>
                        </div>
                    </div>
                    <div class="proposal-client">
                        <h4 class="title-info">Client Price</h4>
                        <h2 class="client-price">{{ '$'.$project->project->min_price.'.00' }}</h2>
                        <span class="price-type">( {{ $project->project->price_type }} )</span>
                    </div>
                    <div class="proposal-type">
                        <h4 class="title-info">{{ __('Job Type') }}</h4>
                        <h3>{{ $project->project->job_type }}</h3>
                    </div>
                </div>
            </div>
            <div class="project-hire-info">
                <div class="content-divider-1"></div>
                <div class="projects-amount">
                    <p>{{ __('Your Price') }}</p>
                    <h3>{{ '$'.$project->price.'.00' }}</h3>
                    <h5>in {{ $project->delay }}</h5>
                </div>
                <div class="content-divider-1"></div>
                <div class="projects-action text-center">
                    @if($project->project->hire_at == null)
                    <a data-toggle="modal" href="#file" class="projects-btn">{{ __('Edit Proposals') }} </a>
                    <a href="{{ route('backend.jobs.show',$project->project_id) }}" class="projects-btn">{{ __('View job details') }}</a>
                    @elseif($project->hire == true)
                        <a href="{{ route('backend.projects.show',$project->project_id) }}" class="projects-btn">{{ __('View Project') }}</a>
                    @endif
                    
                    <a href="javascript:void(0);" onclick="deleteProposal({{ $project }})" class="proposal-delete">Delete Proposal</a>
                </div>
            </div>
        </div>
        <div class="description-proposal">
            <h5 class="desc-title">Description</h5>
            <p> {!! str_replace('\\','',$project->description) !!}

                {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. Et cursus tellus viverra adipiscing suspendisse. Semper arcu est eget eleifend. Faucibus elit massa sollicitudin elementum ut feugiat nunc ac. Turpis quam sed in sed curabitur netus laoreet. In tortor neque sapien praesent porttitor cursus sed cum....<a href="#" class="text-primary font-bold">Readmore</a> --}}</p>
        </div>
    </div>
</div>
<!-- Proposals -->

@endif

@endforeach

@if(count($projects)>0)

<!-- pagination -->
<div class="row">
    <div class="col-md-12">
        <ul class="paginations list-pagination">
            <li><a href="#"><i class="fas fa-angle-left"></i> Previous</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
        </ul>
    </div>
</div>
<!-- /pagination -->
@endif
@endsection

@push('dash-js')

<script>



    $(document).ready(function() {
        console.log('corine');
        myFunction();
    });
    function myFunction(){
            console.log('corine');
    }

    function deleteProposal(proposal) {

        var response = confirm('Do you really want to delete this proposal.');

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.proposals.index') }}" + '/' + proposal.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('#conteneur').load(location.href + ' #conteneur>*', '');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);
                    alert.log(data.responseJSON.errors);
                });
        }
    }


    function deleteProject(project) {

        var response = confirm('Do you really want to delete this project.');

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.projects.index') }}" + '/' + project.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('#conteneur').load(location.href + ' #conteneur>*', '');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);
                    alert.log(data.responseJSON.errors);
                });
        }
    }

</script>

@endpush
