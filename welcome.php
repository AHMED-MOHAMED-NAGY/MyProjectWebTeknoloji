<?php
session_start();

error_log('hellooooo', 3, 'php://stderr');
error_log($_SESSION['email'], 3, 'php://stderr');

// Check if the username session variable is set
if (isset($_SESSION['email'])) {
    $email = htmlspecialchars($_SESSION['email']);
    echo "Hi " . $email;
} else {
    // Redirect to login page if accessed directly without logging in
    header("Location: index.html");
    exit();
}
?>