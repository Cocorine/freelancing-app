<?php $page="freelancer-profile";?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

<div class="pro-pos">
    @include('livewire.backend.user-account.partials.nav')

    <div class="setting-content">
        <form action="{{ route('backend.users.update', auth()->id()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Profile Basics </h3>
                </div>
                <div class="pro-body">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success mb-4">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger  mb-4">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="list-style-type: none;"><i class="fas fa-times"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="nom" value="{{ str_replace('\\', '', auth()->user()->nom) }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="prenom" value="{{ str_replace('\\', '', auth()->user()->prenom) }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="pseudo" value="{{ str_replace('\\', '', auth()->user()->pseudo) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="profil" value="{{ str_replace('\\', '', auth()->user()->profil) }}">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Price Type</label>
                            <select class="form-control select" name="price_type">
                                <option value="">Make your choice</option>
                                <option value="Hourly Rate" {{ auth()->user()->price_type == 'Hourly Rate' ? 'selected' :'' }}>Hourly Rate</option>
                                <option value="Full Day Rate" {{ auth()->user()->price_type == 'Full Day Rate' ? 'selected' :'' }}>Full Day Rate</option>
                                <option value="Half Day Rate" {{ auth()->user()->price_type == 'Half Day Rate' ? 'selected' :'' }}>Half Day Rate</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Hourly Rate</label>
                            <input type="text" class="form-control" name="hire_price" value="{{ auth()->user()->hire_price }}">
                            <p class="light-pink-text mb-0">Provide your hourly rate without currency symbol</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Contact Number</label>
                            <input type="text" value="{{ auth()->user()->telephone }}" name="telephone" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <select name="gender" class="form-control select">
                                <option value="">Make a choice</option>
                                <option value="m" {{ auth()->user()->gender == 'm' ? 'selected' :'' }}>Male</option>
                                <option value="f" {{ auth()->user()->gender == 'f' ? 'selected' :'' }}>Female</option>
                            </select>
                        </div>{{--
                        <div class="form-group col-md-6">
                            <label>Type</label>
                            <select name="price" class="form-control select">
                                <option value="0">Select Freelancer Type</option>
                                <option value="1">Freelancer</option>
                                <option value="1">Remote</option>
                            </select>
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label>Language </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-row pro-pad pt-0">
                        <div class="form-group col-md-6 pro-pic">
                            <label>Profile Picture</label>
                            <div class="d-flex align-items-center">
                                <div class="upload-images">
                                    <img src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/developer/developer-01.jpg') }}" alt="Image" id="profilPreview">
                                    <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                </div>
                                <label class="file-upload image-upbtn ml-3">
                                    Change Image <input type="file" accept="image/*" onchange="showPreviewImage(event,'profilPreview');" id="profileImage" name="profile">
                                </label>
                            </div>

                            <p>Image size 300*300</p>
                        </div>{{--
                        <div class="form-group col-md-6 pro-pic">
                            <label>Banner Image</label>
                            <div class="d-flex align-items-center">
                                <div class="upload-images">
                                    <img src="assets/img/img-02.jpg" alt="Image">
                                    <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                </div>
                                <label class="file-upload image-upbtn ml-3">
                                    Change Image <input type="file">
                                </label>
                            </div>
                            <p>Image size 1024*100</p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Location</h3>
                </div>
                <div class="pro-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Address</label>
                            <input type="text" name="address" id="address" value="{{ str_replace('\\', '', auth()->user()->address) }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input type="text" name="state" id="state" value="{{ str_replace('\\', '', auth()->user()->state) }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Zipcode</label>
                            <input type="text"  name="zipcode" id="zipcode" value="{{ str_replace('\\', '', auth()->user()->zipcode) }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <select name="country_id" class="form-control select">
                                <option value="">Select Country</option>

                                @foreach ($countries as $country )
                                    <option value="{{ $country->id }}" @if(auth()->user()->country_id ==  $country->id) selected @endif>{{ $country->country }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Overview</h3>
                </div>
                <div class="pro-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" rows="5" name="profil_description" id="profil_description">{!! str_replace('\\', '', auth()->user()->profil_description) !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 col-xl-4 d-flex">
                    <div class="pro-card flex-fill mb-3">
                        <div class="pro-head">
                            <h3 class="pro-title without-border mb-0">Skills</h3>
                            <a href="#" class="btn fund-btn skill-add">Add More</a>
                        </div>
                        <div class="pro-body skill-info">
                            @if(auth()->user()->skills->count()>0)
                            @foreach ( auth()->user()->skills as $skill )
                            <div class="form-row align-items-center skill-cont">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" value="{{ str_replace('\\', '', $skill->name) }}" name="skills[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" onclick="deleteSkill({{ $skill }})" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <div class="form-row align-items-center skill-cont">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="skills[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="pro-head">
                            <h3 class="pro-title without-border mb-0">Awards / Certificates</h3>
                            <a href="#" class="btn fund-btn add-award">Add More</a>
                        </div>
                        <div class="pro-body  award-info">

                            @if(auth()->user()->user_certificates->count()>0)

                            @foreach ( auth()->user()->user_certificates as $certificate )

                            <div class="form-row align-items-center award-cont">
                                <div class="form-group col-md-2">
                                    <img alt="profile image" src="{{ asset('assets/img/img.jpg') }}" class="avatar-medium">
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" value="{{ str_replace('\\', '', $certificate->certificate) }}" name="certificates[]">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control datetimepicker" value="{{$certificate->date}}" name="dates[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" onclick="deleteCertificate({{ $certificate }})" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>

                            @endforeach

                            @else
                            <div class="form-row align-items-center award-cont">
                                <div class="form-group col-md-2">
                                    <img alt="profile image" src="{{ asset('assets/img/img.jpg') }}" class="avatar-medium" id="awardpreview" name="awardProfil[]">


                            {{-- <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom" style="margin-right: .6rem!important; margin-left: 0rem!important;">
                                <img class="img-avatar img-avatar-thumb" id="profilPreview" src="{{ asset(optional($user->profile)->url ?? 'assets/media/avatars/avatar10.jpg') }}" alt="">
                                <span class="overlay-item " onclick="document.getElementById('profileImage').click();" style=" text-align:center; bottom: 0px; right:-2px;width: 1.5rem;height: 1.5rem;">
                                    <i class="fa fa-camera mt-1" style="color:#adb5bd; font-size:18px;"></i>
                                    <input hidden="" type="file" accept="image/*" onchange="showPreviewImage(event,'profilPreview');" id="profileImage" name="profile">
                                </span>
                            </div> --}}
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="certificates[]">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control datetimepicker" name="dates[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="pro-head">
                            <h3 class="pro-title without-border mb-0">Languages</h3>
                            <a href="#" class="btn fund-btn add-lang">Add More</a>
                        </div>
                        <div class="pro-body  lang-info">

                            @if(auth()->user()->user_langues->count()>0)
                            @foreach ( auth()->user()->user_langues as $langue )
                            <div class="form-row align-items-center lang-cont">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" value="{{ str_replace('\\', '', $langue->langue) }}" name="langues[]">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" value="{{ $langue->level }}" name="levels[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" onclick="deleteLangue({{ $langue }})" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="form-row align-items-center lang-cont">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" name="langues[]">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="levels[]">
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="#" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Experience</h3>
                    <a href="#" class="btn fund-btn add-exp">Add More</a>
                </div>
                <div class="pro-body">
                    <div class="exp-info">
                        @if(auth()->user()->user_experiences->count()>0)
                        @foreach ( auth()->user()->user_experiences as $experience )
                        <div class="row exp-cont">
                            <div class="form-group col-md-6">
                                <label>Title</label>
                                <input type="text" class="form-control" value="{{ str_replace('\\', '', $experience->name) }}" name="experiences[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Company name</label>
                                <input type="text" class="form-control" value="{{ str_replace('\\', '', $experience->compagny) }}" name="compagnies[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Start date</label>
                                <input type="text" class="form-control datetimepicker" value="{{ $experience['start-at'] }}" placeholder="Select Date" name="experience_starts[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>End Date</label>
                                <input type="text" class="form-control datetimepicker" value="{{ $experience['end-at'] }}" placeholder="Select Date" name="experience_ends[]">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="custom_check">
                                    <input type="checkbox" name="rem_password">
                                    <span class="checkmark"></span> I'm currently working here
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Summary</label>
                                <textarea class="form-control" rows="5" name="experience_descriptions[]">{!! str_replace('\\', '', $experience->description) !!}</textarea>
                            </div>
                            <div class="form-group col-md-2"><a href="#" onclick="deleteExperience({{ $experience }})" class="btn trash-icon"><i class="far fa-trash-alt"></i></a></div>
                        </div>

                        @endforeach
                        @else
                        <div class="row exp-cont">
                            <div class="form-group col-md-6">
                                <label>Title</label>
                                <input type="text" class="form-control" name="experiences[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Company name</label>
                                <input type="text" class="form-control" name="compagnies[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Start date</label>
                                <input type="text" class="form-control datetimepicker" placeholder="Select Date" name="experience_starts[]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>End Date</label>
                                <input type="text" class="form-control datetimepicker" placeholder="Select Date" name="experience_ends[]">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="custom_check">
                                    <input type="checkbox" name="rem_password">
                                    <span class="checkmark"></span> I'm currently working here
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Summary</label>
                                <textarea class="form-control" rows="5"  name="experience_descriptions[]"></textarea>
                            </div>

                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Educational Details</h3>
                    <a href="#" class="btn fund-btn add-education">Add More Skills</a>
                </div>
                <div class="pro-body">
                    <div class="education-info">
                    @if(auth()->user()->user_educations->count()>0)
                    @foreach ( auth()->user()->user_educations as $education )

                    <div class="row education-cont">
                        <div class="form-group col-md-12">
                            <label>Degree Title</label>
                            <input type="text" class="form-control" name="educations[]" value="{{ str_replace('\\', '', $education->degree) }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label>University/College</label>
                            <input type="text" class="form-control" name="schools[]" value="{{ str_replace('\\', '', $education->school) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Start year</label>
                            <input type="text" class="form-control datetimepicker" value="{{ $education['start-at'] }}" name="education_starts[]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>End year</label>
                            <input type="text" class="form-control datetimepicker" value="{{ $education['end-at'] }}" name="education_ends[]">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Summary</label>
                            <textarea class="form-control" rows="5" name="education_descriptions[]">{!! str_replace('\\', '', $education->description) !!}</textarea>
                        </div>
                        <div class="form-group col-md-2"><a href="#" onclick="deleteEducation({{ $education }})" class="btn trash-icon"><i class="far fa-trash-alt"></i></a></div>
                    </div>
                    @endforeach
                    @else
                    <div class="row education-cont">
                        <div class="form-group col-md-12">
                            <label>Degree Title</label>
                            <input type="text" class="form-control" name="educations[]">
                        </div>
                        <div class="form-group col-md-12">
                            <label>University/College</label>
                            <input type="text" class="form-control" name="schools[]">
                            {{--
                                <select name="price" class="form-control select">
                                    <option value="0">Select University/College </option>
                                    <option value="1">University</option>
                                    <option value="2">University</option>
                                </select>
                            --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label>Start year</label>
                            <input type="text" class="form-control datetimepicker" name="education_starts[]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>End year</label>
                            <input type="text" class="form-control datetimepicker" name="education_ends[]">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Summary</label>
                            <textarea class="form-control" rows="5" name="education_descriptions[]"></textarea>
                        </div>
                    </div>
                    @endif
                </div>
                </div>
            </div>

            <div class="card">
                <div class="pro-head">
                    <h3 class="pro-title without-border mb-0">Social Links</h3>
                </div>
                <div class="pro-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="fb_link" value="{{ optional(auth()->user()->fb_link)->url }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Dribble</label>
                            <input type="text" class="form-control" name="dribble_link" value="{{ optional(auth()->user()->dribble_link)->url }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Twitter</label>
                            <input type="text" class="form-control" name="tw_link" value="{{ optional(auth()->user()->tw_link)->url }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>LinkedIn</label>
                            <input type="text" class="form-control"  name="linkedin_link" value="{{ optional(auth()->user()->linkedin_link)->url }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Behance</label>
                            <input type="text" class="form-control"  name="behance_link" value="{{ optional(auth()->user()->be_link)->url }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Profil link</label>
                            <input type="text" class="form-control" name="profil_link" value="{{ optional(auth()->user()->personal_link)->url }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card text-right">
                <div class="pro-body">
                    <button class="btn btn-secondary click-btn btn-plan">Cancel</button>
                    <button class="btn btn-primary click-btn btn-plan" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('dash-js')
<script>
    function deleteSkill(skill) {

        var response = confirm('Do you really want to delete skill ' + skill.name);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.users.index') }}" + '/delete-skill/' + skill.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('#tableDIV').load(location.href + ' #tableDIV>*', '');

                    //alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function deleteExperience(experience) {

        var response = confirm('Do you really want to delete experience ' + experience.name);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.users.index') }}" + '/delete-experience/' + experience.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('.exp-info').load(location.href + ' .exp-info>*', '');

                    //alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function deleteCertificate(certificate) {

        var response = confirm('Do you really want to delete certificate ' + certificate.certificate);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.users.index') }}" + '/delete-certificate/' + certificate.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('#tableDIV').load(location.href + ' #tableDIV>*', '');

                    //alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function deleteEducation(education) {

        var response = confirm('Do you really want to delete education ' + education.degree);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.users.index') }}" + '/delete-education/' + education.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('.education-info').load(location.href + ' .education-info>*', '');

                    //alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }

    function deleteLangue(langue) {

        var response = confirm('Do you really want to delete languague ' + langue.langue);

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.users.index') }}" + '/delete-languague/' + langue.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('.lang-info').load(location.href + ' .lang-info>*', '');

                    //alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);

                    alert.log(data.responseJSON.errors);

                });
        }
    }



    function showPreviewImage(event,id) {

        if (event.target.files.length > 0) {

            var preview = document.getElementById(id);

            for (let index = 0; index < event.target.files.length; index++) {

                var src = URL.createObjectURL(event.target.files[index]);

                preview.setAttribute('src', src);

                //document.getElementById("resetProfile").style.display = "block";

            }
        }
    }

</script>
@endpush
