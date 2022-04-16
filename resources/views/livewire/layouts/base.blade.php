<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @yield('title') }}{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts.partials.head')
    @stack('css')
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="modal fade" id="app-modal" tabindex="-1" role="dialog" aria-labelledby="app-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="app-modal-class" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Files</h4>
                    <span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                </div>
                <div class="modal-body">

                    <form id="app-modal-form" method="POST" action="">
                        @csrf

                        <p id="app-modal-form-method"></p>

                        @yield('form-content')
                    </form>
                    <form action="milestones">
                        <div class="modal-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Milestone Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Budget</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Progress</label>
                                        <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="50" class="rangslider" id="myRange">
                                            <p class="text-muted">Progress <span id="demo"></span> %</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section text-right">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button"{{--  onclick="$('#app-modal-form')[0].reset();"  --}}class=" modal-close btn btn-sm btn-alt-secondary me-1"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary app-modal-submit-btn-title"
                        id="app-modal-submit-btn">Valider</button>
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>


		<div class="modal fade" id="file">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Files</h4>
						<span class="modal-close"><a href="#" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
					</div>
					<div class="modal-body">
						<form action="milestones">
							<div class="modal-info">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Milestone Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Budget</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End Date</label>
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Progress</label>
											<div class="slidecontainer">
												<input type="range" min="1" max="100" value="50" class="rangslider" id="myRange">
												<p class="text-muted">Progress <span id="demo"></span> %</p>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="submit-section text-right">
								<button type="submit" class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

    @include('layouts.partials.footer-scripts')

    @stack('js')
    @livewireScripts
</body>
</html>
