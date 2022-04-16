@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

<div class="page-title">
    <h3>Manage Projects</h3>
</div>

@include('livewire.backend.projects.partials.details-nav')


<!-- project list -->
<div class="my-projects-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h5 class="card-title">Tasks</h5>
                            </div>
                            <div class="col-auto">
                                <a id="newTask" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Add tasks</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-box">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-pink">
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Milestone</th>
                                        <th>Due Date</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->milestones->sortBy('desc') as $milestone)

                                    @foreach ($milestone->tasks->sortBy('desc') as $task)



                                    <tr>
                                        <td>{{ str_replace('\\', '', $task->task) }}</td>
                                        <td>{{ str_replace('\\', '', $milestone->milestone) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</td>

                                        <td>
                                            <p class="mb-0">{!! \Str::ucfirst(str_replace('\\', '',$task->description)) !!}.</p>
                                            <a href="#" class="read-text">Readmore</a>
                                        </td>
                                        <td class="{{ $task->status == 'Completed' ? 'text-success' : 'text-danger'}}">{{ $task->status }}</td>
                                        <td>
                                            <div class="action">
                                                <a onclick="editTask({{ $task }});document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.tasks.update', $task->id) }}');" href="javascript:void(0)" class="file-circle mr-2" ><i class="fas fa-pen"></i></a>
                                                <a type="button" href="javascript:void(0);" onclick="deleteTask({{ $task }})" class="file-circle"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
                                    <label for="task">{{ __('Add Task') }}</label>
                                    <input type="text" class="form-control" id="task" name="task">
                                    @error('task') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget">{{ __('Milestone') }}</label>
                                    <select name="milestone_id" id="milestone_id"  class="form-control select">
                                        <option value="">Select Milestone</option>
                                        @foreach($project->milestones as $milestone)

                                        <option value="{{ $milestone->id }}">{{ str_replace('\\', '', $milestone->milestone) }}</option>
                                        @endforeach
                                    </select>
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="deadline">{{ __('Due Date') }}</label>
                                    <input type="date" class="form-control datetimepicker" id="deadline" name="deadline">
                                    @error('deadline') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="help-block" style="color:red; font-size:small"></small>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="description">{{ __('Task Description') }}</label>
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            <small class="help-block" style="color:red; font-size:small"></small>
                        </div>


                        <select class="form-control select" name="status" id="status">
                            <option>To do </option>
                            <option>Completed</option>
                        </select>

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


<!-- The Modal

<div class="modal fade" id="file">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Files</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <form action="tasks">
                    <div class="modal-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add Task</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Milestone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control select">
                                    <option>To do </option>
                                    <option>Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section text-right">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-file">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Files</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <form action="tasks">
                    <div class="modal-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add Task</label>
                                    <input type="text" class="form-control" value="Research">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Milestone</label>
                                    <input type="text" class="form-control" value="Research">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input type="text" class="form-control" value="20th October 2021">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control select">
                                    <option>To do </option>
                                    <option selected>Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section text-right">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

/The Modal -->

@endsection



@push('dash-js')

<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('click', '#newTask', function(event) {

            console.log('cool');

            event.preventDefault();

            $('#app-modal-form').load(location.href + ' #app-modal-form>*', '');

            document.getElementById('app-modal-form-method').innerHTML = '';

            document.getElementById('app-modal-form').setAttribute('action', '{{ route('backend.tasks.store')}}');

            document.getElementById('app-modal-form').setAttribute('method', "POST");

            document.getElementById('app-modal-title').innerHTML = "{{ __('ADD NEW TASK') }}";

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

            var task = $('#task').val();
            var deadline = $('#deadline').val();
            var milestone_id = $('#milestone_id').val();
            var description = $('#description').val();
            var status = $('#status').val();

            console.log(task);

            // send request
            $.ajax({

                    url: $('#app-modal-form').attr('action')
                    , type: $('#app-modal-form').attr('method')
                    , enctype: 'multipart/form-data'
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , data: {
                        task: task
                        , deadline: deadline
                        , status: status
                        , milestone_id: milestone_id
                        , description: description
                    , }
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

    });

    function deleteTask(task) {

        var response = confirm('Do you really want to delete task ' + task.task);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.tasks.index') }}" + '/' + task.id
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

    function editTask(task) {

        console.log(task);

        $('#app-modal-form')[0].reset();

        document.getElementById('app-modal-form-method').innerHTML = '';

        //document.getElementById('app-modal-form').setAttribute('action',  '{ route('backend.milestones.update', +'milestone.id+')  }}');

        document.getElementById('app-modal-form').setAttribute('method', "PUT");

        document.getElementById('app-modal-title').innerHTML = "{{ __('UPDATE TASK') }}";

        $('.app-modal-submit-btn-title').html('Submit');

        $('#task').val(task.task);
        $('#deadline').val(task.deadline);
        $('#description').val(task.description);
        $('#status').val(task.status);
        $('#milestone_id').val(task.milestone_id);

        $('#app-modal').modal('show');
    }

</script>

@endpush
