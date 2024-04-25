function validation() {
    var password = document.getElementById('pass').value.trim().toLowerCase(); // Trim and convert to lowercase
    var confirmPassword = document.getElementById('con-pass').value.trim().toLowerCase(); // Trim and convert to lowercase

    if (password !== confirmPassword) {
        alert("Passwords do not match. Please check and try again.");
        return false;
    }
    return true;
}