<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('src/assets/favicon.svg')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css ') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel='stylesheet' />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<title>MasterSeller</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{ asset('src/assets/logo.svg')}}" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>

									</div>
									<div class="d-grid">
                                        @error('auth-fail')
                                        <h6 class="text-center text-danger">{{$message}}</h6>
                                        @enderror

									</div>

									<div class="form-body">
										<form  action="{{ route('login') }}" method="POST" id="loginForm">
                                            @csrf
										<div class="col-12 form-group">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" name="email" value="{{old('email')}}">

                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>

                                            @enderror

										</div>
										<div class="col-12 form-group">
											<label for="inputChoosePassword" class="form-label">Enter Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password" value="{{old('password')}}">




											</div>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
										</div>

										<div class="col-md-6">

										</div>

										<div class="col-12 mt-4">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Login</button>
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!--Password show & hide js -->
	<script>
		//toaster


		//Validation
		$(document).ready(function() {
			$('#loginForm').validate({
				rules: {
					email: {
						required: true,
					},
					password: {
					required: true,
				},
                chapcha:{
                    required:true,
                }
				},

				messages: {
					email: {
						required: 'Please Write your account email address',

					},
					password: {
						required: 'Please Write password!',

					},
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				},
			});
		});


	</script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/js/validate.min.js') }}"></script>
</body>

</html>
