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
const validatePiva = piva => /^[0-9]{11}$/.test(piva);

const isValidPiva = value => validatePiva(value) || "P.IVA must be exactly 11 digits.";

// |ADD EVENT LISTENER
// Add submit event listener to the registration form
registerForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    let isFormValid = false;

    if (!validateName(restaurantName.value)) {
        console.log(isValidName(restaurantName.value));
        isFormValid = false;
    }

    if (!validateAddress(restaurantAddress.value)) {
        console.log(isValidAddress(restaurantAddress.value));
        isFormValid = false;
    }

    if (!validatePiva(PIVA.value)) {
        console.log(isValidPiva(PIVA.value));
        isFormValid = false;
    }

    if (!validateEmail(email.value)) {
        console.log(isValidEmail(email.value));
        isFormValid = false;
    }

    if (!validatePassword(password.value)) {
        console.log(isValidPassword(password.value));
        isFormValid = false;
    }

    if (password.value !== confirmPassword.value) {
        console.log("Passwords do not match.");
        isFormValid = false;
    }

    if (isFormValid) {
        registerForm.submit();
    }
});
