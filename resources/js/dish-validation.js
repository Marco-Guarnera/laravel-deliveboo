
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
