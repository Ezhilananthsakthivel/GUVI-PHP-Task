$(document).ready(function () {
    const uname = window.localStorage.getItem("uname")
        $.ajax({
            url: 'php/profile.php',
            type: 'POST',
            data: uname,
            success: function (res) {
                
            }
        })
})