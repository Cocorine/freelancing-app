@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

<div class="page-title">
    <h3>Manage Projects</h3>
</div>

@include('livewire.backend.projects.partials.details-nav')

<div class="my-projects-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="card ">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h5 class="card-title">Milestone</h5>
                            </div>
                            @if (Auth::user()->can('create'))

                            <div class="col-auto">
                                <a id="newMilestone" href="javascript:void(0)" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Add Milestone</a>
                            </div>
                            @endif

                            <div class="col-auto">
                                <a id="newMilestone" href="javascript:void(0)" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Add Milestone</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-box">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-pink">
                                    <tr>
                                        <th>Name</th>
                                        <th>Budget</th>
                                        <th>Progress</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->milestones as $milestone)


                                    <tr>
                                        <td>{{ str_replace('\\', '', $milestone->milestone) }}</td>
                                        <td>{{ '$'.$milestone->budget }}</td>
                                        <td>
                                            <p class="mb-0 orange-text text-center">{{ $milestone->progress.'%' }}</p>
                                            <div class="progress progress-md mb-0">
                                                <div class="progress-bar bg-danger" milestone="progressbar" style="width: {{ $milestone->progress.'%' }}" aria-valuenow="{{ $milestone->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($milestone->start_at)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($milestone->end_at)->format('d M Y') }}</td>

                                        @if($milestone->status)
                                            <td><span class="badge badge-pill {{ $milestone->is_pay ? 'bg-success-dark' : 'bg-grey-dark' }}">{{ $milestone->is_pay ? 'Paid' : 'Unpaid'}} </span></td>
                                        @else
                                            <td><span class="badge badge-pill bg-grey-dark">Block </span></td>
                                        @endif
                                        <td>
                                            @if(count($milestone->tasks) > 0)
                                                @if($milestone->project->start_at != null)
                                                    @if($milestone->status)
                                                        <a href="javascript:void(0);" class="mr-2"><span class="badge badge-pill bg-grey-light">Pay now</span></a>
                                                    @else
                                                        <a href="javascript:void(0);" class="mr-2"><span class="badge badge-pill bg-grey-light">Unblock</span></a>
                                                    @endif
                                                @else
                                                        <a onclick="start_project({{ $milestone }});" href="javascript:void(0);" class="mr-2"><span class="badge badge-pill bg-grey-light">Start project</span></a>
                                                    {{-- <a onclick="start_project({{ $milestone }}); $('#milestone_id').val($milestone->id); document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.milestones.update', $milestone->id) }}');" data-toggle="modal" href="javascript:void(0);" class="mr-2"><span class="badge badge-pill bg-grey-light">Start project</span></a> --}}
                                                @endif
                                            @else

                                                    <a href="{{ route('backend.projects.tasks',$project->id) }}" class="mr-2"><span class="badge badge-pill bg-grey-light">Add tasks</span></a>
                                            @endif
                                            <a onclick="editMilestone({{ $milestone }});document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.milestones.update', $milestone->id) }}');" data-toggle="modal" href="javascript:void(0)" class="file-circle mr-2" ><i class="fas fa-pen"></i></a>

                                            <a type="button" href="javascript:void(0);" onclick="deleteMilestone({{ $milestone }})" class="file-circle"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-3">
                            <ul class="paginations">
                                <li><a href="#"> <i class="fas fa-angle-left"></i> Previous</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="app-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="app-modal-title">{{ __('Add new milestone') }}</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <div>
                    <form id="app-modal-form" method="POST" action="">
                        @csrf

                        <p id="app-modal-form-method"></p>

                        <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="milestone">{{ __('Milestone Name') }}</label>
                                    <input type="text" class="form-control" id="milestone" name="milestone">
                                    @error('milestone') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget">{{ __('Milestone Budget') }}</label>
                                    <input type="text" class="form-control" id="budget" name="budget">
                                    @error('budget') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="start_at">{{ __('Milestone Start Date') }}</label>
                                    <input type="date" class="form-control datetimepicker" id="start_at" name="start_at">
                                    @error('start_at') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_at">{{ __('Milestone End Date') }}</label>
                                    <input type="date" class="form-control datetimepicker" id="end_at" name="end_at">
                                    @error('end_at') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>

                        </div>

                        {{--

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Progress</label>
                                    <div class="slidecontainer">
                                        <input type="range" min="1" max="100" value="50" id="progress" name="progress" class="rangslider" id="myRange">
                                        <p class="text-muted">Progress <span id="demo"></span> %</p>
                                    </div>
                                </div>
                            </div>

                         --}}

                        <div class="form-group">
                            <label for="description">{{ __('Milestone Description') }}</label>
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            <small class="help-block" style="color:red; font-size:small"></small>
                        </div>

                    </form>
                </div>
            </div>

            <div class="modal-footer">

                <a href="javascript:void(0)" onclick="$('#app-modal-form')[0].reset();" data-dismiss="modal" aria-label="Close" class="btn-right btn btn-sm fund-btn">
                    <i class="fas fa-times"></i>
                    {{ __('Cancel') }}
                </a>

                <button type="submit" id="app-modal-submit-btn" class="btn btn-primary submit-btn app-modal-submit-btn-title">{{ __('Submit') }}</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="app-pay-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="app-pay-modal-title">{{ __('Deposit fund') }}</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <div>
                    <form id="app-pay-modal-form" method="POST" action="">
                        @csrf

                        <p id="app-pay-modal-form-method"></p>

                        <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}"/>
                        <input type="hidden" id="milestone_id" name="milestone_id"/>
                        
                        <h3>Amount</h3>

											<div class="form-group profile-group">
												<div class="input-group">
													<div class="input-group-prepend">
														<button class="btn dol-btn" type="button">$</button>
													</div>
													<input type="text" class="form-control" name="account_wallet" id="account_wallet">										
												</div>
											</div>
															
											<div class="row">
												<div class="col-md-6 mb-2">
													<label class="custom_radio">
														<input type="radio" name="budget" checked="">
														<span class="checkmark"></span> Debit or Credit Card
													</label>
												</div>
												<div class="col-md-6 text-right">
													<p>All major cards accepted</p>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Card Number</label>
														<input class="form-control" type="text" name="card_number" id="card_number">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Cardholder First Name</label>
														<input class="form-control" type="text" name="first_name" id="first_name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Cardholder Last Name</label>
														<input class="form-control" type="text" name="last_name" id="last_name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>CCV / CVV </label>
														<input class="form-control" type="text" name="cvv" id="cvv">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Expiry Date</label>
														<input class="form-control datetimepicker" placeholder="MM/YY" name="expire_on" id="expire_on">
													</div>
												</div>

												<div class="col-md-12">
													<ul class="card-list">
														<li class="tot-border">
															<label class="custom_radio">
																<input type="radio" name="card_type" value="paypal">
																<span class="checkmark"></span> 
													            <img src="{{asset('assets/img/cards/paypal.png')}}" alt="" width="50">
															</label>
														</li>
														<li class="tot-border">
															<label class="custom_radio">
																<input type="radio" name="card_type" value="visa">
																<span class="checkmark"></span> 
													            <img src="{{asset('assets/img/cards/visa.png')}}" alt="" width="50">
															</label>
														</li>
														<li class="tot-border">
															<label class="custom_radio">
																<input type="radio" name="card_type" value="mastercard">
																<span class="checkmark"></span> 
													            <img src="{{asset('assets/img/cards/mastercard.png')}}" alt="" width="50">
															</label>
														</li>
													</ul>											
												</div>
											</div>

                    </form>
                </div>
            </div>

            <div class="modal-footer">

                <a href="javascript:void(0)" onclick="$('#app-pay-modal-form')[0].reset();" data-dismiss="modal" aria-label="Close" class="btn-right btn btn-sm fund-btn">
                    <i class="fas fa-times"></i>
                    {{ __('Cancel') }}
                </a>

                <button type="submit" id="app-pay-modal-submit-btn" class="btn btn-primary submit-btn app-modal-submit-btn-title">{{ __('Deposit fund') }}</button>

            </div>
        </div>
    </div>
</div>

@endsection

@push('dash-js')

<script type="text/javascript">

    $(document).ready(function() {

        $('body').on('click', '#newMilestone', function(event) {

            console.log('cool');

            event.preventDefault();

            $('#app-modal-form').load(location.href + ' #app-modal-form>*', '');

            document.getElementById('app-modal-form-method').innerHTML = '';

            document.getElementById('app-modal-form').setAttribute('action', '{{ route('backend.milestones.store')}}');

            document.getElementById('app-modal-form').setAttribute('method', "POST");

            document.getElementById('app-modal-title').innerHTML = "{{ __('ADD NEW MILESTONE') }}";

            $('.app-modal-submit-btn-title').html('Submit');

            $('#app-modal').modal('show');

        });

        /* $('#app-modal').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        }); */

        //SUBMIT FORM ONCLICK FUNCTION

        $('body').on('click', '#app-modal-submit-btn', function(event) {

            console.log('onclick');

            //var formData =  new FormData($('#app-modal-form')[0]);

            //Reset input errors message
            $('input+small').text('');

            $('input').parent().removeClass('has-error');

            var milestone = $('#milestone').val();

            var budget = $('#budget').val();
            var start_at = $('#start_at').val();
            var end_at = $('#end_at').val();
            var progress = $('#progress').val();
            var project_id = $('#project_id').val();
            var description = $('#description').val();

            console.log(milestone);

            // send request
            $.ajax({

                    url: $('#app-modal-form').attr('action')
                    , type: $('#app-modal-form').attr('method')
                    , enctype: 'multipart/form-data'
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , data: {
                        milestone: milestone,
                        budget: budget,
                        start_at: start_at,
                        end_at: end_at,
                        progress: progress,
                        project_id: project_id,
                        description: description,
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //request is succed
                    $('.alert-success').removeClass('hidden');

                    //Hide modal
                    $('#app-modal').modal('hide');

                    //refresh table with new data
                    $('.table-box').load(location.href + ' .table-box>*', '');

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

        $('body').on('click', '#app-pay-modal-submit-btn', function(event) {

            console.log('onclick');

            //var formData =  new FormData($('#app-pay-modal-form')[0]);

            //Reset input errors message
            $('input+small').text('');

            $('input').parent().removeClass('has-error');

            var milestone_id = $('#milestone_id').val();

            var cvv = $('#cvv').val();
            var card_type = $('#card_type').val();
            var expire_on = $('#expire_on').val();
            var project_id = $('#project_id').val();
            var last_name = $('#last_name').val();
            var first_name = $('#first_name').val();
            var card_number = $('#card_number').val();
            var account_wallet = $('#account_wallet').val();

            console.log(milestone_id);

            // send request
            $.ajax({

                    url: $('#app-pay-modal-form').attr('action')
                    , type: $('#app-pay-modal-form').attr('method')
                    , enctype: 'multipart/form-data'
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , data: {
                        milestone_id: milestone_id,
                        cvv: cvv,
                        card_type: card_type,
                        expire_on: expire_on,
                        progress: progress,
                        project_id: project_id,
                        first_name: first_name,
                        last_name: last_name,
                        card_number: card_number,
                        account_wallet:account_wallet,
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //request is succed
                    $('.alert-success').removeClass('hidden');

                    //Hide modal
                    $('#app-pay-modal').modal('hide');

                    //refresh table with new data
                    $('.table-box').load(location.href + ' .table-box>*', '');

                })
                .fail(function(data) {
                    console.log(data);

                    // set each errors message to corresponding input
                    $.each(data.responseJSON.errors, function(key, value) {

                        var input = '#app-pay-modal input[name=' + key + ']';

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

    function deleteMilestone(milestone) {

        var response = confirm('Do you really want to delete milestone ' + milestone.milestone);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.milestones.index') }}" + '/' + milestone.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('.table-box').load(location.href + ' .table-box>*', '');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function editMilestone(milestone) {

        console.log(milestone);

        $('#app-modal-form')[0].reset();

        document.getElementById('app-modal-form-method').innerHTML = '';

        //document.getElementById('app-modal-form').setAttribute('action',  '{ route('backend.milestones.update', +'milestone.id+')  }}');

        document.getElementById('app-modal-form').setAttribute('method', "PUT");

        document.getElementById('app-modal-title').innerHTML = "{{ __('UPDATE MILESTONE') }}";

        $('.app-modal-submit-btn-title').html('Submit');

        $('#milestone').val(milestone.milestone);
        $('#budget').val(milestone.budget);
        $('#start_at').val(milestone.start_at);
        $('#end_at').val(milestone.end_at);
        $('#progress').val(milestone.progress);
        $('#description').val(milestone.description);

        $('#app-modal').modal('show');
    }

    function start_project(milestone) {

        console.log(milestone);

        $('#app-pay-modal-form')[0].reset();

        document.getElementById('app-pay-modal-form-method').innerHTML = '';

        document.getElementById('app-pay-modal-title').innerHTML = "{{ __('Pay milestone') }}";

        $('.app-pay-modal-submit-btn-title').html('Submit');

        $('#app-pay-modal').modal('show');
    }

</script>

@endpush
