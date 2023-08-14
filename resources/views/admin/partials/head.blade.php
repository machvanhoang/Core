<meta charset="utf-8" />
<title>@yield('title', 'Admin')</title>
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="" />
<link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon/favicon.ico') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/flag-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}" />
@yield('css')
<script src="{{ asset('assets/admin/js/helpers.js') }}"></script>
<script src="{{ asset('assets/admin/js/config.js') }}"></script>
