const form = document.getElementById('login-form')
const username = document.getElementById('username')
const password = document.getElementById('password')

form.addEventListener('submit', e => {
    e.preventDefault();
    
    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    console.log(element);
    errorDisplay.innerText = message;
    element.classList.add('ring-2','ring-main')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    element.classList.add('ring-2', 'ring-blue')
    element.classList.remove('ring-2','ring-main')
};

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else {
        setSuccess(password);
    }
}
// ring-2 ring-main