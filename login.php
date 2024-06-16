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

$response = array();
if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  $_SESSION['user_id'] = $user['ID'];
  $response['success'] = true;
  $response['username'] = $user['Username'];
  $response['role'] = $role;
} else {
  $response['success'] = false;
  $response['message'] = "Invalid username or password.";
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
