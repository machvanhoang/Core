@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/</span> Create</h4>
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header border-bottom">User create</h5>
                <form action="{{ route('admin.user.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Fullname</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                                value="{{ old('name') }}" id="name" placeholder="David Mach">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control @error('username')is-invalid @enderror" type="text"
                                name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="email" placeholder="name@example.com">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password')is-invalid @enderror"
                                name="password" value="{{ old('password') }}" id="password" placeholder="******">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">New password</label>
                            <input type="password" class="form-control @error('confirm_password')is-invalid @enderror"
                                name="confirm_password" value="{{ old('confirm_password') }}" id="confirm_password"
                                placeholder="******">
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status')is-invalid @enderror" name="status" id="status">
                                <option value="">Choice status</option>
                                @foreach ($status as $item)
                                    <option {{ old('status') == $item ? 'selected' : '' }} value="{{ $item }}">
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
