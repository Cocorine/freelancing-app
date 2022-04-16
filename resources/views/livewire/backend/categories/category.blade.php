<?php $page = 'dashboard'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')
<div class="freelance-title" id="plan">
    <h3>Categories</h3>
    <p> Choose the best pricing that suites your requirements</p>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">List of categories</h4>
                        </div>
                        <div class="col-auto">

                            <a id="newCategory" class="btn-right btn btn-sm fund-btn">
                                <i class="fas fa-plus"></i>
                                Add new category
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-box" id="tableDIV">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-center table-hover datatable dataTable no-footer" id="DataTables_Table_0" category="grid">
                                        <thead class="thead-pink">
                                            <tr category="row">
                                                <th rowspan="1" colspan="1">Category name</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1">slug</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 80px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($categories as $key => $category)
                                                <tr category="row" class="odd">
                                                    <td>{{ $category->category }}</td>
                                                    <td>{{ $category['slug-category'] }}</td>
                                                    <td>
                                                        <div class="action">
                                                            <a onclick="editCategory({{ $category }});document.getElementById('app-modal-form').setAttribute('action','{{ route('backend.categories.update', $category->id) }}');" data-toggle="modal" href="javascript:void(0)" class="file-circle mr-2" ><i class="fas fa-pen"></i></a>

                                                            <a type="button" href="javascript:void(0);" onclick="deleteCategory({{ $category }})" class="file-circle"><i class="fas fa-trash-alt"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach

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
                <h4 class="modal-title" id="app-modal-title">{{ __('Add new category') }}</h4>
                <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
            </div>
            <div class="modal-body">
                <div>
                    <form id="app-modal-form" method="POST" action="">
                            @csrf

                        <p id="app-modal-form-method"></p>

                        <div class="form-group">
                            <label for="category">Category name</label>
                            <input type="text" class="form-control" id="category" name="category">
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
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
        $('body').on('click', '#newCategory', function(event) {
            console.log('onclick');

            event.preventDefault();

            $('#app-modal-form').load(location.href + ' #app-modal-form>*', '');

            document.getElementById('app-modal-form-method').innerHTML = '';

            document.getElementById('app-modal-form').setAttribute('action',
                '{{ route('backend.categories.store') }}');

            document.getElementById('app-modal-form').setAttribute('method', "POST");

            document.getElementById('app-modal-title').innerHTML = "{{ __('ADD NEW SKILL') }}";

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

                 var category = $('#category').val();

                 console.log(category);

                 // send request
                $.ajax({

                        url: $('#app-modal-form').attr('action'),
                        type: $('#app-modal-form').attr('method'),
                        enctype:'multipart/form-data',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'category':category,
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

    function deleteCategory(category){

       var response = confirm('Do you really want to delete category ' + category.category);

       if(response){
        // send request
        $.ajax({

            url: "{{ route('backend.categories.index') }}"+ '/'+category.id,
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

    function editCategory(category){

        console.log(category);

        $('#app-modal-form')[0].reset();

        document.getElementById('app-modal-form-method').innerHTML = '';

        document.getElementById('app-modal-form').setAttribute('method', "PUT");

        document.getElementById('app-modal-title').innerHTML = "{{ __('UPDATE SKILL') }}";

        $('.app-modal-submit-btn-title').html('Submit');

        $('#category').val(category.category);

        $('#app-modal').modal('show');
    }


</script>

@endpush
