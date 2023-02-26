var password = document.getElementById("password");
var confirm_password = document.getElementById("password-confirm");
var error_message = document.getElementById("error-message");
var update_password_button = document.getElementById("update-password-button");

function validatePassword() {
    if (password.value != confirm_password.value) {
        error_message.innerHTML = "Passwords do not match";
        update_password_button.disabled = true;
    } else if (password.value.length < 8) {
        error_message.innerHTML = "Password must be at least 8 characters long";
        update_password_button.disabled = true;
    } else {
        error_message.innerHTML = "";
        update_password_button.disabled = false;
    }
}

password.addEventListener("input", validatePassword);
confirm_password.addEventListener("input", validatePassword);
