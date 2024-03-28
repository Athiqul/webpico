@extends('admin.layout.master_layout')

@section('title')
    Testimonial List| WebPico
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
        <div class="breadcrumb-title pe-3"> Testimonial List </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Testimonial List</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row" data-select2-id="26">
        <div class="col-xl-12 mx-auto" data-select2-id="25">
            <h6 class="mb-0 text-uppercase">Testimonial List</h6>
            <hr>
            <div class="card" data-select2-id="24">
                <div class="card-body" data-select2-id="23">

                    <div class="border p-3 rounded" data-select2-id="22">



                        <div class="col">
                            <!-- Button trigger modal -->
                            <a href="{{ route('admin.testimonial.add') }}" class="btn btn-primary">Add Testomonial</a>
                            <!-- Modal -->


                            <div class="card mt-3">

                                <h2 class="text-center mt-3">Active Testimonial List</h2>
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Client Name</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Last Updated</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($items as $key=>$item)


                                                <tr>
                                                    <th scope="row"><?= ++$key ?></th>
                                                    <td>{{ $item->client_name }}</td>
                                                    <td>{{ $item->company_name }}</td>
                                                    <td><img src="{{ $item->image==null?asset('assets/images/no_image.jpg') : route('public.image',['folder'=>'testimonials','image'=>$item->image]) }}" width="50px" height="50px" alt="{{ $item->client_name  }}'s image"></td>
                                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                    <td> <span class="badge rounded bg-{{ $item->status==1?'success':'danger' }}">{{ $item->status==1?'Active':'Inactive' }}</span> </td>

                                                    <td>
                                                        <a href="{{ route('admin.testimonial.edit',encrypt($item->id)) }}" class="btn btn-info"><i class="fadeIn animated bx bx-pencil"></i></a>
                                                        <a href="{{ route('admin.testimonial.status',encrypt($item->id)) }}" class="status btn {{ $item->status==1?'btn-danger':'btn-success' }}"><i class="fadeIn animated bx bx-{{   $item->status == "1" ? 'x' : 'check' }}"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
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
@endsection


@section('need-js')
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    //Validation


    $(function() {
        $(document).on('click', '.status', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Change status of this client testimonial?",
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


