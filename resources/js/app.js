import axios from 'axios';

// Set CSRF token from <meta> tag for all requests
const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

// Handle form submission on page load
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('myForm');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Clear messages
            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('ageError').textContent = '';
            document.getElementById('responseMessage').textContent = '';

            // Prepare data
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                age: document.getElementById('age').value,
            };

            // Send with Axios
            axios.post('/form-submit', formData)
                .then(response => {
                    document.getElementById('responseMessage').textContent = response.data.message;
                    form.reset();
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        const errors = error.response.data.errors;
                        if (errors.name) document.getElementById('nameError').textContent = errors.name[0];
                        if (errors.email) document.getElementById('emailError').textContent = errors.email[0];
                        if (errors.age) document.getElementById('ageError').textContent = errors.age[0];
                    }
                });
        });
    }
});
