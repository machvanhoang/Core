<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    @include('admin.partials.head')
</head>

<body>
    @yield('content')
    @include('admin.partials.support')
    @include('admin.partials.js')
    <form action="" method="POST" role="form" id="formDelete">
        @csrf
        @method('DELETE')
    </form>
</body>

</html>
