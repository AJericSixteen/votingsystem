<?php
require_once 'dbcon.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['id'] = $user['user_id'];
            header("Location: candidate.php");
            exit();
        } else {
            echo "<br><center><font color='red' size='3'>Invalid username or password.</font></center>";
        }
    } else {
        echo "<br><center><font color='red' size='3'>Invalid username or password.</font></center>";
    }

    $stmt->close();
}
?>
