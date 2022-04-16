<?php $page = 'dashboard'; ?>

@extends('livewire.backend.layouts.base')

@push('css')

@endpush
@section('backend-content')
<div class="freelance-title" id="plan">
    <h3>Freelancer Packages</h3>
    <p> Choose the best pricing that suites your requirements</p>
</div>
<div class="row" id="tableDIV">
    @foreach($plans as $key => $plan)

    <div class="col-lg-4">
        <div class="package-detail">
            <h4>{{ __($plan['plan']) }}</h4>
            <p>{{ __($plan['description']) }}</p>
            <h3 class="package-price">${{ __($plan['price']) }}.00</h3>
            <div class="package-feature">
                <ul>
                    @foreach($plan->criteres as $critere)
                        <li>{{ __($critere->critere) }}</li>
                    @endforeach

                </ul>
            </div>
            <a href="#" class="btn btn-primary price-btn btn-block">Select Plan</a>
            <div style="margin-top: 25px; text-align:center;">
                <a style="padding: 8px 14px!important;" onclick="editPlan({{ $plan }});document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.plans.update', $plan->id) }}');" data-toggle="modal" href="javascript:void(0)" class="btn btn-primary price-btn mr-2"><i class="fas fa-pen"></i></a>

                <a style="padding: 8px 14px!important;" type="button" href="javascript:void(0);" onclick="deletePlan({{ $plan }})" class="btn btn-primary price-btn"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="member-plan pro-box">
            <div class="pro-head">
                <h2><i class="fa fa-check-circle orange-text" aria-hidden="true"></i> Plan Details</h2>
            </div>
            <div class="pro-body member-detail">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mb-0">The Ultima</h4>
                        <div class="yr-amt">Anually Price</div>
                        <div class="expiry-on">Expiry On</div>
                        <div class="expiry">24 JAN 2022</div>
                    </div>
                    <div class="col-6 change-plan">
                        <h3>$1200</h3>
                        <div class="yr-duration">Duration: One Year</div>
                        <a href="#plan" class="btn btn-primary btn-plan black-btn">Change Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="pro-post">
            <div class="project-table">


                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">STATEMENT</h4>
                        </div>
                        <div class="col-auto">

                            <a id="newPlan" class="btn-right btn btn-sm fund-btn">
                                <i class="fas fa-plus"></i>
                                Add new plan
                            </a>

                        </div>
                    </div>
                </div>
                <div class="table-responsive table-box">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-center table-hover datatable dataTable no-footer" id="DataTables_Table_0" plan="grid">
                                    <thead class="thead-pink">
                                        <tr plan="row">
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 156.297px;">Purchased Date</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 194.594px;">Details</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 133.469px;">Expiry Date</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 60.3594px;">Type</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 74.0469px;">Status</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 79.7344px;">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr plan="row" class="odd">
                                            <td>15 October 2021</td>
                                            <td>
                                                <p class="mb-0">The Unlimita</p>
                                                <a href="#" class="read-text">Invoice : IVIP12023598</a>
                                            </td>
                                            <td>15th July 2022</td>
                                            <td>Yearly</td>
                                            <td class="text-danger">Inactive</td>
                                            <td>$200.00</td>
                                        </tr>
                                        <tr plan="row" class="even">
                                            <td>15 October 2022</td>
                                            <td>
                                                <p class="mb-0">The Unlimita</p>
                                                <a href="#" class="read-text">Invoice : IVIP12023598</a>
                                            </td>
                                            <td>15th July 2023</td>
                                            <td>Yearly</td>
                                            <td class="text-success">Active</td>
                                            <td>$170.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5"></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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

<div class="modal fade" id="app-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="app-modal-title">{{ __('Add new plan') }}</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <div>
                    <form id="app-modal-form" method="POST" action="">
                        @csrf

                        <p id="app-modal-form-method"></p>

                        <div class="form-group">
                            <label for="plan">{{ __('Plan name') }}</label>
                            <input type="text" class="form-control" id="plan_name" name="plan">
                            @error('plan') <span class="text-danger">{{ $message }}</span> @enderror
                            <small class="help-block" style="color:red; font-size:small"></small>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Plan description') }}</label>
                            <input type="text" class="form-control" id="description" name="description">
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            <small class="help-block" style="color:red; font-size:small"></small>
                        </div>

                        <div class="form-group mt-3" id="price_id" style="">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">$</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Dollars</a>
                                        <a class="dropdown-item" href="#">Euro</a>
                                        <a class="dropdown-item" href="#">Bitcoin</a>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="price" id="price" placeholder="20.00">

                                <small class="help-block" style="color:red; font-size:small"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="periode">{{ __('Duration of Plan') }}</label>
                            <small class="help-block" style="color:red; font-size:small">Period in month</small>
                            <input type="number" class="form-control" id="periode" name="periode">
                            @error('periode') <span class="text-danger">{{ $message }}</span> @enderror
                            <small class="help-block" style="color:red; font-size:small"></small>
                        </div>

						<!-- Characteristics Content -->
						<div class="title-content" style="padding: 12px 0px;">
							<div class="title-detail">
								<h3>Plan characteristics </h3>
								<div class="form-group mb-0">
									<input type="text" data-role="tagsinput" class="input-tags form-control" id="criteres" name="criteres[]" value="Profile Featured" id="services" placeholder="UX, UI, App Design, Wireframing, Branding">
									<p class="text-muted mb-0">Enter plan characteristics</p>
								</div>
							</div>
						</div>
						<!-- /Characteristics Content -->

                        <!-- Role Content -->
                        <div class="title-content" style="padding: 12px 0px;">
                            <div class="title-detail">
                                <h3>Role Type</h3>
                                <div class="form-group mb-0">
                                    <select class="form-control select" name="role" id="role_id">
                                        <option value="">Select</option>

                                        @foreach($roles as $key => $role)
                                            <option value="{{ $role['role'] }}">{{ __($role['role']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /Role Content -->

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

@endsection

@push('dash-js')


<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#newPlan', function(event) {
            console.log('onclick');

            event.preventDefault();

            $('#app-modal-form').load(location.href + ' #app-modal-form>*', '');

            document.getElementById('app-modal-form-method').innerHTML = '';

            document.getElementById('app-modal-form').setAttribute('action', '{{route('backend.plans.store')}}');

            document.getElementById('app-modal-form').setAttribute('method', "POST");

            document.getElementById('app-modal-title').innerHTML = "{{ __('ADD NEW PLAN') }}";

            $('.app-modal-submit-btn-title').html('Submit');

            $('#app-modal').modal('show');

        });

        /* $('#app-modal').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        }); */



        //SUBMIT FORM ONCLICK FUNCTION

        $('body').on('click', '#app-modal-submit-btn', function(event) {

            var formData = new FormData($('#app-modal-form')[0]);

            //Reset input errors message
            $('input+small').text('');

            $('input').parent().removeClass('has-error');

            var plan = $('#plan_name').val();
            var price = $('#price').val();
            var periode = $('#periode').val();
            var description = $('#description').val();
            var role = $('#role_id').val();
            var criteres = $('#criteres').val();

            // send request
            $.ajax({

                    url: $('#app-modal-form').attr('action')
                    , type: $('#app-modal-form').attr('method'),
                    //enctype:'multipart/form-data',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , data: {
                        plan:plan,
                        price:price,
                        periode:periode,
                        role:role,
                        criteres:criteres,
                        description:description,
                    }
                    , dataType: 'json'

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

    function deletePlan(plan) {

        var response = confirm('Do you really want to delete plan ' + plan.plan);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.plans.index') }}" + '/' + plan.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('#tableDIV').load(location.href + ' #tableDIV>*', '');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function editPlan(plan) {

        console.log(plan);

        $('#app-modal-form')[0].reset();

        document.getElementById('app-modal-form-method').innerHTML = '';

        //document.getElementById('app-modal-form').setAttribute('action',  '{ route('backend.plans.update', +'plan.id+')  }}');

        document.getElementById('app-modal-form').setAttribute('method', "PUT");

        document.getElementById('app-modal-title').innerHTML = "{{ __('UPDATE PLAN') }}";

        $('.app-modal-submit-btn-title').html('Submit');

        //console.log(plan.periode);
        $('#plan_name').val(plan.plan);
        $('#price').val(plan.price);
        $('#periode').val(plan.periode);
        $('#role_id').val(plan.role);
        $('#description').val(plan.description);

        $('#app-modal').modal('show');
    }

</script>


@endpush
