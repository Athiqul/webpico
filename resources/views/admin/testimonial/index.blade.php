@extends('admin.layout.master_layout')

@section('title')
    Device Packages List| MasterSeller
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
        <div class="breadcrumb-title pe-3"> Device Package List </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Device Package List</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row" data-select2-id="26">
        <div class="col-xl-12 mx-auto" data-select2-id="25">
            <h6 class="mb-0 text-uppercase">Device Package List</h6>
            <hr>
            <div class="card" data-select2-id="24">
                <div class="card-body" data-select2-id="23">

                    <div class="border p-3 rounded" data-select2-id="22">



                        <div class="col">
                            <!-- Button trigger modal -->
                            <a href="{{ route('admin.add.package') }}" class="btn btn-primary">Add Device Package</a>
                            <!-- Modal -->


                            <div class="card mt-3">
                                @if ($activePackages)
                                <h2 class="text-center mt-3">Active Device Package List</h2>
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Star</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Validity</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($activePackages as $key=>$item)


                                                <tr>
                                                    <th scope="row"><?= ++$key ?></th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->star }}</td>
                                                    <td>{{ $item->price }} Point</td>
                                                    <td>{{ $item->validity }} Days</td>
                                                    <td>{{ $item->status==1?'Active':'Inactive' }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.edit.package',encrypt($item->id)) }}" class="btn btn-info"><i class="fadeIn animated bx bx-pencil"></i></a>
                                                        <a href="{{ route('admin.status.package',$item->id) }}" class="status btn {{ $item->status==1?'btn-danger':'btn-success' }}"><i class="fadeIn animated bx bx-{{   $item->status == "1" ? 'x' : 'check' }}"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                @endif

                            </div>
                            <div class="card mt-3">
                                @if (count($inactivePackages)>0)
                                <h2 class="text-center mt-3">Inactive Device Package List</h2>
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Star</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Validity</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($inactivePackages as $key=>$item)


                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->star }}</td>
                                                    <td>{{ $item->price }} Point</td>
                                                    <td>{{ $item->validity }} Days</td>
                                                    <td>{{ $item->status==1?'Active':'Inactive' }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.edit.package',$item->id) }}" class="btn btn-info"><i class="fadeIn animated bx bx-pencil"></i></a>
                                                        <a href="{{ route('admin.status.package',$item->id) }}" class="status btn {{ $item->status==1?'btn-danger':'btn-success' }}"><i class="fadeIn animated bx bx-{{   $item->status == "1" ? 'x' : 'check' }}"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                @endif

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
                text: "Change status of this device package?",
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


