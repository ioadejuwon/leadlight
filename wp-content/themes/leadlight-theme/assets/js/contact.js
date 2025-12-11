jQuery(document).ready(function ($) {
    console.log("AJAX JS Loaded");

    $('#contact-form').submit(function (e) {
        e.preventDefault();
        console.log("Form Submitted");

        let form = $(this);

        showNotification('Sending...', 'info', true);

        let data = {
            action: 'ajax_contact_submit',
            nonce: ajax_contact_obj.nonce,
            name: form.find('input[name="name"]').val(),
            email: form.find('input[name="email"]').val(),
            comment: form.find('textarea[name="comment"]').val(),
        };

        $.post(ajax_contact_obj.ajax_url, data)
            .done(function (response) {
                console.log("Response:", response);
                if (response.success) {
                    showNotification(response.data.message, 'success', true);
                    form[0].reset();
                } else {
                    showNotification(response.data.message, 'error', true);
                }
            })
            .fail(function (xhr, status, error) {
                console.log("AJAX failed:", xhr.responseText);
                showNotification('Something went wrong.', 'error', true);
            });
    });
});

// $(document).ready(function ($) {
//     console.log("AJAX JS Loadedc");

//     $('#contact-form').submit(function (e) {
//         e.preventDefault();
//         console.log("Form Submitted");

//         let form = $(this);

//         showNotification('Sending...', 'info', false);

//         let data = {
//             action: 'ajax_contact_submit',
//             nonce: ajax_contact_obj.nonce,
//             name: form.find('input[name="name"]').val(),
//             email: form.find('input[name="email"]').val(),
//             comment: form.find('textarea[name="comment"]').val(),
//         };

//         $.post(ajax_contact_obj.ajax_url, data)
//         .done(function (response) {
//             console.log("Response:", response);
//             if (response.success) {
//                 showNotification(response.data.message, 'success', false);
//                 form[0].reset();
//             } else {
//                 showNotification(response.data.message, 'error', false);
//             }
//         })
//         .fail(function (xhr, status, error) {
//             console.log("AJAX failed:", xhr.responseText);
//             showNotification('Something went wrong.', 'error', false);
//         });
//     });
// });
