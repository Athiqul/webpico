@extends('admin.layout.master_layout')

@section('title')
    Contact |WebPico
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
            <div class="breadcrumb-title pe-3">Contact</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row" data-select2-id="26">
            <div class="col-xl-9 mx-auto" data-select2-id="25">
                <h6 class="mb-0 text-uppercase">Contact Information</h6>
                <hr>
                <div class="card" data-select2-id="24">
                    <div class="card-body" data-select2-id="23">
                        <form method="POST" action="{{ route('admin.game.update', $game->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="border p-3 rounded" data-select2-id="22">


                                <div class="col-12">
                                    <label for="amount" class="form-label">Address</label>
                                    <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i
                                                class="bx bxs-coin-stack"></i></span>
                                        <input type="text" name="address"
                                            value="{{ old('address', $item?->address ?? '') }}"
                                            class="form-control border-start-0" title="Address!" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-12">
                                    <label for="amount" class="form-label">Email</label>
                                    <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i
                                                class="bx bxs-coin-stack"></i></span>
                                        <input type="email" name="email" value="{{ old('email', $item?->email ?? '') }}"
                                            class="form-control border-start-0" title="Email!" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-12">
                                    <label for="amount" class="form-label">Mobile</label>
                                    <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i
                                                class="bx bxs-coin-stack"></i></span>
                                        <input type="text" name="mobile" value="{{ old('mobile', $item?->mobile ?? '') }}"
                                            class="form-control border-start-0" title="Mobile!" required>
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-12">
                                    <label for="amount" class="form-label">Phone</label>
                                    <div class="input-group form-group"> <span class="input-group-text bg-transparent"><i
                                                class="bx bxs-coin-stack"></i></span>
                                        <input type="text" name="phone" value="{{ old('phone', $item?->email ?? '') }}"
                                            class="form-control border-start-0" title="Type Phone number" >
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>






                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-info text-light px-5"> <i class="bx bxs-send"></i>
                                        Contact {{ $item?'Update':'Add' }} Information</button>
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
                address: {
                    required: true,
                    maxlength:255,
                    minlength:3,


                },

                mobile: {
                    required: true,
                },
                email:{
                    required: true,
                },
                phone:{
                    required: true,
                    maxlength: 255,
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
