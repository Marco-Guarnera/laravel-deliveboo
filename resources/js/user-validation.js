/* Credits
regular expression 101 | regex101.com

link to email regex https://regex101.com/r/WCXPcP/1
link to password regex https://regex101.com/r/ivDsvJ/1
link to italian vat registration number regex https://regex101.com/r/xQ6xR7/1

*/

console.log('JS OK')

// !REGISTER FORM

// |GET INTERESTED DOCUMENT ELEMENTS
// Get the form element for user registration.
const registerForm = document.getElementById('register-form')

// Get input fields for restaurant data.
const restaurantName = document.getElementById('name'); // Restaurant name.
const restaurantAddress = document.getElementById('address'); // Restaurant address.
const PIVA = document.getElementById('piva'); // VAT (PIVA).
const restaurantImg = document.getElementById('logo'); // Restaurant logo.

// Get checkbox for restaurant types
const restaurantTypes = document.getElementById('types'); // Restaurant types.

// Get input fields for restaurant owner credentials.
const email = document.getElementById('email'); // Email.
const password = document.getElementById('password'); // Password.
const confirmPassword = document.getElementById('password-confirm'); // Confirm password.

// |GET ELEMENTS FOR ERROR MESSAGES
const nameError = document.getElementById('name-error');
const addressError = document.getElementById('address-error');
const pivaError = document.getElementById('piva-error');
const logoError = document.getElementById('logo-error');
const emailError = document.getElementById('email-error');
const passwordError = document.getElementById('password-error');
const confirmPasswordError = document.getElementById('password-confirm-error');


// |FORM VALIDATION FUNCTIONS
// Email validation.
const validateEmail = (value) =>
    /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(value);

const isValidEmail = value => validateEmail(value) || "Please provide a valid email address.";

// Password validation arrow function.
const validatePassword = (value) =>
    /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/.test(value);

const isValidPassword = value =>
    validatePassword(value) || "Password must be at least 8 characters long, containing at least one letter, one number and one non-alpha numeric number.";

// Restaurant name validation arrow function.
const validateName = name => name.length > 0 && name.length <= 40;

const isValidName = value => (value && validateName(value)) || "Name is required and must not exceed 40 characters.";

// Restaurant address validation arrow function.
const validateAddress = address => address.length >= 5 && address.length <= 200;

const isValidAddress = value => validateAddress(value) || "Address must be between 5 and 200 characters.";

// Restaurant address validation arrow function.
const validatePiva = value => /^[0-9]{11}$/.test(value);

const isValidPiva = value => validatePiva(value) || "P.IVA must be exactly 11 digits.";

// Create error container element
const createErrorElement = (inputElement) => {
    const errorElement = document.createElement('div');
    errorElement.classList.add('invalid-feedback');
    inputElement.insertAdjacentElement('afterend', errorElement);
    return errorElement;
};

const nameErrorElement = createErrorElement(restaurantName);
const addressErrorElement = createErrorElement(restaurantAddress);
const pivaErrorElement = createErrorElement(PIVA);
const emailErrorElement = createErrorElement(email);
const passwordErrorElement = createErrorElement(password);
const confirmPasswordErrorElement = createErrorElement(confirmPassword);

// |SHOW ERRORS
const showError = (inputElement, errorElement, errorMessage) => {
    inputElement.classList.add('is-invalid');
    inputElement.classList.remove('is-valid');
    errorElement.innerHTML = `<strong>${errorMessage}</strong>`;
};

// |ADD EVENT LISTENER
// Add submit event listener to the registration form
registerForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    let isFormValid = true;

    if (!validateName(restaurantName.value.trim())) {
        showError(restaurantName, nameErrorElement, isValidName(restaurantName.value));
        isFormValid = false;
    }

    if (!validateAddress(restaurantAddress.value.trim())) {
        showError(restaurantAddress, addressErrorElement, isValidAddress(restaurantAddress.value));
        isFormValid = false;
    }

    // Validazione P.IVA
    if (!validatePiva(PIVA.value.trim())) {
        showError(PIVA, pivaErrorElement, validatePiva(PIVA.value));
        isFormValid = false;
    }
    // Validazione email
    if (!validateEmail(email.value.trim())) {
        showError(email, emailErrorElement, isValidEmail(email.value));
        isFormValid = false;
    }

    // Validazione password
    if (!validatePassword(password.value.trim())) {
        showError(password, passwordErrorElement, validatePassword(password.value));
        isFormValid = false;
    }

    // Validazione conferma password
    if (!((confirmPassword.value.trim()) === (confirmPassword.value.trim()))) {
        showError(confirmPassword, confirmPasswordErrorElement, "Passwords do not match.");
        isFormValid = false;
    }

    if (isFormValid) {
        registerForm.submit();
    }
});
