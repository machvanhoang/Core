<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            const files = e.target.files;
            if (files.length) {
                for (let i = 0; i < files.length; i++) {
                    const formData = new FormData();
                    formData.append('file', files[i]);
                    formData.append('type', 'multiple');
                    $.ajax({
                        url: "{{ route('single') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
            }
        });
        $('[name="single"]').on('change', async function(e) {
            console.log('single');
            const files = e.target.files;
            const formData = new FormData();
            formData.append('file', files[0]);
            formData.append('type', 'media');
            await $.ajax({
                url: "{{ route('single') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                }
            });
        });
    </script>
</body>

</html>
