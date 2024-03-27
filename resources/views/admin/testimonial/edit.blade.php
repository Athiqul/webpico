@extends('admin.layout.master_layout')

@section('title')
{{ $package->name }}| MasterSeller
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
        <div class="breadcrumb-title pe-3">{{ $package->name }} Device Package</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.show.package') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $package->name }} Device Package</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row" data-select2-id="26">
        <div class="col-xl-9 mx-auto" data-select2-id="25">
            <h6 class="mb-0 text-uppercase">Update {{ $package->name }} Device Package</h6>
            <hr>
            <div class="card" data-select2-id="24">
                <div class="card-body" data-select2-id="23">
                   <form method="POST" action="{{ route('admin.update.package',$package->id) }}" id="transfer" >
                    @csrf
                    @method('PATCH')
                    <div class="border p-3 rounded" data-select2-id="22">


                        <div class="col-12">
                            <label for="amount" class="form-label">Device Package Name</label>
                            <div class="input-group form-group ">
                                <input type="text" name="name" value="{{ old('name',$package->name) }}" class="form-control border-start-0  @error('name')
                                {{ "is-invalid" }}
                               @enderror" placeholder="Package name"  title="Package Name!" required>

                            </div>

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>

                        <div class="col-12">
                            <label for="amount" class="form-label">Star</label>
                            <div class="input-group form-group">
                                <input type="text" name="star" value="{{ old('star',$package->star) }}" class="form-control border-start-0  @error('star')
                                {{ "is-invalid" }}
                               @enderror" placeholder="Star"   title="Star!" required>

                            </div>
                            @error('star')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>

                        <div class="col-12">
                            <label for="amount" class="form-label">Price</label>
                            <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-coin-stack"></i></span>
                                <input type="text" name="price" value="{{ old('price',$package->price) }}" class="form-control border-start-0  @error('price')
                                {{ "is-invalid" }}
                               @enderror" placeholder="Package Price"   title="Star!" required>

                            </div>

                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>
                        <div class="col-12">
                            <label for="amount" class="form-label">Validity(In days)</label>
                            <div class="input-group form-group">
                                <input type="text" name="validity" placeholder="Package Validity in days" value="{{ old('validity',$package->validity) }}" class="form-control border-start-0  @error('validity')
                                {{ "is-invalid" }}
                               @enderror"   title="Validity" required>

                            </div>
                            @error('validity')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>

                        <div class="col-12">
                            <label for="amount" class="form-label">Device Limit</label>
                            <div class="input-group form-group">
                                <input type="text" name="device_limit" value="{{ old('device_limit',$package->device_limit) }}" placeholder="Device Limit" class="form-control border-start-0  @error('device_limit')
                                {{ "is-invalid" }}
                               @enderror"   title="Validity" required>

                            </div>

                            @error('device_limit')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>



                                        <div class="col-12 mt-3">
                        <div class="form-check form-switch">
                                    <input type="hidden" name="status" value="0">
									<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="status" value="1">


								</div>
                        </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-info text-light px-5"> <i class="bx bxs-send"></i>Update Device Package</button>
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




			$('#transfe').validate({
				rules: {
                     name: {
						required: true,
                        maxlength:50,
                        minlength:3,

					},

					price: {
						required: true,
                        digits:true,

					},
                    star:{
                        required:true,
                        digits:true,
                        max:7,
                        min:1
                    },
                    validity:{
                        required:true,
                        digits:true,
                        min:1,

                    },
                    device_limit:{
                        required:true,
                        digits:true,
                        min:1,
                    }

				},

				messages: {
                    name: {
						required: 'Please Type Device Package Name',

					},
					price: {
						required: 'Please Type price Amount !',
                        digits:'Please type price amount in digits'


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

