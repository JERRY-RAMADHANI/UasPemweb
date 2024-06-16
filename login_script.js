document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();

  const form = event.target;
  const username = form.username.value;
  const password = form.password.value;

  const formData = new FormData();
  formData.append('username', username);
  formData.append('password', password);

  fetch('login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      if (data.role === 'admin') {
        window.location.href = 'admin.html';
      } else {
        window.location.href = 'user.html';
      }
    } else {
      alert('Login failed: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
