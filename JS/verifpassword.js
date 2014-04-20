/*
Information on the JS Document :

This document check if the passwords are the
same during the registration. 
*/

function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('The passwords do not match');
    } else {
        input.setCustomValidity('');
   }
}

