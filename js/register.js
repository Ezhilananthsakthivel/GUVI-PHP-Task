$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault()
        // const data = {
        //     uname: $('.uname').val(),
        //     email: $('.email').val(),
        //     password: $('.password').val(),
        //     cpassword: $('.cpassword').val()
        // }

        $.ajax({
            url: 'php/register.php',
            type: 'POST',
            data: $('form').serialize(),
            beforeSend: function () {
                $('#submit').val('Loading...')
            },
            success: function (res) {
                if (res) {
                    if (res != "User Already Exists") {
                        alert("Registration Successfully")
                        window.location = 'index.html'
                    }
                }
                else {
                    alert("User Already Exists")
                }
            }
        })
    })
})