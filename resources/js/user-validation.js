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
const conforminPassword = document.getElementById('password-confirm'); // Confirm password

// |ADD EVENT LISTENER
// Add submit event listener to the registration form
registerForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    console.log('Form submitted!')
})
