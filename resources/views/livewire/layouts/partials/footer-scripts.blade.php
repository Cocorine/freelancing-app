        <!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

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
		<script src="{{ asset('assets/js/owl.carousel.min.js"') }}></script>

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
