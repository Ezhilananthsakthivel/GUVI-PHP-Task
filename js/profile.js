$(document).ready(function () {
    const user = window.localStorage.getItem("redstr")
    if (!user) {
        window.location = 'index.html'
    }
    else {
        $.ajax({
            url: 'php/profile.php',
            type: 'POST',
            data: user,
            success: function (res) {
                res = JSON.parse(res)
                let { dbuser } = res
                if (res.status == "User Found") {
                    $(".uname").html(`User Name: ${dbuser.uname}`);
                    $(".email").html(`Email: ${res.email}`)
                    $(".pnumber").val(dbuser.pnumber)
                    $(".dob").val(dbuser.dob)
                    $(".degree").val(dbuser.degree)
                    $(".yop").val(dbuser.yop)
                }
                else {
                    alert("Login")
                    window.location = 'index.html'
                }
            }
        })

        $(".edit").click(function () {
            $(".submit").removeClass("d-none")
            $(".form-control").removeAttr("readonly")
            $(".form-control").attr("required")
        })

        $('form').submit(function (e) {
            e.preventDefault()

            $.ajax({
                url: 'php/profile.php',
                type: 'POST',
                data: $('form').serialize() + "&redstr=" + user,
                success: function (res) {
                    if (res) {
                        alert(res)
                        localStorage.clear()
                        location = "index.html"
                    }
                    else
                        location = "index.html"
                }
            })
        })
    }
})