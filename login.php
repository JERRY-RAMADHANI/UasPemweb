<?php
include 'db_connection.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (preg_match('/[a-zA-Z]/', $username) && !preg_match('/[0-9]/', $username)) {
  $sql = "SELECT * FROM staff WHERE Username=? AND Password=?";
  $role = 'admin';
} else {
  $sql = "SELECT * FROM user WHERE Username=? AND Password=?";
  $role = 'warga';
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  $_SESSION['user_id'] = $user['ID'];
  
  // Redirect based on role
  if ($role == 'admin') {
    header('Location: HomeAdmin.php');
  } else {
    header('Location: HomeUser.php');
  }
  exit(); // Ensure script termination after redirection
} else {
  // Handle invalid login
  $_SESSION['error'] = "Invalid username or password.";
  header('Location: login_page.php'); // Redirect back to the login page
  exit();
}

$stmt->close();
$conn->close();
?>
