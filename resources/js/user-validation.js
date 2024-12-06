console.log('JS OK')

// !REGISTER FORM

// |GET INTERESTED DOCUMENT ELEMENTS
// Get the form element for user registration
const registerForm = document.getElementById('register-form')

// Get input fields for restaurant data
const restaurantName = document.getElementById('name'); // Restaurant name
const restaurantAddress = document.getElementById('address'); // Restaurant address
const PIVA = document.getElementById('piva'); // VAT (PIVA)
const restaurantImg = document.getElementById('logo'); // Restaurant logo

// Get checkbox for restaurant types
const restaurantTypes = document.getElementById('types'); // Restaurant types

// Get input fields for restaurant owner credentials
const registerEmail = document.getElementById('eamil'); // Email
const registerPassword = document.getElementById('password'); // Password
const confirmPassword = document.getElementById('password-confirm'); // Confirm password

// |ADD EVENT LISTENER
// Add submit event listener to the registration form
registerForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    // Validation errors array
    const errors = [];

    // Validate restaurant name
    if (restaurantName.value.trim() === '') {
        errors.push('Restaurant name is required.');
    }

    // Validate restaurant address
    if (restaurantAddress.value.trim().length < 5) {
        errors.push('Restaurant address must be at least 5 characters long.');
    }

    if (registerPassword.value.trim() !== confirmPassword.value.trim()) {
        errors.push('Passwords do not match.');
    }

    if (errors.length > 0) {
        console.error('Validation errors:', errors);
    } else {
        console.log('Form is valid!');
        registerForm.submit();
    }
})
