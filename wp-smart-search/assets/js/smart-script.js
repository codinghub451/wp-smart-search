jQuery(document).ready(function ($) {

    /* AI Query and Response through AJAX */

    $("#get-query").keypress(function (e) {
        if (e.which == 13) {
            var user_query = $(this).val();
            var userQuery = $("#get-query").val();
            $("#ai-query").html("<b>User Query</b>: " + userQuery);
            $("#get-query").val("");
            var aiResponse = $("#ai-response");
            aiResponse.html("");
            $('.loader').show();
            jQuery.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'smart_search',
                    query: user_query,
                },
                success: function (response) {

                    /* Handling response from server */

                    aiResponse.html("<b>AI Response</b>: " + response);
                    $('.loader').hide();
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    });

    /* Copy to Clipboard Function */

    $('#success').hide();
    $('#copy-text').click(function () {
        console.time('time1');
        var temp = $("<input>");
        $("body").append(temp);
        temp.val($('#ai-response').text()).select();
        var copyText = document.execCommand("copy");
        if (copyText) {
            console.log("Copy text successfully!");
            $('#success').show();
            setTimeout(function () { $('#success').hide(); }, 5000);
        }
        temp.remove();
        console.timeEnd('time1');
    });

});
