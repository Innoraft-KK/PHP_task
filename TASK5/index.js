const form = document.querySelector('form');
const firstNameInput = document.querySelector('#first_name');
const lastNameInput = document.querySelector('#last_name');
const inputField = document.querySelector('#sub-mark');
const phoneInput = document.querySelector('#phone');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const inputValue = inputField.value;
  const phoneValue = phoneInput.value;
  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;
  const marksPattern = /^[a-zA-Z]+\|[0-9]+$/m;
  const phonePattern = /^\+91[1-9]\d{9}$/;
  if (!firstNamePattern.test(firstName)) {
    alert('First name should contain only alphabets');
    firstNameInput.focus();
    return;
  }
  if (!lastNamePattern.test(lastName)) {
    alert('Last name should contain only alphabets');
    lastNameInput.focus();
    return;
  }
  if (!marksPattern.test(inputValue)) {
    alert('Enter subject marks in the format Subject|Marks in each line');
    inputField.focus();
    return;
  }
  if (!phonePattern.test(phoneValue)) {
    alert('Enter a valid Indian phone number starting with +91 and having 10 digits');
    phoneInput.focus();
    return;
  }
  form.submit();
});
function updateFullName() {
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  document.getElementById("full_name").value = firstName + " " + lastName;
}
