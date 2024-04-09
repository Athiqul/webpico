@extends('admin.layout.master_layout')

@section('title')
    Add Ourwork| MasterSeller
@endsection

@section('need-css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <script src="https://cdn.tiny.cloud/1/b69tdpiu66ovx82jjhzsf0eooi7hehgia7avmhbdiy1s6rx4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection


@section('main')
    <div class="page-content" data-select2-id="27">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Ourwork</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.ourwork.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Ourwork</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row" data-select2-id="26">
            <div class="col-xl-9 mx-auto" data-select2-id="25">
                <h6 class="mb-0 text-uppercase">Add Ourwork</h6>
                <hr>
                <div class="card" data-select2-id="24">
                    <div class="card-body" data-select2-id="23">
                        <form method="POST" action="{{ route('admin.ourwork.add') }}" id="transfer" enctype="multipart/form-data">
                            @csrf

                            <div class="border p-3 rounded" data-select2-id="22">


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Type Title</label>
                                    <div class=" form-group ">
                                      <input type="text" class="form-control border-start-0" name="title" placeholder="Type title of ourwork" title="Type title" value="{{ old('title') }}" required>

                                    </div>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Type By </label>
                                    <div class=" form-group ">
                                      <input type="text" class="form-control border-start-0" name="by" placeholder="Type Work By of ourwork" title="Type Work By" value="{{ old('by') }}" required>

                                    </div>

                                    @error('by')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Upload Image </label>
                                    <div class=" form-group ">
                                      <input type="file" class="form-control border-start-0" name="image" accept="image/jpeg,image/png" onchange="changeImage(event)"  title="upload image" value="{{ old('image') }}" required>

                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-6 mb-2">
                                    <img src="{{ asset('assets/images/no_image.jpg') }}" id="preview" width="300px" height="250px" alt="">

                                </div>







                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-info text-light px-5"> <i
                                            class="bx bxs-send"></i>Add Ourwork</button>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>

      function changeImage(event)
{
  if(event.target.files.length>0){
    var src=URL.createObjectURL( event.target.files[0]);
    let preview=document.getElementById('preview');
    preview.src=src;
  }
}
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });



        $('#transfer').validate({
            rules: {
               title: {
                    required: true,


                },

                by: {
                    required: true,



                },
                image: {
                    required: true,



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
