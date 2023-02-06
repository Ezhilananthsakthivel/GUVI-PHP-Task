$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault()

        $.ajax({
            url: 'php/login.php',
            type: 'POST',
            data: $('form').serialize(),
            beforeSend: function () {
                $('#submit').val('Loading...')
            },
            success: function (res) {
                if (res != "Incorect password" && res != "User Not Registered") {
                    window.location = 'profile.html'
                }
                else {
                    alert("Failed... Try Again")
                }
            }
        })

    })
})