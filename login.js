const form = document.getElementById('loginForm');
const message = document.getElementById('message');

form.addEventListener('submit', function(event) {
  event.preventDefault();
  const username = form.username.value;
  const password = form.password.value;

  if (username === 'abhiram' && password === 'abhi@123') {
    message.textContent = 'Login successful!';
    // Redirect to clgcnt.html
    window.location.href = 'clgcnt.html';
  } else {
    message.textContent = 'Invalid username or password';
  }
});
