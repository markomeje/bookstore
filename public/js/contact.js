(function ($) {

	'use strict';

    $('.contact-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.contact-button');
    	var spinner = $('.contact-spinner');
    	var message = $('.contact-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 'invalid-email') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Your email is invalid.');

            } else if (response.status === 'invalid-phone') {
                handleButton(button, spinner);
                handleErrors($('.phone'), $('.phone-error'), 'Your phone number is required.');

            } else if (response.status === 'invalid-firstname') {
                handleButton(button, spinner);
                handleErrors($('.firstname'), $('.firstname-error'), 'Firstname must be between 3 - 55 characters.');

            } else if (response.status === 'invalid-lastname') {
                handleButton(button, spinner);
                handleErrors($('.lastname'), $('.lastname-error'), 'Lastname must be between 3 - 55 characters.');

            }else if (response.status === 'invalid-message') {
                handleButton(button, spinner);
                handleErrors($('.message'), $('.message-error'), 'Message must be between 5 - 500 characters.');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Thank You For Contacting Us. We Will Get Back To You Shortly.').fadeIn();

            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            } else {
                handleButton(button, spinner);
                alert('Network Error');
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

})(jQuery);
