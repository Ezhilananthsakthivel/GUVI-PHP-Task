$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault()

        const uname = $('.uname').val()

        $.ajax({
            url: 'php/login.php',
            type: 'POST',
            data: $('form').serialize(),
            beforeSend: function () {
                $('.submit').val('Loading...')
            },
            success: function (res) {
                if (res != "User Not Registered") {
                    if (res != "Incorect Password") {
                        window.localStorage.setItem('uname', res)
                        window.location = "profile.html"
                    } else {
                        alert(res)
                    }
                }
                else {
                    alert(res)
                }
            }
        })

    })
})
