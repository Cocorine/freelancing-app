@extends('layouts.index')

@push('css')

<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Bootstrap Tag CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

<!-- Summernote CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

@stack('dash-css')

@endpush

@section('app-content')

@include('livewire.frontend.layouts.partials.header')

    <div class="content" style="transform: none;">
        <div class="container-fluid" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-xl-3 col-md-4 theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                    @include('livewire.backend.layouts.partiels.sidebar')

                </div>

                <div class="col-xl-9 col-md-8" id="conteneur">
                    @yield('backend-content')
                </div>
            </div>
        </div>
    </div>

@include('livewire.frontend.layouts.partials.footer')
@endsection

@push('js')


            <!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

		<!-- Bootstrap Bundle JS -->
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

		<!-- Datatables JS -->
		<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

		<!-- Chart JS -->
		@if(Route::is(['dashboard','freelancer-dashboard']))
		<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
		@endif

		<!-- Sticky Sidebar JS -->
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

        <!-- Fancybox JS -->
		<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

        <!-- Datetimepicker JS -->
		<script src="{{ asset('assets/js/moment.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

		<!-- Owl Carousel -->
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

		<!-- Range JS -->
		@if(Route::is(['developer','project']))
		<script src="{{ asset('assets/js/range.js') }}"></script>
		@endif

		<!-- Slick JS -->
		<script src="{{ asset('assets/js/slick.js') }}"></script>

		<!-- Bootstrap Tagsinput JS -->
		<script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

		<!-- Summernote JS -->
		<script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('assets/js/profile-settings.js') }}"></script>
		<script src="{{ asset('assets/js/script.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                document.getElementsByTagName('body')[0].removeAttribute("class");
                document.getElementsByTagName('body')[0].setAttribute("class",'dashboard-page');
            });
        </script>
        @stack('dash-js')

@endpush
