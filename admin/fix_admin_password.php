<?php
require_once 'dbcon.php';

// Set the known plain password for the 'admins' user
$plain_password = 'admin123456789'; // <- Change this to the actual password used

// Hash it
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Update the database
$stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = 'admins'");
$stmt->bind_param("s", $hashed_password);

if ($stmt->execute()) {
    echo "Password for 'admins' successfully hashed.";
} else {
    echo "Error updating password.";
}

$stmt->close();
$conn->close();
?>
