<?php $page="freelancer-change-password";?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@include('livewire.backend.user-account.partials.nav')


<!-- Password Content -->
<div class="account-content setting-content">
    <div class="pro-card">
        <div class="pro-head">
            <h3 class="pro-title without-border mb-0">Change Password</h3>
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
                <div class="col-md-12">
                    <form action="{{ route('backend.users.resetPassword', auth()->id()) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_password" required autocomplete="current-password">
                            @error('current_password')
                            <span class="invalid-feedback focus-label" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback focus-label" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm">

                            @error('password_confirmation')
                            <span class="invalid-feedback focus-label" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary click-btn btn-plan" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Password Content -->

@endsection


@push('dash-js')

@endpush
