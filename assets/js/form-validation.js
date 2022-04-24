var username = document.getElementById('username');
var password = document.getElementById('password');
var confirmp = document.getElementById('confirmp');
var email = document.getElementById('email');
var phone = document.getElementById('phone');
var address = document.getElementById('address');
var form = document.getElementById('form');

var errorElement = document.getElementById('errors');




form.addEventListener('submit', (e) => {
    let messages = [];
    if (username.value === '' || username.value == null) {
        messages.push('username is required');
        // console.log("username must have a value")
    }

    if (username.value.length < 3 && username.value != '') {
        messages.push('username is too short');
    }

    if (password.value === '') {
        messages.push('password is required');
    }

    if (password.value.length <= 6 && password.value != '') {
        messages.push('password must be longer than 6 characters');
    }

    if (!(password.value === confirmp.value)) {
        // console.log(password);
        // console.log(confirmp);
        messages.push('passwords do not match');
    }

    if (email.value === '') {
        messages.push('email is required');
    }

    if (phone.value === '') {
        messages.push('phone number is required');
    }

    if (address.value === '') {
        messages.push('address is required');
    }






    if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join('\n ')

    }
});