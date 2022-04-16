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


<div class="transaction-table card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h5 class="card-title">{{ __('All Transactions') }}</h5>
            </div>
            <div class="col-auto d-flex align-items-center flex-wrap transaction-shortby">
                    <div class="sort-by sort-show">
                        <span class="sort-title">{{ __('Show') }}</span>
                        <span class="sortby-fliter">
                            <select class="select">
                                <option>5</option>
                                <option class="sorting">4</option>
                                <option class="sorting">3</option>
                                <option class="sorting">6</option>
                                <option class="sorting">3</option>
                            </select>
                        </span>
                    </div>
                    <div class="export-item sort-show sort-by"><i class="fas fa-download"></i> {{ __('Export') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-box">
            <table class="table">
                <thead>
                    <tr class="thead-pink">
                        <th>Invoice Number</th>
                        <th>Client Name</th>
                        <th>Created Date</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Paid On</th>
                    </tr>
                </thead>
                <tbody class="table table-hover table-center">

                    @foreach ( $transactions as $transaction)


                        <tr>
                            <td><a href="view-invoice" class="invoice-id">{{ 'TRAN-'.$transaction->transaction_number }}</a></td>
                            <td>{{ str_replace('\\','',$transaction->name) }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d mm y') }}</td>
                            <td>{{ '$'.$transaction->amount }}</td>
                            <td>{{ $transaction->due_date != null ? \Carbon\Carbon::parse($transaction->due_date) : '----' }}</td>
                            <td><span class="badge bg-success-light">{{ $transaction->status }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d mm y gi') }}</td>
                        </tr>

                    @endforeach


                    <tr>
                        <td><a href="view-invoice">INV-5622</a></td>
                        <td>Amaze Tech</td>
                        <td>16 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-4545</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-2254</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1582</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1526</a></td>
                        <td>Host Technologies</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>29 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>29 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1200</a></td>
                        <td>Alfred Tech </td>
                        <td>05 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>15 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1212</a></td>
                        <td>Kind Softwares </td>
                        <td>02 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1456</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1236</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice">INV-1566</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@elseif(auth()->user()->isFreelancer())

<div class="transaction-table card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h5 class="card-title">All Transactions</h5>
            </div>
            <div class="col-auto d-flex align-items-center flex-wrap transaction-shortby">
                    <div class="sort-by sort-show">
                        <span class="sort-title">Show</span>
                        <span class="sortby-fliter">
                            <select class="select">
                                <option>5</option>
                                <option class="sorting">4</option>
                                <option class="sorting">3</option>
                                <option class="sorting">6</option>
                                <option class="sorting">3</option>
                            </select>
                        </span>
                    </div>
                    <div class="export-item sort-show sort-by"><i class="fas fa-download"></i> Export</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-box">
            <table class="table">
                <thead>
                    <tr class="thead-pink">
                        <th>Invoice Number</th>
                        <th>Client Name</th>
                        <th>Created Date</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Paid On</th>
                    </tr>
                </thead>
                <tbody class="table table-hover table-center">

                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-5622</a></td>
                        <td>Amaze Tech</td>
                        <td>16 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-4545</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-2254</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1582</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1526</a></td>
                        <td>Host Technologies</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>29 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>29 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1200</a></td>
                        <td>Alfred Tech </td>
                        <td>05 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>15 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1212</a></td>
                        <td>Kind Softwares </td>
                        <td>02 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1456</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1236</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1566</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@else

<div class="transaction-table card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h5 class="card-title">All Transactions</h5>
            </div>
            <div class="col-auto d-flex align-items-center flex-wrap transaction-shortby">
                    <div class="sort-by sort-show">
                        <span class="sort-title">Show</span>
                        <span class="sortby-fliter">
                            <select class="select">
                                <option>5</option>
                                <option class="sorting">4</option>
                                <option class="sorting">3</option>
                                <option class="sorting">6</option>
                                <option class="sorting">3</option>
                            </select>
                        </span>
                    </div>
                    <div class="export-item sort-show sort-by"><i class="fas fa-download"></i> Export</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-box">
            <table class="table">
                <thead>
                    <tr class="thead-pink">
                        <th>Invoice Number</th>
                        <th>Client Name</th>
                        <th>Created Date</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Paid On</th>
                    </tr>
                </thead>
                <tbody class="table table-hover table-center">

                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-5622</a></td>
                        <td>Amaze Tech</td>
                        <td>16 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-4545</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-2254</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1582</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1526</a></td>
                        <td>Host Technologies</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>29 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>29 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1200</a></td>
                        <td>Alfred Tech </td>
                        <td>05 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-warning-light">Partially Paid</span></td>
                        <td>15 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1212</a></td>
                        <td>Kind Softwares </td>
                        <td>02 Sep 2021</td>
                        <td>$150</td>
                        <td>22 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>22 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1456</a></td>
                        <td>Tech Zone </td>
                        <td>10 Sep 2021</td>
                        <td>$150</td>
                        <td>15 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>10 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1236</a></td>
                        <td>Abc Software</td>
                        <td>13 Sep 2021</td>
                        <td>$150</td>
                        <td>28 Oct 2021</td>
                        <td><span class="badge bg-danger-light">Overdue</span></td>
                        <td>13 Oct 2021, 10:45pm</td>
                    </tr>
                    <tr>
                        <td><a href="view-invoice" class="invoice-id">INV-1566</a></td>
                        <td>Park Inc</td>
                        <td>12 Sep 2021</td>
                        <td>$150</td>
                        <td>25 Oct 2021</td>
                        <td><span class="badge bg-success-light">Paid</span></td>
                        <td>25 Oct 2021, 10:45pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endif


@endsection

@push('dash-js')

@endpush
