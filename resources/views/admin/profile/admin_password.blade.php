@extends('admin.layout.master_layout')

@section('main')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Change Password</h6>
            <hr>
            <div class="card">
                @include('admin.assets.alert')
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="post" id="loginForm">
                        @csrf
                         @method('PUT')
                        <div class="col-12 form-group">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control @error('current_password')
                                {{ 'is-invalid' }}
                            @enderror" id="current_password" placeholder="Current password" required>

                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="col-12 form-group">
                            <label for="password" class="form-label">New  Password</label>
                            <input type="password" name="password" class="form-control @error('password')
                                {{ 'is-invalid' }}
                            @enderror" id="password" placeholder="New password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                              @enderror

                        </div>

                        <div class="col-12 form-group">
                            <label for="inputEmailAddress" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')
                                {{ 'is-invalid' }}
                            @enderror" id="inputEmailAddress" placeholder="Confirm Password" required>

                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        </div>


                        <div class="col-4 mt-3">
                            <div class="d-grid justify-content-center">
                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Change Password</button>
                            </div>
                        </div>

                </form>
                </div>
            </div>







        </div>
    </div>
    <!--end row-->

@endsection

@section('need-js')
@section('need-js')

<script src="{{ asset('assets/js/validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
			$('#loginForm').validate({
				rules: {
					 password: {
						required: true,
                        minlength:6,
                        maxlength:255,
					},

                    current_password: {
						required: true,
                        minlength:6,
                        maxlength:255,
					},

                    password_confirmation: {

                        equalTo: {
                param: "#password",

       }
					},

				},

				messages: {
					current_password: {
						required: 'Please type current password',
                        minlength:'Too short password not allowed!',
                        maxlength:'Too long password not allowed!',

					},

                    password: {
						required: 'Please type new password',
                        minlength:'Too short password not allowed!',
                        maxlength:'Too long password not allowed!',

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

@endsection
