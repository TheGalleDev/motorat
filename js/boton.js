document.getElementById('logout').addEventListener('click', function() {
    // Realiza una solicitud a PHP para destruir la sesión
    fetch('../php/logoutbtn.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=logout'
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'success') {
            // Redirige a la página de login
            window.location.href = '../index.php';
        } else {
            alert('Error al cerrar sesión.');
        }
    })
    .catch(error => console.error('Error:', error));
});
