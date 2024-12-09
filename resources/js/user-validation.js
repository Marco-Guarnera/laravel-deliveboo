/*
Credits:
regular expression 101 | regex101.com

Links to regex used in validations:
- Email regex: https://regex101.com/r/WCXPcP/1
- Strong password regex: https://regex101.com/r/ivDsvJ/1
- Italian VAT number regex: https://regex101.com/r/xQ6xR7/1
*/

// TODO: Update password validation to a stronger one if required in the future.
// Example for strong password validation with regex:
/*
const validatePassword = (value) =>
    /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/.test(value);
const isValidPassword = value =>
    validatePassword(value) || "Password must be at least 8 characters long, containing at least one letter, one number and one non-alphanumeric character.";
*/

console.log('JS OK');

// !REGISTER FORM

// |GET INTERESTED DOCUMENT ELEMENTS
// Form and input fields for restaurant owner registration.
const registerForm = document.getElementById('register-form');

// Input fields for restaurant data.
const restaurantName = document.getElementById('name'); // Restaurant name input.
const restaurantAddress = document.getElementById('address'); // Restaurant address input.
const PIVA = document.getElementById('piva'); // VAT (P.IVA) input.
const restaurantImg = document.getElementById('logo'); // Restaurant logo input.

// Input fields for restaurant owner credentials.
const email = document.getElementById('email'); // Email input.
const password = document.getElementById('password'); // Password input.
const confirmPassword = document.getElementById('password-confirm'); // Confirm password input.

// |GET ELEMENTS FOR ERROR MESSAGES
// These elements will hold error messages next to each input field.
const nameErrorElement = document.getElementById('name-error');
const addressErrorElement = document.getElementById('address-error');
const pivaErrorElement = document.getElementById('piva-error');
const logoErrorElement = document.getElementById('logo-error');
const emailErrorElement = document.getElementById('email-error');
const passwordErrorElement = document.getElementById('password-error');
const confirmPasswordErrorElement = document.getElementById('password-confirm-error');

// |FORM VALIDATION FUNCTIONS

// Validates email format using regex.
const validateEmail = (value) =>
    /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(value);

const isValidEmail = (value) =>
    validateEmail(value) || "Please provide a valid email address.";

// Validates password: at least 8 characters, no spaces.
const validatePassword = (value) =>
    /^(?=\S{8,}$).+$/.test(value);

const isValidPassword = (value) =>
    validatePassword(value) || "Password must be at least 8 characters long.";

// Validates restaurant name: 1-40 characters.
const validateName = (name) =>
    name.length > 0 && name.length <= 40;

const isValidName = (value) =>
    validateName(value) || "Name is required and must not exceed 40 characters.";

// Validates restaurant address: 5-200 characters.
const validateAddress = (address) =>
    address.length >= 5 && address.length <= 200;

const isValidAddress = (value) =>
    validateAddress(value) || "Address must be between 5 and 200 characters.";

// Validates VAT (P.IVA): exactly 11 digits.
const validatePiva = (value) =>
    /^[0-9]{11}$/.test(value);

const isValidPiva = (value) =>
    validatePiva(value) || "P.IVA must be exactly 11 digits.";

// Validates that at least one restaurant type is selected.
const validateTypes = () => {
    const selectedTypes = document.querySelectorAll('input[name="types[]"]:checked');
    return selectedTypes.length > 0;
};

const isValidTypes = () =>
    validateTypes() || "At least one type must be selected.";

// |UTILITY FUNCTIONS

// | Dynamically create an error element for restaurant types
// Select the last checkbox container for error message placement
const typesContainer = document.querySelector('.form-check:last-of-type');
const typesError = createErrorElement(typesContainer);

// Dynamically creates an error element for each input field.
const createErrorElement = (inputElement) => {
    const errorElement = document.createElement('div');
    errorElement.classList.add('invalid-feedback');
    inputElement.insertAdjacentElement('afterend', errorElement);
    return errorElement;
};

// Create error elements for all inputs.
const nameError = createErrorElement(restaurantName);
const addressError = createErrorElement(restaurantAddress);
const pivaError = createErrorElement(PIVA);
const emailError = createErrorElement(email);
const passwordError = createErrorElement(password);
const confirmPasswordError = createErrorElement(confirmPassword);

// Displays error messages and applies `is-invalid` class to input.
const showError = (inputElement, errorElement, errorMessage) => {
    inputElement.classList.add('is-invalid');
    inputElement.classList.remove('is-valid');
    errorElement.innerHTML = `<strong>${errorMessage}</strong>`;
};

// Marks an input as valid and removes error messages.
const showValid = (inputElement, errorElement) => {
    inputElement.classList.remove('is-invalid');
    inputElement.classList.add('is-valid');
    errorElement.innerHTML = ''; // Clears any existing error messages.
};

// |ADD EVENT LISTENER
// Adds submit event listener to the registration form.
registerForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    let isFormValid = true;

    // Validate restaurant name.
    if (!validateName(restaurantName.value.trim())) {
        showError(restaurantName, nameError, isValidName(restaurantName.value));
        isFormValid = false;
    } else {
        showValid(restaurantName, nameError);
    }

    // Validate restaurant address.
    if (!validateAddress(restaurantAddress.value.trim())) {
        showError(restaurantAddress, addressError, isValidAddress(restaurantAddress.value));
        isFormValid = false;
    } else {
        showValid(restaurantAddress, addressError);
    }

    // Validate P.IVA.
    if (!validatePiva(PIVA.value.trim())) {
        showError(PIVA, pivaError, isValidPiva(PIVA.value));
        isFormValid = false;
    } else {
        showValid(PIVA, pivaError);
    }

    // Validate email.
    if (!validateEmail(email.value.trim())) {
        showError(email, emailError, isValidEmail(email.value));
        isFormValid = false;
    } else {
        showValid(email, emailError);
    }

    // Validate password.
    if (!validatePassword(password.value.trim())) {
        showError(password, passwordError, isValidPassword(password.value));
        isFormValid = false;
    } else {
        showValid(password, passwordError);
    }

    // Validate confirm password.
    if (password.value.trim() !== confirmPassword.value.trim()) {
        showError(confirmPassword, confirmPasswordError, "Passwords do not match.");
        isFormValid = false;
    } else {
        showValid(confirmPassword, confirmPasswordError);
    }

    // Validate restaurant types
    if (!validateTypes()) {
        console.log(isValidTypes());
        isFormValid = false;
    }

    // If the form is valid, allow submission.
    if (isFormValid) {
        registerForm.submit();
    }
});
