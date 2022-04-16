<?php $page="freelancer-profile";?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

<div class="card">
    <div class="payment-list wallet card-body">
        <h3>Verification Details</h3>
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Your Last Name</label>
                        <input class="form-control" id="nom" name="nom" type="text" value="{{ str_replace('\\', '', auth()->user()->nom) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Your First Name</label>
                        <input class="form-control" id="prenom" name="prenom"  type="text" value="{{ str_replace('\\', '', auth()->user()->prenom) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telephone">Contact Number</label>
                        <input class="form-control" id="telephone" name="telephone" value="{{ auth()->user()->telephone }}" type="tel">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="identity">CNIC / Passport / NIN / SSN</label>
                        <input class="form-control" id="identity" name="identity" value="{{  auth()->user()->identity }}" type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Upload Document</label>
                        <div class="uplod">
                            <label class="file-upload image-upbtn">
                                Select Document <input type="file" name="document">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">Address</label>
                        <textarea class="form-control" rows="5" id="address" name="address">{!! nl2br(e(str_replace('\\', '', auth()->user()->address))) !!}</textarea>
                        <p class="mt-2">Your account information should match with the document that you are providing.</p>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn-primary click-btn">Submit verification</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('dash-js')


@endpush
