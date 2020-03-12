
function registerValidationAlertMessage(text) {
    $('.alert_reg').css('display', 'block');
    $('.alert_reg').css('opacity', '1');
    $('#title_reg').text(text);
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

$('#register').click(function (e) {
    e.preventDefault();

    var reg_username = $('#reg_username').val();
    var reg_password = $('#reg_password').val();
    var reg_email = $('#reg_email').val();
    var register_form = $('#register_form')

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
    } else if (!validateEmail(reg_email)) {
        registerValidationAlertMessage("Invalid email format");
        $('#reg_email').focus();
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'includes/registration.php',
            data: register_form.serialize(),
            beforeSend: function () {
                $('#register').attr('disabled', 'disabled');
                $('.modal-body').css('opacity', '.7');
            },
            success: function (msg) {
                console.log(msg);
                if (msg == 'username_exist') {
                    registerValidationAlertMessage("Username is taken");
                    $('#reg_email').focus();
                } else if (msg == 'email_exist') {
                    registerValidationAlertMessage("Email already exist");
                } else if (msg == 'success') {
                    setTimeout(() => {
                        window.location.replace('admin/index.php');
                    }, 1000);
                } else {
                    registerValidationAlertMessage(msg);
                }
                $('#register').removeAttr('disabled');
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


