@extends('livewire.frontend.layouts.index')

@section('front-content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center custom-breadcrumb">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Proposals</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project Details</li>
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
            <div class="col-md-12">
                <div class="profile">
                    <div class="profile-box">
                        <div class="provider-widget row">
                            <div class="pro-info-left col-md-8">
                                <div class="profile-info">
                                    <p class="profile-cmpny">{{ str_replace('\\', '', optional(optional($job)->project_owner)->nom) }} {{ str_replace('\\', '', optional(optional($job)->project_owner)->prenom) }} <i class="fas fa-check-circle text-success ml-2"></i></p>
                                    <h2 class="profile-title">{{ $job->name }}</h2>
                                    <div></div>
                                </div>
                            </div>
                            <div class="pro-info-right profile-inf">
                                <ul class="profile-right">
                                    <li><div class="amt-hr">  @if($job->price_type != 'Biding') {{ '$'.$job->min_price.'.00' }} @endif <p>( {{ $job->price_type }} )</p></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('jobs.show',$job->id) }}" class="btn btn-primary bck-btn mb-4"><i class="fas fa-long-arrow-alt-left mr-2"></i> Back to Project </a>
            </div>
            <div class="col-12">
                <div class="pro-post widget-box">
                    <div class="average-bids">
                        <p><span class="text-highlight">18 freelancers</span> are bidding on average <span class="text-highlight">$17.00</span> for this job</p>
                    </div>
                    <div class="proposal-cards">


                        @foreach($job->project_proposals->sortByDesc('created_at') as $key => $project_proposal)


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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->


</div>

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

                            //request is succed
                            $('.alert-success').removeClass('hidden');

                            //refresh table with new data
                            $('#tableDIV').load(location.href + ' #tableDIV>*', '');

                            //Hide modal

                            $('#app-modal').modal('hide');

                            alert(data.message);

                        })
                        .fail(function(data) {
                            console.log(data);

                            alert(data);

                            // set each errors message to corresponding input
                            $.each(data.responseJSON.errors, function(key, value) {

                                var input = '#app-modal input[name=' + key + ']';

                                //console.log($(input + '+small'));

                                $(input + '+small').text(value);

                                $(input).parent().addClass('has-error');

                            });

                        });

            });
        });

    </script>
@endpush
