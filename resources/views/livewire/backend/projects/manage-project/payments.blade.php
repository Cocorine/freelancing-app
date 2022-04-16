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
                        <h5 class="card-title">Payments</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-box">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-pink">
                                    <tr>
                                        <th>Client </th>
                                        <th>Name </th>
                                        <th>Type of Payment</th>
                                        <th>Payment</th>
                                        <th>Status </th>
                                        <th>Date Paid</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><span><img src="assets/img/company/img-1.png" class="img-fluid avatar-md rounded-circle mr-2" alt="Logo"></span> <span>Amaze Tech</span></div>
                                        </td>
                                        <td>Research</td>
                                        <td><span class="badge badge-pill bg-outline-red">Milestone</span></td>
                                        <td>$54</td>
                                        <td><span class="badge badge-pill bg-outline-green">Completed</span></td>
                                        <td> 20th October 2018</td>
                                        <td><a href="#" class="file-circle"><i class="far fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><span><img src="assets/img/company/img-2.png" class="img-fluid avatar-md rounded-circle mr-2" alt="Logo"></span> <span>Park Inc</span></div>
                                        </td>
                                        <td>Design</td>
                                        <td><span class="badge badge-pill bg-outline-red">Milestone</span></td>
                                        <td>$52</td>
                                        <td><span class="badge badge-pill bg-outline-green">Completed</span></td>
                                        <td> 25th October 2018</td>
                                        <td><a href="#" class="file-circle"><i class="far fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><span><img src="assets/img/company/img-3.png" class="img-fluid avatar-md rounded-circle mr-2" alt="Logo"></span> <span>Tech Zone</span></div>
                                        </td>
                                        <td>Development</td>
                                        <td><span class="badge badge-pill bg-outline-red">Milestone</span></td>
                                        <td>$40</td>
                                        <td><span class="badge badge-pill bg-outline-green">Completed</span></td>
                                        <td> 28th October 2018</td>
                                        <td><a href="#" class="file-circle"><i class="far fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><span><img src="assets/img/company/img-4.png" class="img-fluid avatar-md rounded-circle mr-2" alt="Logo"></span> <span>Abc Software</span></div>
                                        </td>
                                        <td>Research</td>
                                        <td><span class="badge badge-pill bg-outline-red">Milestone</span></td>
                                        <td>$25</td>
                                        <td><span class="badge badge-pill bg-outline-green">Completed</span></td>
                                        <td> 29th October 2018</td>
                                        <td><a href="#" class="file-circle"><i class="far fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><span><img src="assets/img/company/img-5.png" class="img-fluid avatar-md rounded-circle mr-2" alt="Logo"></span> <span>Host Technologies</span></div>
                                        </td>
                                        <td>Development</td>
                                        <td><span class="badge badge-pill bg-outline-red">Milestone</span></td>
                                        <td>$32</td>
                                        <td><span class="badge badge-pill bg-outline-green">Completed</span></td>
                                        <td> 24th October 2018</td>
                                        <td><a href="#" class="file-circle"><i class="far fa-copy"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('dash-js')

@endpush
