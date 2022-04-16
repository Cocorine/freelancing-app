<?php $page = 'payments'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@include('livewire.backend.payments.partials.comp-nav')

<div class="row">
    <div class="col-md-12">
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
        <div class="card">
            <form action="{{ route('backend.payments.withdraw_fund',$wallet->id) }}" method="POST">
                @csrf

                <div class="payment-list wallet card-body">
                    <h3>Add Wallet</h3>
                    <div class="form-group profile-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn dol-btn" type="submit">$</button>
                            </div>
                            <input type="text" id="amount" name="amount" class="form-control">
                        </div>
                    </div>
                    <label class="custom_radio mr-4">
                        <input type="radio" name="card_type" value="Yes" checked="">
                        <span class="checkmark"></span> Paypal
                    </label>
                    <label class="custom_radio">
                        <input type="radio" name="card_type" value="Yes">
                        <span class="checkmark"></span> Card
                    </label>
                    <div class="bootstrap-tags text-left pl-0">
                        <span class="badge badge-pill badge-skills">$50</span>
                        <span class="badge badge-pill badge-skills">$100</span>
                        <span class="badge badge-pill badge-skills">$150</span>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card_number">Card Number</label>
                                <input class="form-control" id="card_number" name="card_number" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" name="first_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" name="last_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="expiry_on">Expires on</label>
                                <input class="form-control" id="expiry_on" name="expiry_on" type="text">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cvv">CVV (Security Code) </label>
                                <input class="form-control" id="cvv" name="cvv" type="text">
                            </div>
                        </div>
                        <div class="col-md-8 btn-pad">
                            <a href="#" class="btn-primary click-btn">Continue</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6 mb-2">
        <div class="card">
            <div class="wallet-detail card-body">
                <div class="wallet-title pt-0 pl-0">
                    <h3 class="mb-0">Wallet</h3>
                </div>
                <div class="wallet-bal">
                    <span class="dol-circle"><i class="fa fa-dollar-sign" aria-hidden="true"></i></span>
                    <div class="wallet-amt">
                        <p>Available Balance</p>
                        <h3 class="mb-0">{{ '$'.auth()->user()->wallet->account_wallet.'.00' }} </h3>
                    </div>
                </div>
                <div class="wallet-content">
                    <div class="wallet-pay">
                        <p>Total Credit</p>
                        <h3 class="mb-0">$500.00</h3>
                    </div>
                    <div class="wallet-pay">
                        <p>Total Credit</p>
                        <h3 class="mb-0">$500.00</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('dash-js')

@endpush
