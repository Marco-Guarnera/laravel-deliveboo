
console.log('Dishes JS OK');

// !DISHES FORM

// |GET INTERESTED DOCUMENT ELEMENTS

// Form and input fields for dishes
const dishesForm = document.getElementById('dishes-form');
const dishName = document.getElementById('dish-name'); // Name input
const dishDescription = document.getElementById('dish-description'); // Description input
const dishPrice = document.getElementById('dish-price'); // Price input
const dishVisibility = document.getElementById('dish-visibility'); // Visibility checkbox
const dishImg = document.getElementById('dish-img'); // Image input


// |FORM VALIDATION FUNCTIONS

// Validates dish name: required, 1-250 characters
const validateDishName = (name) => {
    if (name.trim() === "") return "Dish name is required.";
    if (name.length > 250) return "Dish name must not exceed 250 characters.";
    return ""; // Valid
};

// Validates dish description: optional, 1-500 characters
const validateDishDescription = (description) => {
    if (description.length > 500) return "Description must not exceed 500 characters.";
    return ""; // Valid
};

// Validates dish price: required, numeric, 2 decimal places, 0-100 range
const validateDishPrice = (price) => {
    if (price.trim() === "") return "Price is required.";
    if (!/^\d+(\.\d{1,2})?$/.test(price)) return "Price must be a valid number with up to 2 decimal places.";
    const numericPrice = parseFloat(price);
    if (numericPrice < 0 || numericPrice > 100) return "Price must be between 0 and 100.";
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

// Dynamically creates an error element for each input field.
const dishNameError = createErrorElement(dishName);
const dishDescriptionError = createErrorElement(dishDescription);
const dishPriceError = createErrorElement(dishPrice);
const dishVisibilityError = createErrorElement(dishVisibility);
const dishImgError = createErrorElement(dishImg);

// Displays error messages and applies `is-invalid` class to input
function showError(inputElement, errorMessage) {
    const errorElement = createErrorElement(inputElement);
    inputElement.classList.add('is-invalid');
    inputElement.classList.remove('is-valid');
    errorElement.innerHTML = `<strong>${errorMessage}</strong>`;
}

// Marks an input as valid and removes error messages
function showValid(inputElement) {
    const errorElement = createErrorElement(inputElement);
    inputElement.classList.remove('is-invalid');
    inputElement.classList.add('is-valid');
    errorElement.innerHTML = ''; // Clears any existing error messages
}

// |ADD EVENT LISTENER
// Adds submit event listener to the dishes form
dishesForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    let isDishesFormValid = true;

    // Validate dish name
    const nameMessage = validateDishName(dishName.value.trim());
    if (nameMessage) {
        console.log(nameMessage);
        isDishesFormValid = false;
    };

    // If the form is valid, allow submission
    if (isDishesFormValid) {
        dishesForm.submit();
    }
});
