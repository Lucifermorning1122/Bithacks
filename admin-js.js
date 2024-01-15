const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', function (e) {
  e.preventDefault();

  const username = document.getElementById('loginUsername').value;
  const password = document.getElementById('loginPassword').value;

  // Perform login validation here (you can use AJAX to send data to server)

  // For demonstration purposes, we'll just show an alert
  if (username === 'admin' && password === 'password') {
    alert('Login successful');
  } else {
    alert('Login failed. Please check your credentials.');
  }
});
