console.log('JS OK')

// !REGISTER FORM

// |GET INTERESTED DOCUMENT ELEMENTS

//
/* const registerForm = document.getElementById('register-form')
const restaurantName = document.getElementById('name')
const restaurantAddress = document.getElementById('address')
const PIVA = document.getElementById('piva')
const restaurantImg = document.getElementById('logo')
const restaurantTypes = document.getElementById('types')
const registerEmail = document.getElementById('eamil')
const registerPassword = document.getElementById('password')
const conforminPassword = document.getElementById('password-confirm')

 */

registerForm.addEventListener('submit', function (event) {

})

// !Register form

// |Get interesed document elements
// Get the form element for user registration
const registerForm = document.getElementById('register-form')

// Get the input fields for the restaurant's data
const restaurantName = document.getElementById('name') // Restaurant name input field
const restaurantAddress = document.getElementById('address') // Restaurant address input field
const PIVA = document.getElementById('piva') // PIVA input field
const restaurantImg = document.getElementById('logo') // Restaurant logo input field

// Get the checkbox  for restaurant types
const restaurantTypes = document.getElementById('types') // Types of restaurant (checkbox)

// Get the restaurant owner credential fields
const registerEmail = document.getElementById('eamil') // Email input field
const registerPassword = document.getElementById('password') // Password input field
const conforminPassword = document.getElementById('password-confirm') // Confirm password input field

// |ADD event listener
// Add event listener to the form for submission
registerForm.addEventListener('submit', function (event) {


    console.log('Form submitted!')
})
