<?php
session_start();

// Hardcoded username and password
$valid_username = "abhiram";
$valid_password = "abhi@123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: clgcnt.html");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

// Redirect if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: clgcnt.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
    <p><?php if(isset($error)) { echo $error; } ?></p>
  </form>
</body>
</html>
