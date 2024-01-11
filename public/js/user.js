$(document).ready(function () {
    $("#registerForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "app/controllers/User.php",
            data: $("#registerForm").serialize() + "&action=register",
            success: function (response) {
                console.log(response);
               
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#loginForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../app/controllers/User.php",
            data: $("#loginForm").serialize() + "&action=login",
            success: function (response) {
                console.log(response);
                
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});


