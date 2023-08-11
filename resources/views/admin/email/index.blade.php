@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin / </span> Email</h4>
    </div>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">List of Email</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#No</th>
                                <th>Subject</th>
                                <th>Email type</th>
                                <th>File name</th>
                                <th>Created at</th>
                                <th>Updated_at</th>
                                <th>
                                    <div class="d-flex justify-content-center align-items-center">
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (!$emails->isEmpty())
                                @foreach ($emails as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.email.edit', $item) }}">
                                                <strong>{{ $item->subject }}</strong>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">
                                                {{ $item->mailType->type }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $item->blade_file }}
                                        </td>
                                        <td>
                                            {{ $item->created_at->format('d-m-Y H:i:s') }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at->format('d-m-Y H:i:s') }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a class="btn btn-secondary btn-custom"
                                                    href="{{ route('admin.email.edit', $item) }}">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
