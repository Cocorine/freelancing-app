<?php $page = 'dashboard'; ?>
@extends('layouts.base')

@push('css')


@endpush
@section('content')

	<!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar -->
                    @include('backend.layouts.partials.sidebar')
                <!-- /sidebar -->

                <div class="col-xl-9 col-md-8">
                    @yield('backend-content')
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Content -->


</div>
<!-- /Main Wrapper -->
@endsection

@push('js')


    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById("main-menu-wrapper").style.display = "none";
        });
    </script>

@endpush
