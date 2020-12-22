(function ($) {

	'use strict';

    $('.register-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.register-button');
    	var spinner = $('.register-spinner');
    	var message = $('.register-message');
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

            }else if (response.status === 'email-exists') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Email already in use. Try another.');

            } else if (response.status === 'invalid-phone') {
                handleButton(button, spinner);
                handleErrors($('.phone'), $('.phone-error'), 'Your phone number is required.');

            } else if (response.status === 'empty-password') {
                handleButton(button, spinner);
                handleErrors($('.password'), $('.password-error'), 'Please fill in your password');

            } else if (response.status === 'unmatched-password') {
                handleButton(button, spinner);
                handleErrors($('.confirmpassword'), $('.confirmpassword-error'), 'Passwords do not match.');

            }else if (response.status === 'invalid-captcha') {
                handleButton(button, spinner);
                handleErrors($('.captcha'), $('.captcha-error'), 'Invalid captcha');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful. Please Check Your Email To Proceed.').fadeIn();
                window.location.href = response.redirect

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

    $('.resend-email-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.resend-email-button');
        var spinner = $('.resend-email-spinner');
        var message = $('.resend-email-message');
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

            }else if (response.status === 'email-not-exists') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'The entered email does not exist.');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful. Please Check Your Email To Proceed.').fadeIn();

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
