import axios from 'axios';

const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

let editUserId = null;

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('myForm');
    const loader = document.getElementById('loader');
    const alertBox = document.getElementById('alertBox');
    const alertMessage = document.getElementById('alertMessage');

    const showAlert = (type, message) => {
        alertBox.style.display = 'block';
        alertMessage.textContent = message;

        if (type === 'success') {
            alertMessage.style.backgroundColor = '#d1fae5';
            alertMessage.style.color = '#065f46';
            alertMessage.style.border = '1px solid #10b981';
        } else {
            alertMessage.style.backgroundColor = '#fee2e2';
            alertMessage.style.color = '#991b1b';
            alertMessage.style.border = '1px solid #ef4444';
        }

        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000);
    };

    const loadUsers = (pageUrl = '/form-users') => {
    axios.get(pageUrl).then(response => {
        const users = response.data.data;
        const tbody = document.getElementById('userTable');
        const pagination = document.getElementById('pagination');

        tbody.innerHTML = '';
       users.forEach(user => {
    tbody.innerHTML += `
        <tr>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.age}</td>
            <td>
                ${user.created_formatted}
                <br><small style="color:gray;">(${user.created_human})</small>
            </td>
            <td><button class="edit-btn" data-id="${user.id}">Edit</button></td>
        </tr>
    `;
});


        // Attach edit button events
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                editUserId = this.dataset.id;
                axios.get(`/form-users/${editUserId}`).then(res => {
                    const user = res.data;
                    document.getElementById('name').value = user.name;
                    document.getElementById('email').value = user.email;
                    document.getElementById('age').value = user.age;
                });
            });
        });

        // Render pagination links
        let pagLinks = '';
        const meta = response.data.meta;
        const links = response.data.links;

        links.forEach(link => {
            const label = link.label.replace(/&laquo;|&raquo;/g, '').trim();
            const active = link.active ? 'style="font-weight:bold;text-decoration:underline;"' : '';
            const url = link.url ? `'${link.url}'` : 'null';

            pagLinks += `<button ${active} onclick="loadUsers(${url})" ${!link.url ? 'disabled' : ''} style="margin:2px;padding:5px 10px;border:1px solid #ccc;border-radius:4px;cursor:pointer;background:#fff;">${label}</button>`;
        });

        pagination.innerHTML = pagLinks;
    });
}


   window.loadUsers = loadUsers; // So it's accessible from pagination onclicks
loadUsers();

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Clear errors
            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('ageError').textContent = '';

            // Show loader
            loader.style.display = 'block';

            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                age: document.getElementById('age').value,
            };

            const request = editUserId
                ? axios.put(`/form-users/${editUserId}`, formData)
                : axios.post('/form-submit', formData);

            request.then(res => {
                showAlert('success', res.data.message);
                form.reset();
                editUserId = null;
                loadUsers();
            }).catch(err => {
                if (err.response && err.response.status === 422) {
                    const errors = err.response.data.errors;
                    if (errors.name) document.getElementById('nameError').textContent = errors.name[0];
                    if (errors.email) document.getElementById('emailError').textContent = errors.email[0];
                    if (errors.age) document.getElementById('ageError').textContent = errors.age[0];
                    showAlert('error', 'Validation failed. Please fix errors.');
                } else {
                    showAlert('error', 'Something went wrong. Try again.');
                }
            }).finally(() => {
                loader.style.display = 'none';
            });
        });
    }
});
