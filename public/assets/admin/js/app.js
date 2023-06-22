$('a.formLogoutLink').on('click', function (e) {
    e.preventDefault();
    $('#formLogout').submit();
});
