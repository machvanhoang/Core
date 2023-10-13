@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/</span> Customer</h4>
        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">Add customer</a>
    </div>
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">List of Provinces</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap p-3">
                        <div class="d-flex">

                            <form class="d-flex justify-content-start pb-3" action="{{ route('admin.import.upload') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="file" name="file_upload" class="form-control me-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal"
                                data-bs-target="#exportModal">
                                Export
                            </button>
                        </div>
                        <table class="table table-hover" id="provinces_table">
                            <thead class="table-light">
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modals --}}
    <div class="modal fade" id="exportModal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.export.index') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Enter your email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnExport" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            loadDatatable();
        });

        function loadDatatable() {
            $('#provinces_table').DataTable({
                ajax: {
                    url: "{{ route('admin.import.datatables') }}",
                    // 162778
                    type: "GET"
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'slug'
                    },
                    {
                        data: 'code'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'id',
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            return `<a href="#${data}">Edit</a>`;
                        }
                    }
                ],
                processing: true,
                serverSide: true,
                order: [
                    [0, 'DESC']
                ]
            });
        }
    </script>
@endsection
