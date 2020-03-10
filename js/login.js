$('#login').click(function (e) {
    e.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val();

    if (username == '' && password == '') {
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('Please enter username and password', 2, function () {
            $('#username').focus();
        });
    } else {
        $.ajax({
            type: 'POST',
            url: 'includes/login.php',
            data: {
                username: username,
                password: password
            },
            beforeSend: function () {
                $('#login').attr('disabled', 'disabled');
                $('.modal-body').css('opacity', '.7');
            },

            success: function (msg) {
                console.log(msg);
                if (msg == 'success') {
                    setTimeout(() => {
                        window.location.replace('admin/index.php');
                    }, 1000);
                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error(
                        'Invalid Login Credentials! Check Username or Password',
                        2,
                        function () {
                            $('#username').focus();
                        }
                    );
                }
                $('#login').removeAttr('disabled');
                $('.modal-body').css('opacity', '');
            }
        });
    }
});


$(function () {
    $(document).scroll(function () {
        var $nav = $(".sticky-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$(document).ready(function () {
    var scroll_start = 0;
    var startchange = $('#carouselExampleControls');
    var offset = startchange.offset();
    if (startchange.length) {
        $(document).scroll(function () {
            scroll_start = $(this).scrollTop();
            if (scroll_start > offset.top) {
                $(".main-nav").css('background-color', '#f0f0f0');
                $(".main-nav").css('transition', 'background-color .4s linear')

            } else {
                $('.main-nav').css('background-color', 'transparent');
            }
        });
    }
});