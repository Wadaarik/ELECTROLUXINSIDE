const togglePassword = document.querySelector('#visible_pwd');
const password = document.querySelector('#password_usr');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
});

// ==============================================

const togglePassword_an = document.querySelector('#visible_pwd');
const password_an = document.querySelector('#password_an');

togglePassword_an.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password_an.getAttribute('type') === 'password' ? 'text' : 'password';
    password_an.setAttribute('type', type);
});

