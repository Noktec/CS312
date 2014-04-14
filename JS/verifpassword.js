//When the form is being send, their will be a message saying that the passwords
//do not match.
function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('The passwords do not match');
    } else {
        input.setCustomValidity('');
   }
}

