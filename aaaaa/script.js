const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const signupForm = document.getElementById('signupForm');
const loginForm = document.getElementById('loginForm');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Handle signup form submission
signupForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Get all form data
    const formData = new FormData(signupForm);
    const hobbies = [];
    document.querySelectorAll('input[name="hobbies[]"]:checked').forEach(checkbox => {
        hobbies.push(checkbox.value);
    });
    
    // Create data object
    const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        password: formData.get('password'),
        gender: formData.get('gender'),
        nationality: formData.get('nationality'),
        hobbies: hobbies
    };

    try {
        console.log('Sending registration data:', data);
        const response = await fetch('process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data),
            credentials: 'same-origin'
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            throw new TypeError("Oops, we haven't got JSON!");
        }

        const result = await response.json();
        console.log('Server response:', result);

        if (result.status === 'success') {
            alert('Registration successful!');
            signupForm.reset();
            container.classList.remove("active");
        } else {
            alert('Registration failed: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error: ' + error.message);
    }
});

// Handle login form submission
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(loginForm);
    const data = {
        email: formData.get('email'),
        password: formData.get('password')
    };

    try {
        console.log('Sending login data:', data);
        const response = await fetch('process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data),
            credentials: 'same-origin'
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            throw new TypeError("Oops, we haven't got JSON!");
        }

        const result = await response.json();
        console.log('Server response:', result);

        if (result.status === 'success') {
            alert('Login successful!');
            loginForm.reset();
        } else {
            alert('Login failed: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error: ' + error.message);
    }
});