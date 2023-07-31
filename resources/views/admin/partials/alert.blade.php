<div class="main-alert @if (Session::has('success') || Session::has('error') || Session::has('warning')) mb-2 @else d-none @endif">
    @if (Session::has('success'))
        <div class="alert alert-success">
            <p class="m-0">{!! session('message') !!}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <p class="m-0">{!! session('message') !!}</p>
        </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert-warning">
            <p class="m-0">{!! session('message') !!}</p>
        </div>
    @endif
</div>
