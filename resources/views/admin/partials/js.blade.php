<script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('assets/admin/js/popper.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/admin/js/menu.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@yield('js')
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
