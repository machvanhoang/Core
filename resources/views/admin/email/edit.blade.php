@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin / Email / </span> {{ $email->subject }}</h4>
        <a href="{{ route('admin.email.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.email.update', $email) }}" role="form" id="formSubmit" method="POST">
        @csrf
        @method('PUT')
        <div class="card mb-4">
            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input class="form-control" type="text" id="subject" name="subject" placeholder=""
                                autofocus="" value="{{ old('subject') ?? ($email->subject ?? '') }}">
                            @error('subject')
                                <div class="admin_error_field_message w-100">
                                    <p class="text-danger m-0">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="form_html" class="form-label">Template email</label>
                        </div>
                        <div id="content" style="height: 800px;">{{ $content }}</div>
                        <textarea name="content" style="display: none"></textarea>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script>
        var content = ace.edit("content");
        content.setTheme("ace/theme/monokai");
        content.session.setMode("ace/mode/html");
        $('#formSubmit button[type="submit"]').on('click', function(e) {
            e.preventDefault();
            var html = content.getValue();
            $('[name="content"]').val(html);
            $('#formSubmit').submit();
        });
    </script>
@endsection
