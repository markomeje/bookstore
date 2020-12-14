(function ($) {

	'use strict';

    $('.payment-button').on('click', function(event){
    	var button = $('.payment-button');
        var spinner = $('.payment-spinner');
        button.attr('disabled', true);
        spinner.removeClass('d-none');

        var request = $.ajax({
            method: 'post',
            url: $(this).attr('data-url'),
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 'invalid-user') {
                handleButton(button, spinner);
                alert('Please Login To Continue');

            } else if (response.status === 'empty-book') {
                handleButton(button, spinner);
                alert('Invalid Operation');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                window.location.href = response.redirect;

            } else if (response.status === 'error') {
                handleButton(button, spinner);
                alert('Try Again');

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