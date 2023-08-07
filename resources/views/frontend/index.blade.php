<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body style="display: flex;justify-content: center;align-items: center">
    <div>
        <div>
            <a href="{{ route('admin.login.get') }}">
                Login
            </a>
        </div>
        <div>
            <input type="file" name="single" id="single" style="display: none">
            <label for="single" class="btn bg-black text-white pd-10">
                Single
            </label>
        </div>
        <div>
            <input type="file" name="multiple" multiple id="multiple" style="display: none">
            <label for="multiple">
                multiple
            </label>
        </div>
    </div>
    <script>
        $('[name="multiple"]').on('change', function(e) {
            console.log(e.target.files);
        });
    </script>
</body>

</html>
