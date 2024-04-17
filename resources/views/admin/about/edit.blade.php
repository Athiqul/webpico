@extends('admin.layout.master_layout')

@section('title')
   About Page| MasterSeller
@endsection

@section('need-css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
    <link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <script src="https://cdn.tiny.cloud/1/b69tdpiu66ovx82jjhzsf0eooi7hehgia7avmhbdiy1s6rx4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


@endsection


@section('main')
    <div class="page-content" data-select2-id="27">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">About Page</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">About Page</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row" data-select2-id="26">
            <div class="col-xl-9 mx-auto" data-select2-id="25">
                <h6 class="mb-0 text-uppercase">About Page</h6>
                <hr>
                <div class="card" data-select2-id="24">
                    <div class="card-body" data-select2-id="23">
                        <form method="POST" action="{{ route('admin.about') }}" id="transfer" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="border p-3 rounded" data-select2-id="22">


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Type About Main Heading Title</label>
                                    <div class=" form-group ">
                                      <input type="text" class="form-control border-start-0" name="about_title" placeholder="Type About Main Heading Title" title="Type About Main Heading Title" value="{{ old('about_title',$item?->about_title??'') }}" required>

                                    </div>

                                    @error('about_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">About Page Video Link</label>
                                    <div class=" form-group ">
                                      <input type="text" class="form-control border-start-0" name="video_link" placeholder="About Page Video Link" title="About Page Video Link" value="{{ old('video_link',$item?->video_link??'') }}" required>

                                    </div>

                                    @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">About Short Description</label>
                                    <div class="input-group form-group">
                                        <textarea name="about_short_desc" id="" rows="10" required>{!! old('about_short_desc',$item?->about_short_desc??'') !!} </textarea>

                                    </div>
                                    @error('about_short_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">About Right Side Description</label>
                                    <div class="input-group form-group">
                                        <textarea name="about_right_desc" id="" rows="10" required>{!! old('about_right_desc',$item?->about_right_desc??'') !!} </textarea>

                                    </div>
                                    @error('about_right_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Right Side Image </label>
                                    <div class=" form-group ">
                                      <input type="file" class="form-control border-start-0" name="right_image" accept="image/jpeg,image/png" onchange="changeImage(event,'right')"  title="upload image" required >

                                    </div>

                                    @error('right_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-6 mb-2">
                                    <img src="{{($item==null)?asset('assets/images/no_image.jpg'): route('public.image',['about',$item->right_image]) }}" id="rightPreview" width="300px" height="250px" alt="">

                                </div>


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">About Left Description</label>
                                    <div class="input-group form-group">
                                        <textarea name="about_left_desc" id="" rows="10" required>{!! old('about_left_desc',$item?->about_left_desc??'') !!} </textarea>

                                    </div>
                                    @error('about_left_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Left Side Image </label>
                                    <div class=" form-group ">
                                      <input type="file" class="form-control border-start-0" name="left_image" accept="image/jpeg,image/png" onchange="changeImage(event,'left')"  title="upload image" required >

                                    </div>

                                    @error('left_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-6 mb-2">
                                    <img src="{{($item==null)?asset('assets/images/no_image.jpg'): route('public.image',['about',$item->left_image]) }}" id="leftPreview" width="300px" height="250px" alt="">

                                </div>











                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-info text-light px-5"> <i
                                            class="bx bxs-send"></i>{{ $item==null?"Add About page":"Update About Page" }}</button>
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
    <script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>


      function changeImage(event,side)
{
  if(event.target.files.length>0){
    var src=URL.createObjectURL( event.target.files[0]);

    let preview=(side=='right')?document.getElementById('rightPreview'):document.getElementById('leftPreview');
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

                desc: {
                    required: true,



                },

                tags:{
                  required: true,
                }



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
