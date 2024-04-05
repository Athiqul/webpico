@extends('admin.layout.master_layout')
@section('title')
    {{ $title }}|Master Sellers
@endsection
@section('need-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('main')
    <div class="page-content" data-select2-id="27">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> {{ $title }} List </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }} List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">

                        <div class="row">
                            <h6>{{ $title }} List</h6>
                            <div class="col-md-12">

                                @if (count($sellers) > 0)
                                    <table id="example" class="table table-striped table-bordered dataTable"
                                        style="width:100%" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Action" aria-sort="ascending"
                                                    style="width: 75.75px;">SL.</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Action" aria-sort="ascending"
                                                    style="width: 75.75px;">Name</th>
                                                <th tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                    style="width: 144.312px;">Mobile</th>
                                                <th tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                    style="width: 144.312px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 239.812px;">Package</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 239.812px;">Balance</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 102.141px;">Purchase</th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 102.141px;">Expense</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 102.141px;">Created_at</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 102.141px;">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($sellers as $key => $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ ++$key }}</td>
                                                    <td><a href="{{ route('admin.seller.profile',encrypt($item->id)) }}" target="_blank"
                                                            rel="noopener noreferrer">{{ ucwords($item->name) }}</a> </td>
                                                    <td class="sorting_1">{{ $item->mobile }}</td>
                                                    <td>{{ $item->email }}</td>

                                                    <td> <a href="{{ route('admin.edit.package',encrypt($item->sellerPackage?->device_package_id)) }}" target="_blank" rel="noopener noreferrer">{{ $item->package }}</a></td>

                                                    <td>{{ $item->balance->current_balance }}</td>
                                                    <td>{{ $item->balance->total_balance }}</td>
                                                    <td>{{ $item->balance->expense_balance }}</td>
                                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>


                                                    <td> <a href="{{ route('admin.seller.profile',encrypt($item->id)) }}" class="btn btn-info" title="View">
                                                            <i class="bx bxs-paper-plane">
                                                            </i>
                                                        </a>

                                                        <a onclick="alertItem(event)" href="{{ route('admin.status.seller',encrypt($item->id)) }}"
                                                            class="btn {{ $item->status==1?'btn-danger':'btn-success' }} " title="{{ $item->status==1?'Make Deactive':'Make Active' }}">
                                                            <i class="bx {{ $item->status==1?'bxs-user-minus':'bxs-user-plus' }}  ">
                                                            </i>
                                                        </a>

                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                @else
                                    <h4 class="text-center ">There is no {{ $title }} List</h4>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('need-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

    <script>
        function alertItem(record) {


            record.preventDefault();
            let status = record.target.closest('a').dataset.status;
            var link = record.target.closest('a').getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to change status of this account?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Request Sent!',
                        'Check the alert',
                        'success'
                    )
                }
            })


        }
        $(document).ready(function() {
            $('#example').DataTable();
        });

        //validation
    </script>

    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
@endsection
