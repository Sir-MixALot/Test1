var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm-pass");

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords don't match!");
    } else {
        confirm_password.setCustomValidity('');
    }
}