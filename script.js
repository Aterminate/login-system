document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const rememberMe = document.getElementById('rememberMe').checked;

    const payload = {
        email: email,
        password: password,
        rememberMe: rememberMe
    };

    fetch('api/index.php/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('message').innerText = data.message;
        if (data.status !== 'ok') {
            document.getElementById('message').style.color = 'red';
        } else {
            document.getElementById('message').style.color = 'green';
        }
    })
    .catch(error => console.error('Error:', error));
});
