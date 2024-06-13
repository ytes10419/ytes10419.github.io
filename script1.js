document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission

    let role = document.querySelector('input[name="role"]:checked').value;
    let name = document.getElementById('name').value;
    let password = document.getElementById('password').value;

    if (role && name && password) {
        // Here we could add AJAX to send data to the server
        fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ role, name, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'dashboard.php';
            } else {
                alert('Login failed: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
