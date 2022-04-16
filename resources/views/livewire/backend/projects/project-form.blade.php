@extends('livewire.frontend.layouts.index')

@section('front-content')

@php
    if(!isset($project)){
        $project = null;
    }
@endphp

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Post a Project</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Post a Project</li>
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

                <div class="text-right mb-4">
                    <a href="{{ route('backend.projects.index') }}" class="btn btn-primary back-btn br-0"><i class="fas fa-long-arrow-alt-left"></i> Back to Project </a>
                </div>

                <div class="select-project mb-4">
                    <form action="@if(!optional($project)->id) {{ route('backend.projects.store') }} @else {{ route('backend.projects.update',optional($project)->id ?? 0 ) }} @endif" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(optional($project)->id)
                            @method('PUT')
                        @endif
                        <div class="title-box widget-box">

                            <!-- Project Title -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('Project Name') }}</h3>
                                    <div class="form-group mb-0">
                                        <input type="text" required name="name" value="{{ old('name') ?? optional($project)->name }}" id="project_name" class="form-control" placeholder="Enter Project title">
                                    </div>
                                </div>
                            </div>
                            <!-- /Project Title -->

                            <!-- Country Content -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('Location') }}</h3>
                                    <div class="form-group mb-0">
                                        <select class="form-control select" id="project_country_id" name="country_id">
                                            {{--
                                            <option value="">Country, City, Zipcode</option> --}}
                                            <option value="">Select Country</option>

                                            @foreach ($countries as $country )
                                                <option value="{{ $country->id }}" @if(optional($project)->country_id ==  $country->id) selected @endif>{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /Category Content -->

                            <!-- Category Content -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('Category Type') }}</h3>
                                    <div class="form-group mb-0">
                                        <select class="form-control select" required name="category_id" id="project_category"  value="{{ old('category_id') ?? optional($project)->category_id }}">
                                            <option value="">{{ __('Select') }}</option>

                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category['id'] }}" @if(optional($project)->category_id == $category['id']) selected @endif>{{ __($category['category']) }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /Category Content -->



                            <!-- Price Content -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('Pricing Type') }}</h3>
                                    <div class="form-group price-cont mb-0" id="price_type">
                                        <select class="form-control select" required name="price_type" id="project_price_type">
                                            <option value="">{{ __('Select') }}</option>
                                            <option value="1" @if(optional($project)->price_type == 'Fixed') selected @endif>{{ __('Fixed Budget Price') }}</option>
                                            <option value="2" @if(optional($project)->price_type == 'Hourly') selected @endif>{{ __('Hourly Pricing') }}</option>
                                            <option value="3" @if(optional($project)->price_type == 'Biding') selected @endif>{{ __('Biding Price') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3" id="price_id" style=" display: @if(optional($project)->price_type == 'Fixed') block; @else none; @endif" >
                                        <div class="row">

                                            <div class="col-md-6 mb-2">

                                                <div class="input-group form-inline">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">$</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">{{ __('Dollars') }}</a>
                                                            <a class="dropdown-item" href="#">{{ __('Euro') }}</a>
                                                            <a class="dropdown-item" href="#">{{ __('Bitcoin') }}</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="20.00" name="min_price" id="price_min_price" value="{{ old('min_price') ?? optional($project)->min_price }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group form-inline">
                                                    <label>For </label> <input type="text" class="form-control ml-2" placeholder=" ( eg: 2 Weeks)" name="duree" id="price_duree" value="{{ old('duree') ?? optional($project)->duree }}">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group mt-3" id="hour_id" style="display: @if(optional($project)->price_type == 'Hourly') block; @else none; @endif" >
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="input-group form-inline">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">$</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">{{ __('Dollars') }}</a>
                                                            <a class="dropdown-item" href="#">{{ __('Euro') }}</a>
                                                            <a class="dropdown-item" href="#">{{ __('Bitcoin') }}</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control mr-2" placeholder="20.00" name="min_price" id="hour_min_price" value="{{ old('min_price') ?? optional($project)->min_price }}"> <label> / hr</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-inline">
                                                    <label>For </label> <input type="text" class="form-control ml-2" placeholder=" ( eg: 2 Weeks)" name="duree" id="hour_duree" value="{{ old('duree') ?? optional($project)->duree }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Price Content -->

                            <!-- Skills Content -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>Desired areas of expertise </h3>
                                    <div class="form-group mb-0">
                                        <input type="text" data-role="tagsinput" class="input-tags form-control" name="skills" id="skills" placeholder="UX, UI, App Design, Branding" value="Web Design">
                                        <p class="text-muted mb-0">Enter skills for needed for project</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /Skills Content -->

                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>Experience</h3>
                                    <div class="form-group mb-0" id="pro_period">

                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" value="0-1">
                                                <span class="checkmark"></span> 0-1 years
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" checked value="2-5">
                                                <span class="checkmark"></span> 2-5 years
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" value="5-8">
                                                <span class="checkmark"></span> 5-8 years
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" value="9-12">
                                                <span class="checkmark"></span> 9-12 years
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" value="Mastered">
                                                <span class="checkmark"></span> Mastered
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio" name="experience" value="Professional">
                                                <span class="checkmark"></span> Professional
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Period Content -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>Period of Project</h3>
                                    <div class="form-group mb-0" id="pro_period">
                                        <div class="radio">
                                            <label class="custom_radio">
                                                <input type="radio" value="period" name="start" {{-- name="duree" id="project_duree" --}}>
                                                <span class="checkmark"></span> Start immediately after the candidate is selected
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="custom_radio">
                                                <input type="radio" value="job" name="start" {{-- name="duree" id="project_duree" --}} checked>
                                                <span class="checkmark"></span> Job will Start On
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="filter-widget mb-0" id="period_date">
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" placeholder="Select Date" id="project_start_at" name="start_at" value="{{ \Carbon\Carbon::parse(optional($project)->start_at)->format('d/m/Y') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Project Period Content -->

                            <!-- /Add Document -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('Add Documents') }}</h3>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="project_cahiers" name="cahiers">
                                        <label class="custom-file-label"></label>
                                    </div>
                                    <p class="mb-0">{{ __('Size of the Document should be Below 2MB') }}</p>


                                    <div class="upload-wrap">
                                        {{-- @foreach(optional($project)->cahiers as $key => $cahier) --}}
                                            <div class="upload-document">
                                                <img src="{{ asset('assets/img/document.jpg') }}" alt="Image">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="material-icons">delete_sweep</i></a>
                                            </div>
                                        {{-- @endforeach --}}
                                        <div class="upload-document">
                                            <img src="{{ asset('assets/img/document.jpg') }}" alt="Image">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="material-icons">delete_sweep</i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /Add Document -->

                            <!-- Add Links -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>Add Links</h3>
                                    <div class="links-info">
                                        <div class="row form-row links-cont">
                                            <div class="col-12 col-md-11">
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control" id="project_links" name="links[]">
                                                    <p class="mb-0">{{ __('Add Reference links if any') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-1">
                                                <a href="javascript:void(0);" class="btn add-links"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Add Links -->

                            <!-- Project Title -->
                            <div class="title-content pb-0">
                                <div class="title-detail">
                                    <h3>{{ __('Write Description of Projects') }} </h3>
                                    <div class="form-group mb-0">
                                        <textarea class="form-control summernote" required rows="5" id="project_description" name="description">{!! optional($project)->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /Project Title -->

                            <!-- Project Title -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>{{ __('DeadLine') }}</h3>
                                    <div class="form-group mb-0">
                                        <input class="form-control datetimepicker" placeholder="Select deadline" id="project_delay" name="delay" value="{{ \Carbon\Carbon::parse(optional($project)->delay)->format('d/m/Y') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /Project Title -->

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="btn-item mt-0">
                                        <button type="submit" class="btn next-btn">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Project Title -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->


@endsection

@push('front-js')

    <script type="text/javascript">

        $(document).ready(function() {

            //var start_at = $('#permission-start-at').val();
                var date1 = new Date();

                    console.log(date1);

                    var maxDate =  new Date(date1.getFullYear(),date1.getMonth(), date1.getDate());

                    //document.getElementById('project_start_at').setAttribute('min',date1);

                    document.getElementById('project_start_at').setAttribute('min',maxDate.getFullYear()+'-'+maxDate.getMonth()+'-'+maxDate.getDate());



            $('#project_price_type').change(function(){
                var select = $(this).val();

                if(select == 1){

                    document.getElementById('price_min_price').name = 'min_price';
                    document.getElementById('price_duree').name = 'duree';
                    document.getElementById('hour_min_price').name = '';
                    document.getElementById('hour_duree').name = '';

                }
                else if(select == 2){


                    document.getElementById('price_min_price').name = '';
                    document.getElementById('price_duree').name = '';
                    document.getElementById('hour_min_price').name = 'min_price';
                    document.getElementById('hour_duree').name = 'duree';

                }
            })
        });

    </script>

@endpush
