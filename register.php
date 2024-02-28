<?php
$servername = "localhost";
$username = "root";
$password = "Nikki@2456";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$newUsername = $data->username;
$newPassword = $data->password;

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $newUsername, $hashedPassword);

if ($stmt->execute()) {
  $response = array("success" => true);
  echo json_encode($response);
} else {
  $response = array("success" => false);
  echo json_encode($response);
}

$stmt->close();
$conn->close();
?>
