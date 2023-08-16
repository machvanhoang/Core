const formCreateProduct = $('#formCreateProduct');
const formUpdateProduct = $('#formUpdateProduct');
$('.btnSaveProduct').on('click', async function (e) {
    e.preventDefault();
    const action = $(this).data('action');
    formCreateProduct.attr('action', action);
    const response = await $.ajax({
        url: action,
        type: "POST",
        dataType: "json",
        data: formCreateProduct.serialize(),
        beforeSend: function () {
            formCreateProduct.find('.invalid-feedback').text("");
            formCreateProduct.find('.form-control, .form-select').removeClass('is-invalid');
        },
        success: function (response) {
            return response;
        },
        complete: function () { },
        error: function (error) {
            let errors = error.responseJSON.errors;
            $.each(errors, function (field, messages) {
                console.log(field, messages);
                $(`[name="${field}"]`).addClass('is-invalid');
                $(`.feedback_${field}`).text(messages);
            });
        }
    });
    if (response.success) {
        formCreateProduct[0].reset();
        window.location.href = response.redirect;
    }
});

$('.btnUpdateProduct').on('click', async function (e) {
    e.preventDefault();
    const action = $(this).data('action');
    formUpdateProduct.attr('action', action);
    const response = await $.ajax({
        url: action,
        type: "POST",
        dataType: "json",
        data: formUpdateProduct.serialize(),
        beforeSend: function () {
            formUpdateProduct.find('.invalid-feedback').text("");
            formUpdateProduct.find('.form-control, .form-select').removeClass('is-invalid');
        },
        success: function (response) {
            return response;
        },
        complete: function () { },
        error: function (error) {
            let errors = error.responseJSON.errors;
            $.each(errors, function (field, messages) {
                $(`[name="${field}"]`).addClass('is-invalid');
                $(`.feedback_${field}`).text(messages);
            });
        }
    });
});
