jQuery(function ($) {
    let page = 2; // Start from page 2
    const loadMoreContainer = $('#content'); // Replace with your content container ID or class

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            $.ajax({
                url: jm_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'jm_infinite_scroll',
                    page: page,
                },
                success: function (response) {
                    if ($.trim(response).length) {
                        loadMoreContainer.append(response);
                        page++;
                    }
                },
            });
        }
    });
});
