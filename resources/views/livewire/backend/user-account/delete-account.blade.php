<?php $page="freelancer-profile-settings";?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

    @include('livewire.backend.user-account.partials.nav')

    <div class="setting-content">
        <div class="pro-card">
            <div class="pro-head">
                <h3 class="pro-title without-border mb-0">Delete Account</h3>
            </div>
            <div class="pro-body">
                <form action="index.html">
                    <div class="form-group">
                        <label>Please Explain Further**</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password*</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary click-btn btn-plan" data-toggle="modal" href="#delete-acc">Delete Account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@push('dash-js')

@endpush
