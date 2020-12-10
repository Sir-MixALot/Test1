$(document).ready(function() {
    $('#ajax_login_form').submit(function(e) {
        e.preventDefault();
        $.post("1.php", $("#ajax_login_form").serialize(),
            function(response) {
                result = jQuery.parseJSON(response);
                $('#result_form').html("Hello: " + result.signin_login);
                $('#container').hide();
                $('#response').show('slow');
            });
        return false;
    });
});

$(document).ready(function() {
    $('#ajax_signup_form').submit(function(e) {
        e.preventDefault();
        $.post("1.php", $("#ajax_signup_form").serialize(),
            function(response) {
                result = jQuery.parseJSON(response);
                $('#result_form').html("Hello, " + result.signup_login + ", ur name is: " + result.name + "<br>Ur password is: " + result.signup_password + "<br>Email: " + result.email);
                $('#container').hide();
                $('#response').show('slow');
            });
        return false;
    });
});