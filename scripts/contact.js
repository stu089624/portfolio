
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const naamInput = document.getElementById('naam');
    const emailInput = document.getElementById('email');

    form.addEventListener('submit', function (event) {
        let isValid = true;

        const naamValue = naamInput.value.trim();
        if (naamValue === '' || hasNumbers(naamValue) || naamValue.length > 50) {
            displayError(naamInput, 'Naam is verplicht, mag geen cijfers bevatten, en mag maximaal 50 tekens bevatten');
            isValid = false;
        } else {
            clearError(naamInput);
        }

        const emailValue = emailInput.value.trim();
        if (emailValue === '' || !isValidEmail(emailValue) || emailValue.length > 50) {
            displayError(emailInput, 'Email is verplicht, moet een geldig formaat hebben, en mag maximaal 50 tekens bevatten');
            isValid = false;
        } else {
            clearError(emailInput);
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    naamInput.addEventListener('input', function () {
        const naamValue = naamInput.value.trim();
        if (hasNumbers(naamValue) || naamValue.length > 50) {
            displayError(naamInput, 'Naam mag geen cijfers bevatten en mag maximaal 50 tekens bevatten');
        } else {
            clearError(naamInput);
        }
    });

    emailInput.addEventListener('input', function () {
        const emailValue = emailInput.value.trim();
        if (!isValidEmail(emailValue) || emailValue.length > 50) {
            displayError(emailInput, 'Email moet een geldig formaat hebben en mag maximaal 50 tekens bevatten');
        } else {
            clearError(emailInput);
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function hasNumbers(input) {
        return /\d/.test(input);
    }

    function displayError(inputElement, errorMessage) {
        const errorElement = inputElement.nextElementSibling;
        errorElement.textContent = errorMessage;
        inputElement.style.borderColor = 'red';
    }

    function clearError(inputElement) {
        const errorElement = inputElement.nextElementSibling;
        errorElement.textContent = '';
        inputElement.style.borderColor = '';
    }
});
