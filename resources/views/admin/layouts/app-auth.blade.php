<!DOCTYPE html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/auth/formValidation.min.css') }}" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/auth/page-auth.css') }}">
    <script src="{{ asset('assets/admin/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/admin/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hammer.js') }}"></script>
    <script src="{{ asset('assets/admin/js/i18n.js') }}"></script>
    <script src="{{ asset('assets/admin/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/admin/js/menu.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/js/FormValidation.min.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/js/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script src="{{ asset('assets/admin/js/auth/pages-auth.js') }}"></script>
</body>

</html>
