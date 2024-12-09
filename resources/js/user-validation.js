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
const validateEmail = (email) => {
    if (!/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(email)) {
        return "Please provide a valid email address.";
    }
    return ""; // Valid
};

// Validates password: at least 8 characters, no spaces.
const validatePassword = (password) => {
    if (!/^(?=\S{8,}$).+$/.test(password)) {
        return "Password must be at least 8 characters long.";
    }
    return ""; // Valid
};

// Validates confirm password.
const validateConfirmPassword = (password, confirmPassword) => {
    if (password.trim() === "" || confirmPassword.trim() === "") {
        return "Password and confirmation cannot be empty.";
    }
    if (password !== confirmPassword) {
        return "Passwords do not match.";
    }
    return ""; // Valid
};

// Validates restaurant name: 1-40 characters.
const validateName = (name) => {
    if (name.length === 0) return "Name is required.";
    if (name.length > 40) return "Name must not exceed 40 characters.";
    return ""; // Valid
};

// Validates restaurant address: 5-200 characters.
const validateAddress = (address) => {
    if (address.length < 5) return "Address must be at least 5 characters.";
    if (address.length > 200) return "Address must not exceed 200 characters.";
    return ""; // Valid
};

// Validates VAT (P.IVA): exactly 11 digits.
const validatePiva = (piva) => {
    if (!/^[0-9]{11}$/.test(piva)) return "P.IVA must be exactly 11 digits.";
    return ""; // Valid
};

// Validates that at least one restaurant type is selected.
const validateTypes = () => {
    const selectedTypes = document.querySelectorAll('input[name="types[]"]:checked');
    if (selectedTypes.length === 0) return "At least one type must be selected.";
    if (selectedTypes.length > 2) return "You can select a maximum of two types.";
    return ""; // Valid
};

// |UTILITY FUNCTIONS


// Dynamically creates an error element for each input field.
const createErrorElement = (inputElement) => {
    const errorElement = document.createElement('div');
    errorElement.classList.add('invalid-feedback');
    inputElement.insertAdjacentElement('afterend', errorElement);
    return errorElement;
};

// | Dynamically create an error element for restaurant types
// Select the last checkbox container for error message placement
const typesContainer = document.querySelector('.form-check:last-of-type');
const typesError = createErrorElement(typesContainer);
const typeCheckboxes = document.querySelectorAll('input[name="types[]"]'); // Select all checkboxes

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
    const nameMessage = validateName(restaurantName.value.trim());
    if (nameMessage) {
        showError(restaurantName, nameError, nameMessage);
        isFormValid = false;
    } else {
        showValid(restaurantName, nameError);
    }

    // Validate restaurant address.
    const addressMessage = validateAddress(restaurantAddress.value.trim());
    if (addressMessage) {
        showError(restaurantAddress, addressError, addressMessage);
        isFormValid = false;
    } else {
        showValid(restaurantAddress, addressError);
    }

    // Validate P.IVA.
    const pivaMessage = validatePiva(PIVA.value.trim());
    if (pivaMessage) {
        showError(PIVA, pivaError, pivaMessage);
        isFormValid = false;
    } else {
        showValid(PIVA, pivaError);
    }

    // Validate email.
    const emailMessage = validateEmail(email.value.trim());
    if (emailMessage) {
        showError(email, emailError, emailMessage);
        isFormValid = false;
    } else {
        showValid(email, emailError);
    }

    // Validate password.
    const passwordMessage = validatePassword(password.value.trim());
    if (passwordMessage) {
        showError(password, passwordError, passwordMessage);
        isFormValid = false;
    } else {
        showValid(password, passwordError);
    }

    // Validate confirm password.
    const confirmPasswordMessage = validateConfirmPassword(password.value.trim(), confirmPassword.value.trim());
    if (confirmPasswordMessage) {
        showError(confirmPassword, confirmPasswordError, confirmPasswordMessage);
        isFormValid = false;
    } else {
        showValid(confirmPassword, confirmPasswordError);
    }

    // Validate restaurant types
    const typesMessage = validateTypes(); // Get the validation result
    if (typesMessage) {
        // Add 'is-invalid' class to each checkbox
        typeCheckboxes.forEach((checkbox) => checkbox.classList.add('is-invalid'));
        // Add 'is-invalid' class to the container
        typesContainer.classList.add('is-invalid');
        // Show the error message
        typesError.innerHTML = `<strong>${typesMessage}</strong>`;
        isFormValid = false;
    } else {
        typeCheckboxes.forEach((checkbox) => showValid(checkbox, typesError));
        typesContainer.classList.remove('is-invalid');
        typesError.innerHTML = '';
    }

    // If the form is valid, allow submission.
    if (isFormValid) {
        registerForm.submit();
    }
});
