<?php $page = 'roles'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')
<div class="freelance-title" id="plan">
    <h3>Users</h3>
    <p> Choose the best pricing that suites your requirements</p>
</div>

    <!-- Past Earnings -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-table">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">List of users</h4>
                        </div>
                        <div class="col-auto">

                            <a id="newRole" class="btn-right btn btn-sm fund-btn">
                                <i class="fas fa-plus"></i>
                                Add new user
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-job"  id="tableDIV">
                        <table class="table table-hover table-center mb-0">
                            <thead class="thead-pink">
                                <tr>
                                    <th>User</th>
                                    <th>Account</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $key => $role)

                                        <tr>
                                            <td>
                                                <span class="detail-text">{{ $role->role }}</span>
                                                <span class="d-block text-expiry">{{ $role['slug-role'] }}</span>
                                            </td>
                                            <td>{{ $role->users_count }}</td>

                                            <td class="text-right">
                                                <a onclick="editRole({{ $role }});document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.roles.update', $role->id) }}');" data-toggle="modal" href="javascript:void(0)" class="file-circle mr-2" ><i class="fas fa-pen"></i></a>

                                                <a type="button" href="javascript:void(0);" onclick="deleteRole({{ $role }})" class="file-circle"><i class="fas fa-trash-alt"></i></a>

                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="odd text-center"><td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Past Earnings -->


    <div class="modal fade" id="app-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="app-modal-title">{{ __('Add new role') }}</h4>
                    <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                </div>
                <div class="modal-body">
                    <div>
                        <form id="app-modal-form" method="POST" action="">
                                @csrf

                            <p id="app-modal-form-method"></p>

                            <div class="form-group">
                                <label for="role">{{ __('Role name') }}</label>
                                <input type="text" class="form-control" id="role" name="role">
                                @error('role') <span class="text-danger">{{ $message }}</span> @enderror
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

@endsection

@push('dash-js')

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#newRole', function(event) {
            console.log('onclick');

            event.preventDefault();

            $('#app-modal-form').load(location.href + ' #app-modal-form>*', '');

            document.getElementById('app-modal-form-method').innerHTML = '';

            document.getElementById('app-modal-form').setAttribute('action',
                '{{ route('backend.roles.store') }}');

            document.getElementById('app-modal-form').setAttribute('method', "POST");

            document.getElementById('app-modal-title').innerHTML = "{{ __('ADD NEW ROLE') }}";

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

                 var role = $('#role').val();

                 console.log(role);

                 // send request
                $.ajax({

                        url: $('#app-modal-form').attr('action'),
                        type: $('#app-modal-form').attr('method'),
                        enctype:'multipart/form-data',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            role:role,
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

    function deleteRole(role){

       var response = confirm('Do you really want to delete role ' + role.role);

       if(response){
        // send request
        $.ajax({

            url: "{{ route('backend.roles.index') }}"+ '/'+role.id,
            type:"DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json'

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

    function editRole(role){

        console.log(role);

        $('#app-modal-form')[0].reset();

        document.getElementById('app-modal-form-method').innerHTML = '';

        //document.getElementById('app-modal-form').setAttribute('action',  '{ route('backend.roles.update', +'role.id+')  }}');

        document.getElementById('app-modal-form').setAttribute('method', "PUT");

        document.getElementById('app-modal-title').innerHTML = "{{ __('UPDATE ROLE') }}";

        $('.app-modal-submit-btn-title').html('Submit');

        $('#role').val(role.role);

        $('#app-modal').modal('show');
    }


</script>


@endpush
