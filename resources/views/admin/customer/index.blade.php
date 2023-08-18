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
                <h5 class="card-header">List of Customer</h5>
                <div class="table-responsive text-nowrap p-3">
                    <table class="table" id="customers_table">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            loadDatatable();
        });

        function loadDatatable() {
            $('#customers_table').DataTable({
                ajax: {
                    url: "{{ route('admin.customer.datatables') }}",
                    type: "GET"
                },
                columns: [
                    {
                        data: 'id'
                    },
                    {
                        data: 'full_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'id',
                        className: 'text-center',
                        render: function (data, type, row, meta) {
                            return `<a href="#${data}">Edit</a>`;
                        }
                    }
                ],
                processing: true,
                serverSide: true,
                order: [[0, 'DESC']]
            });
        }
    </script>
@endsection
