var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}

function validationAlertMessage(text) {
    $('.alert_log').css('display', 'block');
    $('.alert_log').css('opacity', '1');
    $('#username').focus();
    $('#title').text(text);
}

function registerValidationAlertMessage(text) {
    $('.alert_reg').css('display', 'block');
    $('.alert_reg').css('opacity', '1');
    $('#title_reg').text(text);
}

$('#register').click(function (e) {
    e.preventDefault();

    var reg_username = $('#reg_username').val();
    var reg_password = $('#reg_password').val();
    var reg_email = $('#reg_email').val();

    if (reg_username == '' && reg_password == '' && reg_email == '') {
        registerValidationAlertMessage("Please Fill out empty fields");
        $('#reg_username').focus();

    } else if (reg_username == '') {
        registerValidationAlertMessage("Username cannot be empty");
        $('#reg_username').focus();
    } else if (reg_email == '') {
        registerValidationAlertMessage("Email cannot be empty");
        $('#reg_email').focus();
    } else if (reg_password == '') {
        registerValidationAlertMessage("Password cannot be empty");
        $('#reg_password').focus();
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
                    validationAlertMessage("Incorrect Username and Password");
                }
                $('#login').removeAttr('disabled');
                $('.modal-body').css('opacity', '');
            }
        });
    }
});

$('#login').click(function (e) {
    e.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val();

    if (username == '' && password == '') {
        validationAlertMessage("Please enter Username and Password");

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
                    validationAlertMessage("Incorrect Username and Password");
                }
                $('#login').removeAttr('disabled');
                $('.modal-body').css('opacity', '');
            }
        });
    }
});

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function () { div.style.display = "none"; }, 600);
    }
}


$(document).ready(function () {
    $(window).scroll(function () {
        var sticky = $('.main-nav');
        var navbars = $('.navbar');
        scroll = $(window).scrollTop();

        if (scroll >= 100) {
            sticky.addClass('sticky-top');
            sticky.addClass('bg-white');
        }
        else {
            sticky.removeClass('sticky-top');
        }

    });

    $(window).scroll(function () {

        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height();

        if (position == bottom) {

            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var rowperpage = 3;
            row = row + rowperpage;

            if (row <= allcount) {
                $('#row').val(row);
                $.ajax({
                    url: 'fetch-posts.php',
                    type: 'post',
                    data: { row: row },
                    success: function (response) {
                        $(".post:last").after(response).show().fadeIn("slow");
                    }
                });
            }
        }

    });

});