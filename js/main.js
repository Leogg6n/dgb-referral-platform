// JavaScript functionality for forms

function validateForm(form) {
    let isValid = true;
    // Perform validation logic
    // Example: check required fields
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        if (!field.value) {
            isValid = false;
            field.classList.add('error'); // Add an error class
        } else {
            field.classList.remove('error');
        }
    });
    return isValid;
}

function submitForm(form) {
    if (validateForm(form)) {
        // Submit the form using Fetch API or any other method
        const formData = new FormData(form);
        fetch(form.action, {
            method: form.method,
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log('Form submitted successfully:', data);
            // Handle success
        })
        .catch(error => {
            console.error('Error submitting form:', error);
            // Handle error
        });
    } else {
        console.log('Form validation failed.');
    }
}

// Example usage:
// const myForm = document.getElementById('myForm');
// myForm.addEventListener('submit', (event) => {
//     event.preventDefault(); // Stop the form from submitting
//     submitForm(myForm);
// });
