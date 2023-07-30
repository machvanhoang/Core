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
