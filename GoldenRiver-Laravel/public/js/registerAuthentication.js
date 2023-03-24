const nameInput = document.querySelector('input[name="Fullname"]');
const nameError = document.querySelector('input[name="Fullname"] ~ .errorlog');
const emailInput = document.querySelector('input[name="email"]');
const emailError = document.querySelector('input[name="email"] ~ .errorlog');
const passwordInput = document.querySelector('input[name="password"]');
const passwordConfirmInput = document.querySelector('input[name="password_confirmation"]');
const passwordError = document.querySelector('input[name="password_confirmation"] ~ .errorlog');
const submitButton = document.querySelector('button[name="register-button"]');

nameInput.addEventListener('input', () => {
    const name = nameInput.value.trim();
    if (name === '') { // check if the input field is empty
      nameError.textContent = ''; // clear the error message
      nameInput.classList.remove('invalid');
      submitButton.disabled = true;
    } else if (!/^[a-zA-Z\s]+$/.test(name)) {
      nameError.textContent = 'Name can only contain letters and spaces';
      nameError.style.color = 'red';
      nameInput.classList.add('invalid');
      submitButton.disabled = true;
    } else {
      nameError.textContent = '';
      nameError.style.color = '';
      nameInput.classList.remove('invalid');
      checkIfFormIsValid();
    }
  });
  
  emailInput.addEventListener('input', () => {
    const email = emailInput.value.trim();
    if (email === '') { // check if the input field is empty
      emailError.textContent = ''; // clear the error message
      emailInput.classList.remove('invalid');
      submitButton.disabled = true;
    } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
      emailError.textContent = 'Please enter a valid email address';
      emailError.style.color = 'red';
      emailInput.classList.add('invalid');
      submitButton.disabled = true;
    } else {
      emailError.textContent = '';
      emailError.style.color = '';
      emailInput.classList.remove('invalid');
      checkIfFormIsValid();
    }
  });
  

passwordInput.addEventListener('input', validatePassword);
passwordConfirmInput.addEventListener('input', validatePassword);

function validatePassword() {
  if (passwordInput.value === "" && passwordConfirmInput.value === "") {
    passwordError.textContent = "";
    passwordError.style.color = '';
    submitButton.disabled = true;
  } else if (passwordInput.value === "" || passwordConfirmInput.value === "") {
    passwordError.textContent = "Please fill in both password fields";
    passwordError.style.color = 'red';
    submitButton.disabled = true;
  } else if (passwordInput.value !== passwordConfirmInput.value) {
    passwordError.textContent = "Passwords do not match";
    passwordError.style.color = 'red';
    submitButton.disabled = true;
  } else if (passwordInput.value.length < 8) {
    passwordError.textContent = "Password must be at least 8 characters long";
    passwordError.style.color = 'red';
    submitButton.disabled = true;
  } else {
    passwordError.textContent = '';
    passwordError.style.color = '';
    checkIfFormIsValid();
  }
}

function checkIfFormIsValid() {
    if (nameInput.classList.contains('invalid') ||
        emailInput.classList.contains('invalid') ||
        passwordInput.classList.contains('invalid') ||
        passwordConfirmInput.classList.contains('invalid') ||
        nameInput.value.trim() === '' ||
        emailInput.value.trim() === '' ||
        passwordInput.value === '' ||
        passwordConfirmInput.value === '' ||
        !/^[a-zA-Z\s]+$/.test(nameInput.value.trim()) ||
        !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailInput.value.trim()) ||
        passwordInput.value.length < 8 ||
        passwordInput.value !== passwordConfirmInput.value) {
      submitButton.disabled = true;
    } else {
      submitButton.disabled = false;
    }
  }
  
