console.log('Dishes JS OK');

// !DISHES FORM

// |GET INTERESTED DOCUMENT ELEMENTS
const dishesForm = document.getElementById('dishes-form');
const dishName = document.getElementById('dish-name');
const dishDescription = document.getElementById('dish-description');
const dishPrice = document.getElementById('dish-price');
const dishVisibility = document.getElementById('dish-visibility');
const dishImg = document.getElementById('dish-img');

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
    if (!/^\d+(\.\d{2})$/.test(price)) return "Price must be a valid number with exactly 2 decimal places.";
    const numericPrice = parseFloat(price);
    if (numericPrice < 0 || numericPrice > 100) return "Price must be between 0 and 100.";
    return ""; // Valid
};

// Validates dish visibility: must be either "0" or "1"
const validateDishVisibility = (visibility) => {
    const value = visibility.value;
    if (value !== "0" && value !== "1") return "Visibility must be set to 'On' or 'Off'.";
    return ""; // Valid
};

// Validates dish image: optional, must be an image and max 256KB
const validateDishImg = (img) => {
    if (img.files.length === 0) return ""; // Optional field
    const file = img.files[0];
    if (!file.type.startsWith('image/')) return "File must be an image.";
    if (file.size > 256 * 1024) return "Image size must not exceed 256KB.";
    return ""; // Valid
};

// |UTILITY FUNCTIONS

// Dynamically creates an error element for each input field
const createErrorElement = (inputElement) => {
    const errorElement = document.createElement('div');
    errorElement.classList.add('invalid-feedback');
    inputElement.insertAdjacentElement('afterend', errorElement);
    return errorElement;
};

// Create error elements for all inputs
const dishNameError = createErrorElement(dishName);
const dishDescriptionError = createErrorElement(dishDescription);
const dishPriceError = createErrorElement(dishPrice);
const dishImgError = createErrorElement(dishImg);
const dishVisibilityError = createErrorElement(dishVisibility);

// Displays error messages and applies `is-invalid` class to input
const showError = (inputElement, errorElement, errorMessage) => {
    inputElement.classList.add('is-invalid');
    inputElement.classList.remove('is-valid');
    errorElement.innerHTML = `<strong>${errorMessage}</strong>`;
};

// Marks an input as valid and removes error messages
const showValid = (inputElement, errorElement) => {
    inputElement.classList.remove('is-invalid');
    inputElement.classList.add('is-valid');
    errorElement.innerHTML = ''; // Clears any existing error messages
};

// |ADD EVENT LISTENER
dishesForm.addEventListener('submit', function (event) {
    // Prevent default submission to apply client-side validation
    event.preventDefault();

    let isDishesFormValid = true;

    // Validate dish name
    const nameMessage = validateDishName(dishName.value.trim());
    if (nameMessage) {
        showError(dishName, dishNameError, nameMessage);
        isDishesFormValid = false;
    } else {
        showValid(dishName, dishNameError);
    }

    // Validate dish description
    const descriptionMessage = validateDishDescription(dishDescription.value.trim());
    if (descriptionMessage) {
        showError(dishDescription, dishDescriptionError, descriptionMessage);
    } else {
        showValid(dishDescription, dishDescriptionError);
    }

    // Validate dish price
    const priceMessage = validateDishPrice(dishPrice.value.trim());
    if (priceMessage) {
        showError(dishPrice, dishPriceError, priceMessage);
        isDishesFormValid = false;
    } else {
        showValid(dishPrice, dishPriceError);
    }

    const visibilityMessage = validateDishVisibility(dishVisibility);
    if (visibilityMessage) {
        showError(dishVisibility, dishVisibilityError, visibilityMessage);
        isDishesFormValid = false;
    } else {
        showValid(dishVisibility, dishVisibilityError);
    }

    // Validate dish image
    const imgMessage = validateDishImg(dishImg);
    if (imgMessage) {
        showError(dishImg, dishImgError, imgMessage);
        isDishesFormValid = false;
    } else {
        showValid(dishImg, dishImgError);
    }

    // If the form is valid, allow submission
    if (isDishesFormValid) {
        dishesForm.submit();
    }
});
