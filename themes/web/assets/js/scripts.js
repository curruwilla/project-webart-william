$(function () {
    //AJAX FORM
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        let form = $(this);
        let load = $(".ajax_load");
        let flashClass = "ajax_response";
        let flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }
                } else {
                    flash.fadeOut(100);
                }

                //redirect
                if (response.redirect) {
                    window.setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 1000);
                } else {
                    load.fadeOut(200);
                }
            },
            complete: function () {
                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });
    });

    //DELETE CONFIRM
    $('html, body').on('click', '.delete_action', function (e) {
        let relTo = $(this).attr('rel');
        $(this).fadeOut(10, function () {
            $('.' + relTo + '[id="' + $(this).attr('id') + '"] .delete_action_confirm:eq(0)').fadeIn(10);
        });

        e.preventDefault();
        e.stopPropagation();
    });

    //DELETE CONFIRM ACTION
    $('html, body').on('click', '.delete_action_confirm', function (e) {
        let form = $(this);
        let delId = $(this).attr('id');
        let relTo = $(this).attr('rel');
        let callback = $(this).attr('callback');
        let flashClass = "ajax_response";
        let flash = $("." + flashClass);

        form.ajaxSubmit({
            url: callback,
            type: "POST",
            dataType: "json",
            success: function (response) {
                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }

                    if (response.success) {
                        $('.' + relTo + '[id="' + delId + '"]').fadeOut('fast');
                    }
                } else {
                    flash.fadeOut(100);
                }
            }
        });

        e.preventDefault();
        e.stopPropagation();
    });

    $('html, body').on('click', '.delete_action', function (e) {
        var relTo = $(this).attr('rel');
        $(this).fadeOut(10, function () {
            $('.' + relTo).fadeIn(10);
        });

        e.preventDefault();
        e.stopPropagation();
    });
});