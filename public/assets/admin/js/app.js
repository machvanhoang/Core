$('a#logoutLink').on('click', function (e) {
    e.preventDefault();
    $('#formLogout').trigger('submit');
});
