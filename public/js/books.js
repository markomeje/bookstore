(function ($) {

	'use strict';

    $('.add-book-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-book-button');
    	var spinner = $('.add-book-spinner');
    	var message = $('.add-book-message');
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
            if (response.status === 'empty-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Please fill in title.');

            } else if (response.status === 'empty-price') {
                handleButton(button, spinner);
                handleErrors($('.price'), $('.price-error'), 'Please fill in price');

            } else if (response.status === 'empty-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Please fill in your description');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();

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

    $('.edit-book-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-book-button');
        var spinner = $('.edit-book-spinner');
        var message = $('.edit-book-message');
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
            if (response.status === 'empty-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Please fill in title.');

            } else if (response.status === 'empty-price') {
                handleButton(button, spinner);
                handleErrors($('.price'), $('.price-error'), 'Please fill in price');

            } else if (response.status === 'empty-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Please fill in your description');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();

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

    $('.delete-book').on('click', function() {
        var caller = $(this);
        if(confirm('Are You Sure')) {
            var request = $.ajax({
                method: 'post',
                url: caller.attr('data-url'),
                processData: false,
                contentType: false
            });

            request.done(function(response) {
                if (response.status === 'success') {
                    alert('Operation Successfull');
                    window.location.reload();
                } else if (response.status === 'error') {
                    alert('Network Error');
                }
            });

            request.fail(function() {
                alert('Network Error');
            });
        }
    });

})(jQuery);
