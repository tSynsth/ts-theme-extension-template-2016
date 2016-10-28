jQuery(function ($) {
	// jQuery code comes here

    $(document).ready(function () {
        ts_helloajax();
        ts_goodbyeajax();
    });

    function ts_helloajax() {

        var parent = $('*[class*="ts-helloajax"]');

        $.each(parent, function (i, value) {

            var item = $(this);

            var button = item.find('.btn'),
                callback = item.find('.callback');

            button.on('click', function () {

                var content = $(this).data('content');

                //console.log(content);
                $.ajax({
                    url: HA.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'helloajax',
                        content: content
                    },
                    complete: function( xhr, status ){
                        console.log("Request complete: " + status);
                    },
                    success: function (response) {
                        console.log('Request success: ' + response);
                        callback.html(response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
    }

    function ts_goodbyeajax() { // EXMPALE SCRIPT BUT PIKLIST SHORTCODE FEATURE WITH AJAX NOT WORKING

        var parent = $('*[class*="ts-goodbyeajax"]');

        $.each(parent, function (i, value) {

            var item = $(this);

            var button = item.find('.btn'),
                callback = item.find('.callback');

            button.on('click', function () {

                var content = $(this).data('content');
                //console.log(content);
                $.ajax({
                    url: GA.ajax_url_piklist,
                    type: 'POST',
                    data: {
                        action: 'goodbyeajax',
                        content: content
                    },
                    complete: function( xhr, status ){
                        console.log("Request complete: " + status);
                    },
                    success: function (response) {
                        console.log('Request success: ' + response);
                        callback.html(response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
    }

});