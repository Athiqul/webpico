@extends('admin.layout.master_layout')

@section('title')
    Add Services| MasterSeller
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
            <div class="breadcrumb-title pe-3">Add Services</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Service</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row" data-select2-id="26">
            <div class="col-xl-9 mx-auto" data-select2-id="25">
                <h6 class="mb-0 text-uppercase">Add Service</h6>
                <hr>
                <div class="card" data-select2-id="24">
                    <div class="card-body" data-select2-id="23">
                        <form method="POST" action="{{ route('admin.service.add') }}" id="transfer">
                            @csrf

                            <div class="border p-3 rounded" data-select2-id="22">


                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Select Category</label>
                                    <div class=" form-group ">
                                        <select name="category_id" id="categoryId"
                                            class="form-control text-black  @error('sub_category_id')
                                {{ 'is-invalid' }}
                               @enderror"
                                            required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }} {{ old('category_id') == $category->id ? 'selected' : '' }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>

                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Select Sub Category</label>
                                    <div class="input-group form-group ">
                                        <select name="sub_category_id" id="subCategory"
                                            class="form-control border-start-0  @error('sub_category_id')
                                {{ 'is-invalid' }}
                               @enderror"
                                            id="sub_category" disabled >
                                            <option value="">Choose Sub Category</option>

                                        </select>

                                    </div>

                                    @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12 mb-2">
                                    <label for="amount" class="form-label">Description</label>
                                    <div class="input-group form-group">
                                        <textarea name="desc" id="" rows="10" required>{!! old('desc') !!} </textarea>

                                    </div>
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>





                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-info text-light px-5"> <i
                                            class="bx bxs-send"></i>Add Service</button>
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
        let category = document.getElementById('categoryId');
        let subCategory = document.getElementById('subCategory');
        category.addEventListener('change', (e) => {

            let id = e.target.value.split(' ')[0];
            if(id=='')
            {
                subCategory.innerHTML = '';
                subCategory.disabled = true;
                return;

            }


            subCategory.disabled = false;
            subCategory.innerHTML = '';
            let url = "{{ route('category_wise_sub_categories.api',':id') }}";
            url = url.replace(':id', id);
            axios.get(url).then((response) => {
                if(response.data.length<1)
                {
                    subCategory.innerHTML = `<option value="">No Sub Category Found</option>`;
                    subCategory.disabled = true;
                    sub.required=false;
                    return;
                }
                response.data.forEach(element => {
                    let option = document.createElement('option');
                    option.value = element.id;
                    option.innerHTML = element.name;
                    subCategory.appendChild(option);
                    subCategory.required=true;
                    return;
                });
            });
        });

        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });



        $('#transfer').validate({
            rules: {
                category_id: {
                    required: true,


                },

                desc: {
                    required: true,
                    minlength: 10,


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
