const form = document.querySelector('form');
const firstNameInput = document.querySelector('#first_name');
const lastNameInput = document.querySelector('#last_name');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();

  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;

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
  form.submit();
});
function updateFullName() {
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  document.getElementById("full_name").value = firstName + " " + lastName;
}
