@extends('admin.layout.master_layout')

@section('title')
    SubCategory List| WebPico
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
            <div class="breadcrumb-title pe-3"> Sub Category List </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Category List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row" data-select2-id="26">
            <div class="col-xl-12 mx-auto" data-select2-id="25">
                <h6 class="mb-0 text-uppercase">Sub Category List</h6>
                <hr>
                <div class="card" data-select2-id="24">
                    <div class="card-body" data-select2-id="23">

                        <div class="border p-3 rounded" data-select2-id="22">



                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" onclick="addOpenModal()">Add
                                    Category</button>

                                <!-- Modal -->


                                <div class="card mt-3">

                                    <h2 class="text-center mt-3"> Sub Category List</h2>
                                    <div class="card-body" id="showRecords">

                                    </div>


                                </div>

                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    {{--  Modal --}}
    <div class="modal " id="exampleVerticallycenteredModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Sub Category For Services</h5>
                    <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">

                </div>
            </div>
        </div>
    </div>
    @endsection


    @section('need-js')
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/validate.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('moment.min.js') }}"></script>
        <script>
            //Validation

            function showRecords() {
                let showRecords = document.getElementById('showRecords');


                axios.get("{{ route('services_categories.api') }}").then(function(res) {
                    console.log(res.data);
                    if (res.data.length < 1) {
                        showRecords.innerHTML = `<div class="alert alert-danger" role="alert">No Data Found</div>`;
                    } else {
                        let html = `<table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">slug</th>

                                            <th scope="col">Last Updated</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

                        res.data.forEach(function(item, key) {
                            html += `
                            <tr>
                                                <th scope="row">${++key}</th>
                                                <td>${ item.name }</td>
                                                <td>${ item.slug }</td>

                                                <td>${ moment(item.updated_at).format('Do MMMM YY, h:mm:ss a') }</td>
                                                <td >
                                                    <button type="button" data-id=${item.id} class="btn btn-primary" onclick="editCategory(${item.id})">Edit</button>
                                                </tr>
                            `;
                        });

                        showRecords.innerHTML = html + `</tbody> </table>`;

                    }
                });
            }

            showRecords();


            //Edit Category
            function editCategory(id) {

                axios.get("/api/services-categories-update/"+id).then(function (response){
                    if(response.data.error){
                        console.log(response.data.error);
                        Swal.fire({
                            icon: 'error',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        return ;
                    }
                    console.log(response.data.payload);
                    let modalTitle = document.getElementById("modalTitle");
                let modalBody = document.getElementById("modalBody");
                modalTitle.innerText = "Edit Category";

                modalBody.innerHTML = `<form method="POST" enctype="multipart/form-data" onsubmit="updateCategory(event,${id})">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Category Name" value="${response.data.payload.name}">
                            <span class="text-danger" id="nameError"></span>
                        </div>


                        <div class="mb-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Service Category</button>
                        </div>
                    </form>`
                $("#exampleVerticallycenteredModal").modal("show");
                });


             return;


            }

            //Update Category function

            function updateCategory(event,id) {
                event.preventDefault();
                let name = document.getElementById("name").value;
                let nameError = document.getElementById('nameError');



                if (name.length < 3 || name.length > 255) {
                    nameError.innerText = 'Name must be at least 255 characters Or greater then 3 characters';
                    return;
                }

                axios.post("/api/services-categories-update/"+id,{
                    name:name,
                }).then(function (response){
                    if(response.data.error){
                        console.log(response.data.error);
                        Swal.fire({
                            icon: 'error',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        return ;
                    }

                    Swal.fire({
                        icon:'success',
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#exampleVerticallycenteredModal").modal("hide");
                    showRecords();
                });
            }
            //Add Category function
            function addOpenModal() {
                let modalTitle = document.getElementById("modalTitle");
                let modalBody = document.getElementById("modalBody");
                modalTitle.innerText = "Add Category For Services";
                modalBody.innerHTML = `<form method="POST" enctype="multipart/form-data" onsubmit="addCategory(event)">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Category Name">
                            <span class="text-danger" id="nameError"></span>
                        </div>


                        <div class="mb-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Service Category</button>
                        </div>
                    </form>`
                $("#exampleVerticallycenteredModal").modal("show");

                return;
            }

            function addCategory(event) {
                event.preventDefault();
                let nameError = document.getElementById('nameError');
                let name = document.getElementById('name').value;


                if (name.length < 3 || name.length > 255) {
                    nameError.innerText = 'Name must be at least 255 characters Or greater then 3 characters';
                    return;
                }

                axios.post("{{ route('services_categories.store.api') }}", {
                    name: name
                }).then(function(response) {
                    console.log(response.data);
                    if (response.data.error == false) {
                        Swal.fire({
                            icon: 'success',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        document.getElementById('closeModal').click();
                        name.value = '';
                        nameError.innerText = '';
                        showRecords();

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.data.message.name,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }).catch(function(error) {
                    console.log(error)
                });

            }
            $(function() {
                $(document).on('click', '.status', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Change status of this Social Media?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change status!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'updated',
                                'Status updated.',
                                'success'
                            )
                        }
                    })


                });

            });
        </script>
    @endsection
