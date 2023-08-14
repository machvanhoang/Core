$('a.formLogoutLink').on('click', function (e) {
    e.preventDefault();
    $('#formLogout').submit();
});
$('.btnDelete').on('click', function (e) {
    e.preventDefault();
    const route = $(this).attr('href');
    $('form#formDelete').attr('action', route);
    $('form#formDelete').submit();
});
//upload single file
$('#file-zone[name="file"]').on('change', function (e) {
    e.preventDefault();
    const files = e.target.files;
    const _this = $(this);
    if (files.length) {
        const type = _this.data('type');
        const url = _this.data('url');
        const element = $(_this.data('element'));
        const formData = new FormData();
        formData.append('type', type);
        formData.append('file', files[0]);
        $.ajax({
            url: url,
            data: formData,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

            },
            success: function (response) {
                if (response.success) {
                    const media = response.media;
                    element.find('img').attr('src', media.temp_url);
                    element.find('img').attr('alt', media.alt);
                }
            },
            complete: function () {

            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
function updateElement(element, media) {
    let check = false;
    element.find('.file-item').each((index, el) => {
        const _this = $(el);
        if (!_this.find('img').length) {
            _this.attr('id', `deleteMediaItem__${media.id}`);
            _this.html(`<img src="${media.temp_url}" alt="${media.alt}" />
            <input type="hidden" name="media[]" value="${media.id}" />
            <button type="button" class="deleteMediaItem" data-element="#deleteMediaItem__${media.id}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                </svg>
            </button>`);
            check = true;
        }
        if (check) {
            _this.removeClass('loading');
            return false;
        }
    });
}
$('#file-zones[name="files"]').on('change', function (e) {
    e.preventDefault();
    const files = e.target.files;
    const _this = $(this);
    if (files.length > 0) {
        const type = _this.data('type');
        const url = _this.data('url');
        const element = $(_this.data('element'));
        for (let index = 0; index < files.length; index++) {
            const file = files[index];
            const formData = new FormData();
            formData.append('type', type);
            formData.append('file', file);
            $.ajax({
                url: url,
                data: formData,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    const html = `<div class="file-item loading"></div>`;
                    element.append(html);
                },
                success: function (response) {
                    if (response.success) {
                        const media = response.media;
                        updateElement(element, media);
                    }
                },
                complete: function () { },
                error: function (error) {
                    console.error(error);
                }
            });
        }
        return true;
    }
});

$('body').on('click', '.deleteMediaItem', function (e) {
    e.preventDefault();
    const element = $(this).data('element');
    $(element).remove();
});
