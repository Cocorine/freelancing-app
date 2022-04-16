<?php $page = 'payments'; ?>

@extends('livewire.backend.layouts.base')

@push('dash-css')

@endpush
@section('backend-content')

@if(auth()->user()->isCompagny())
@include('livewire.backend.payments.partials.comp-nav')
@elseif(auth()->user()->isFreelancer())
@include('livewire.backend.payments.partials.free-nav')
@else
@include('livewire.backend.payments.partials.nav')

@endif




@if(auth()->user()->isCompagny())

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="payment-list wallet card-body">
                <h3>Add Wallet</h3>
                <div class="form-group profile-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn dol-btn" type="submit">$</button>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="custom_radio">
                            <input type="radio" name="budget" checked="">
                            <span class="checkmark"></span> Debit or Credit Card
                        </label>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>All major cards accepted</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input class="form-control" type="text" placeholder="MM/YY">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Cardholder Name</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CCV / CVV </label>
                            <input class="form-control" id="cvv" type="text">
                        </div>
                    </div>
                    <div class="col-md-12 mb-5">
                        <img src="assets/img/card.png" alt="" width="200">
                    </div>
                    <div class="col-md-12">
                        <ul class="card-list">
                            <li class="tot-border">
                                <label class="custom_radio">
                                    <input type="radio" name="pyapal">
                                    <span class="checkmark"></span> Paypal
                                </label>
                            </li>
                            <li class="tot-border">
                                <label class="custom_radio">
                                    <input type="radio" name="pyapal">
                                    <span class="checkmark"></span> Paytm
                                </label>
                            </li>
                            <li class="tot-border">
                                <label class="custom_radio">
                                    <input type="radio" name="pyapal">
                                    <span class="checkmark"></span> Skrill
                                </label>
                            </li>
                            <li>
                                <label class="custom_radio">
                                    <input type="radio" name="pyapal">
                                    <span class="checkmark"></span> Bank Deposit
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="payment-process card-body">
                <ul>
                    <li class="pt-0">
                        <label class="total">Deposit Currency</label>
                        <div class="sort-by sort-show">
                            <span class="sortby-fliter">
                                <select class="select">
                                    <option class="sorting">Dollar</option>
                                    <option class="sorting">Euro</option>
                                    <option class="sorting">Yen</option>
                                </select>
                            </span>
                        </div>
                    </li>
                    <li>
                        <label class="total">Deposit Amount</label>
                        <div class="input-group dep-amt mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" class="form-control" value="2100" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </li>
                    <li class="tot-border">
                        <label class="total">Processing Fee</label>
                        <label class="price">$63.30</label>
                    </li>
                    <li>
                        <label class="total">Total</label>
                        <label class="price">$2,163.30</label>
                    </li>
                </ul>
                <div class="mt-3">
                    <a href="#" class="btn pay-btn btn-block" tabindex="0"> Confirm and pay</a>
                    <p class="mb-0">You agree to authorize the use of your card for this deposit and future payments.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif(auth()->user()->isFreelancer())

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

                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                    @error('card_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

                                @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" name="first_name" type="text">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" name="last_name" type="text">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="expire_on">Expires on</label>
                                <input class="form-control datetimepicker" id="expire_on" name="expire_on" type="text">
                                @error('expire_on')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="cvv">CVV (Security Code) </label>
                                <input class="form-control" id="cvv" name="cvv" type="text">
                                @error('cvv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 btn-pad">
                            <button type="submit" class="btn-primary click-btn"> SUBMIT</button>
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

@else

@endif


@endsection

@push('dash-js')

<script>
    $(document).ready(function() {
        console.log('corine');
        myFunction();
    });

    function myFunction() {
        console.log('corine');
    }

    function deleteProposal(proposal) {

        var response = confirm('Do you really want to delete this proposal.');

        if (response) {
            // send request
            $.ajax({

                    url: "{{ route('backend.proposals.index') }}" + '/' + proposal.id
                    , type: "DELETE"
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , dataType: 'json'

                }).done(function(data) {

                    //refresh table with new data
                    $('.proposals-section').load(location.href + ' .proposals-section>*', '');

                    alert(data.message);

                })
                .fail(function(data) {
                    console.log(data);
                    alert.log(data.responseJSON.errors);
                });
        }
    }

</script>

@endpush
