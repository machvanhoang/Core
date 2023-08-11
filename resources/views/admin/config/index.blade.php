@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin / </span> Config</h4>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.config.update', $config) }}" method="POST" role="form">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>General</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title')is-invalid @enderror" name="title"
                                value="{{ old('title') ?? $config->title }}" id="title" placeholder="">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address')is-invalid @enderror" name="address"
                                value="{{ old('address') ?? $config->address }}" id="address" placeholder="">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email"
                                value="{{ old('email') ?? $config->email }}" id="email" placeholder="">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="hotline" class="form-label">Hotline</label>
                            <input type="text" class="form-control @error('hotline')is-invalid @enderror" name="hotline"
                                value="{{ old('hotline') ?? $config->hotline }}" id="hotline" placeholder="">
                            @error('hotline')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone')is-invalid @enderror" name="phone"
                                value="{{ old('phone') ?? $config->phone }}" id="hotline" placeholder="">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="zalo" class="form-label">Zalo</label>
                            <input type="text" class="form-control @error('zalo')is-invalid @enderror" name="zalo"
                                value="{{ old('zalo') ?? $config->zalo }}" id="hotline" placeholder="">
                            @error('zalo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control @error('website')is-invalid @enderror" name="website"
                                value="{{ old('website') ?? $config->website }}" id="website" placeholder="">
                            @error('website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="fanpage" class="form-label">Fanpage</label>
                            <input type="text" class="form-control @error('fanpage')is-invalid @enderror" name="fanpage"
                                value="{{ old('fanpage') ?? $config->fanpage }}" id="fanpage" placeholder="">
                            @error('fanpage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Javascript</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="google_map" class="form-label font-small">Google map</label>
                            <textarea name="google_map" class="form-control @error('google_map')is-invalid @enderror" id="google_map"
                                cols="30" rows="7">{{ $config->google_map }}</textarea>
                            @error('google_map')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="google_analytics" class="form-label font-small">Google analytics</label>
                            <textarea name="google_analytics" class="form-control @error('google_analytics')is-invalid @enderror"
                                id="google_analytics" cols="30" rows="7">{{ $config->google_analytics }}</textarea>
                            @error('google_analytics')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="google_mastertool" class="form-label font-small">Google master tool</label>
                            <textarea name="google_mastertool" class="form-control @error('google_mastertool')is-invalid @enderror"
                                id="google_mastertool" cols="30" rows="7">{{ $config->google_mastertool }}</textarea>
                            @error('google_mastertool')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="head_js" class="form-label font-small">Head JS</label>
                            <textarea name="head_js" class="form-control @error('head_js')is-invalid @enderror" id="head_js" cols="30"
                                rows="7">{{ $config->head_js }}</textarea>
                            @error('head_js')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body_js" class="form-label font-small">Head JS</label>
                            <textarea name="body_js" class="form-control @error('body_js')is-invalid @enderror" id="body_js" cols="30"
                                rows="7">{{ $config->body_js }}</textarea>
                            @error('body_js')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Notifycation</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer">
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
