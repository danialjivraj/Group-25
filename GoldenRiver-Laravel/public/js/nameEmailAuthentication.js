const nameInput = document.getElementById('name');
const nameError = document.getElementById('name-error');
const emailInput = document.getElementById('email');
const emailError = document.getElementById('email-error');
const submitButton = document.querySelector('button[name="update_emailname"]');

nameInput.addEventListener('input', () => {
  const name = nameInput.value.trim();
  if (!/^[a-zA-Z\s]+$/.test(name)) {
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
  if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
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

function checkIfFormIsValid() {
  if (nameInput.classList.contains('invalid') || emailInput.classList.contains('invalid')) {
    submitButton.disabled = true;
  } else {
    submitButton.disabled = false;
  }
}
