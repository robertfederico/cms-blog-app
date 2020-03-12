
function validationAlertMessage(text) {
    $('.alert_log').css('display', 'block');
    $('.alert_log').css('opacity', '1');
    $('#username').focus();
    $('#title').text(text);
}

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
