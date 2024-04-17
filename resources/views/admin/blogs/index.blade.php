@extends('admin.layout.master_layout')
@section('title')
   Blogs|WebPico
@endsection
@section('need-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('main')
    <div class="page-content" data-select2-id="27">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blogs </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
                            <h6>Blogs</h6>
                            <div class="col-12">
                                <a href="{{ route('admin.blogs.add') }}" class="btn btn-primary">Add Blog</a>
                            </div>
                            <div class="col-md-12">

                                @if (count($items) > 0)
                                    <table id="example" class="table table-striped table-bordered dataTable"
                                        style="width:100%" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Action" aria-sort="ascending"
                                                    style="width: 75.75px;">SL.</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Action" aria-sort="ascending"
                                                    style="width: 75.75px;">Title</th>

                                                <th tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                    style="width: 144.312px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 239.812px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 239.812px;">Last Update</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 102.141px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($items as $key => $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ ucwords($item->title) }} </td>

                                                    <td>
                                                       <img src="{{ route('public.image',['blogs',$item->image]) }}" height="50px" width="50px" alt="">
                                                    </td>

                                                    <td> <span class="badge rounded bg-{{ $item->status=='1'?'success':'danger' }}">{{ $item->status=='1'?'Active':'Inactive' }}</span> </td>

                                                    <td>{{$item->updated_at->diffForHumans() }}</td>



                                                    <td>

                                                        <a href="{{ route('admin.blogs.edit',encrypt($item->id)) }}" class="btn btn-secondary" title="Edit">
                                                        <i class="fadeIn animated bx bx-pencil"></i>
                                                        </a>

                                                        <a onclick="alertItem(event)" href="{{ route('admin.blogs.status',$item->id) }}"
                                                            class="btn {{ $item->status==1?'btn-warning':'btn-primary' }} " title="{{ $item->status==1?'Make Deactive':'Make Active' }}">
                                                            <i class="bx {{ $item->status==1?'bx-dislike':'bx-like' }}  ">
                                                            </i>
                                                        </a>

                                                        <a  href="javascript;"
                                                          target="_blank"  class="btn {{ $item->status==1?'btn-info':'btn-secondary' }} " title="{{ $item->status==1?'Web In web':'Not Available in web' }}">
                                                            <i class="lni lni-eye"></i>
                                                        </a>
                                                        <a onclick="alertItem(event)" title="Delete this blog" href="{{ route('admin.blogs.delete',$item->id) }}"
                                                            class="btn bg-danger">
                                                            <i class="lni lni-trash"></i>
                                                        </a>
                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                @else
                                    <h4 class="text-center ">There is no Blogs</h4>
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
            let status = record.target.closest('a').getAttribute('title');
            var link = record.target.closest('a').getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to ${status}?`,
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
