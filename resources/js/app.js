import axios from 'axios';

// Set CSRF token from <meta> tag
const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

let editUserId = null;

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('myForm');
    const responseMessage = document.getElementById('responseMessage');

    // Load all users into the table
    const loadUsers = () => {
        axios.get('/form-users').then(response => {
            const users = response.data;
            const tbody = document.getElementById('userTable');
            tbody.innerHTML = '';

            users.forEach(user => {
                tbody.innerHTML += `
                    <tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.age}</td>
                        <td><button class="edit-btn" data-id="${user.id}">Edit</button></td>
                    </tr>
                `;
            });

            // Add click event to each Edit button
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    editUserId = this.dataset.id;
                    axios.get(`/form-users/${editUserId}`)
                        .then(res => {
                            const user = res.data;
                            document.getElementById('name').value = user.name;
                            document.getElementById('email').value = user.email;
                            document.getElementById('age').value = user.age;
                        });
                });
            });
        });
    };

    // Initial load
    loadUsers();

    // Handle form submit (Create or Update)
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Clear previous messages
            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('ageError').textContent = '';
            responseMessage.textContent = '';

            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                age: document.getElementById('age').value,
            };

            // Decide method based on editUserId
            const request = editUserId
                ? axios.put(`/form-users/${editUserId}`, formData)
                : axios.post('/form-submit', formData);

            request.then(res => {
                responseMessage.textContent = res.data.message;
                form.reset();
                editUserId = null;
                loadUsers();
            }).catch(err => {
                if (err.response && err.response.status === 422) {
                    const errors = err.response.data.errors;
                    if (errors.name) document.getElementById('nameError').textContent = errors.name[0];
                    if (errors.email) document.getElementById('emailError').textContent = errors.email[0];
                    if (errors.age) document.getElementById('ageError').textContent = errors.age[0];
                }
            });
        });
    }
});
