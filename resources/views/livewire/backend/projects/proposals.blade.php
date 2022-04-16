<?php $page = 'proposals'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

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

@include('livewire.backend.projects.partials.nav')

<!-- project list -->
<div class="my-projects-list">
    <div class="row">
        <div class="col-lg-10 flex-wrap">
            <div class="projects-card flex-fill">
                <div class="card-body">
                    <div class="projects-details align-items-center">
                        <div class="project-info">
                            <span>{{ str_replace('\\', '', optional($project->owner)->compagny) }}</span>
                            <h2>{{ str_replace('\\', '', $project->name) }}</h2>
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
                                            <h5><i class="fas fa-map-marker-alt mr-1"></i>{{ optional($project->location)['country'] }}</h5>
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
                            <div class="projects-amount proposals">
                                <h3>{{ '$'.$project->min_price.'.00' }}</h3>
                                <h5>in {{ __($project->duree) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 d-flex flex-wrap">
            <div class="projects-card flex-fill">
                <div class="card-body p-2">
                    <div class="prj-proposal-count text-center">
                        <span>{{ count($project->project_proposals) }}</span>
                        <h3>Proposals</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /project list -->

<!-- Proposals list -->
<div class="proposals-section mb-4">
    <h3 class="page-subtitle">{{ __('Proposals By freelancer') }}</h3>
    <div class="proposal-card">

        @foreach ($project->project_proposals->sortByDesc('created_at') as $proposal)
        <!-- Proposals -->
        <div class="project-proposals align-items-center">
            <div class="proposals-info">
                <div class="proposer-info">
                    <div class="proposer-img">
                        <img src="{{ asset(optional(optional(optional($proposal)->proposer)->profile)->url ?? 'assets/img/company/img-1.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="proposer-detail">
                        <h4> {{ str_replace('\\', '', optional(optional($proposal)->proposer)->nom) }} {{ str_replace('\\', '', optional(optional($proposal)->proposer)->prenom) }}</h4>
                        <ul class="proposal-details">
                            <li>{{ \Carbon\Carbon::parse($proposal->created_at)->isoFormat('MMMM d, Y') }}</li>
                            <li><i class="fas fa-star text-primary"></i> 4 Reviews</li>
                            <li> <a href="{{ route('backend.profil',optional(optional($proposal)->proposer)->id) }}" class="font-semibold text-primary">View Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="proposer-bid-info">
                    <div class="proposer-bid">
                        <h3>{{ '$'.$proposal->price .'.00' }}</h3>
                        <h5>in {{ $proposal->delay }}</h5>
                    </div>
                    @if($proposal->project->hire_at == null && $proposal->hire != 1)
                        <div class="proposer-confirm">
                            <a onclick="hireFreelancer({{ $proposal }});" class="projects-btn">Hire Now</a>
                        </div>
                    @elseif($proposal->hire)
                    <div class="proposer-confirm">
                        <a href="javascript:void(0)" class="projects-btn">Hired</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="description-proposal">
                <h5 class="desc-title">Description</h5>
                <p>{!! str_replace('\\','',$proposal->description) !!}
                    <span id="myBtn" class="text-primary font-bold readmore">Readmore</span>
                </p>
            </div>
        </div>
        <!-- Proposals -->
        @endforeach

    </div>
</div>
<!-- /Proposals list -->


<!-- The Modal -->
<div class="modal fade custom-modal" id="hire">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center pt-0 mb-4">
                    <img src="{{ asset('assets/img/logo-01.png') }}" alt="logo" class="img-fluid mb-1">
                    <h5 class="modal-title" id="modal-title">Discuss your project with David</h5>
                </div>
                <form id="modal-form">
                    @csrf
                    <div class="modal-info">
                        <div class="row">
                            <div class="col-12 col-md-12">{{--
                                <input type="text" id="proposalId" name="proposal_id"> --}}

                                {{-- <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="First name & Lastname">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                                </div> --}}

                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-4 pr-0">
                                        <label class="file-upload">
                                            Add Attachment <input type="file" name="file" class="form-control" onchange="document.getElementById('preview').innerHTML = this.files[0].name"/>
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="mb-1">Allowed file types: zip, pdf, png, jpg</p>
                                        <p>Max file size: 50 MB</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <label class="file-upload" id="preview"> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="submit-section text-center">
                    <button type="submit" id="modal-submit-btn" class="btn btn-primary btn-block submit-btn modal-submit-btn-title">Hire Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /The Modal -->

@endsection

@push('dash-js')


<script type="text/javascript">
    $(document).ready(function() {

        //SUBMIT FORM ONCLICK FUNCTION

        $('body').on('click', '#modal-submit-btn', function(event) {

            //Reset input errors message
            $('input+small').text('');

            $('input').parent().removeClass('has-error');

            var proposal_id = window.proposalID;

            var message = $('#message').val();

            // send request
            $.ajax({
                    url: $('#modal-form').attr('action'),
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        content: message,
                        proposal_id: proposal_id,
                    },
                    dataType: 'json'

                }).done(function(data) {

                    //request is succed
                    $('.alert-success').removeClass('hidden');

                    //refresh table with new data
                    $('.proposals-section').load(location.href + ' .proposals-section>*', '');

                    //Hide modal

                    $('#hire').modal('hide');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    // set each errors message to corresponding input
                    $.each(data.responseJSON.errors, function(key, value) {

                        var input = '#modal input[name=' + key + ']';

                        //console.log($(input + '+small'));

                        $(input + '+small').text(value);

                        $(input).parent().addClass('has-error');

                    });

                });

        });


    });

    function hireFreelancer(proposal){

        event.preventDefault();

        $('#modal-form').load(location.href + ' #modal-form>*', '');

        document.getElementById('modal-form').setAttribute("action","{{ route('backend.hire-freelancer') }}");

        document.getElementById('modal-form').setAttribute('method', "POST");

        document.getElementById('modal-title').innerHTML =  "{{ __('Discuss your project with ') }}"+proposal.proposer.prenom;

        $('.modal-submit-btn-title').html('Submit');

        $('#proposalId').val(proposal.id);

        window.proposalID = proposal.id;

        $('#hire').modal('show');
    }

</script>
@endpush
