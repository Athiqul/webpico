@extends('admin.layout.master_layout')

@section('title')
Add Testimonial| WebPico
@endsection

@section('need-css')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
@endsection


@section('main')
<div class="page-content" data-select2-id="27">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Testimonal</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Testimonal</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row" data-select2-id="26">
        <div class="col-xl-9 mx-auto" data-select2-id="25">
            <h6 class="mb-0 text-uppercase">Add Testimonal</h6>
            <hr>
            <div class="card" data-select2-id="24">
                <div class="card-body" data-select2-id="23">
                   <form method="POST" action="{{ route(admin.testimonial.add) }}" id="transfer" enctype="multipart/form-data">
                    @csrf

                    <div class="border p-3 rounded" data-select2-id="22">


                        <div class="col-12">
                            <label for="amount" class="form-label">Client Name</label>
                            <div class="input-group form-group ">
                                <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-control border-start-0  @error('client_name')
                                {{ "is-invalid" }}
                               @enderror" placeholder="Client Name"  title="Client Name" required>

                            </div>

                            @error('client_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>

                        <div class="col-12">
                            <label for="amount" class="form-label">Quote:</label>
                            <div class="input-group form-group">
                                <input type="text" name="quote" value="{{ old('quote') }}" class="form-control border-start-0  @error('quote')
                                {{ "is-invalid" }}
                               @enderror" placeholder="Quotaion of clients"   title="Quotation!" required>

                            </div>
                            @error('quote')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>

                        <div class="col-12">
                            <label for="amount" class="form-label">Image</label>
                            <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-coin-stack"></i></span>
                                <input type="file" name="image"  class="form-control border-start-0  @error('image')
                                {{ "is-invalid" }}
                               @enderror" required>

                            </div>

                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>




            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-info text-light px-5"> <i class="bx bxs-send"></i>Add Testimonal</button>
            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection


@section('need-js')
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>




			$('#transfer').validate({
				rules: {
                     client_name: {
						required: true,
                        maxlength:50,
                        minlength:3,

					},

					image: {
						required: true,


					},
                   quotation:{
                        required:true,

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





</script>
@endsection

