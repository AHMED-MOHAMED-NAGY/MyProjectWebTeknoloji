<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if ($email == "g231210565@sakarya.edu.tr" && $password == "g231210565") {
        // Start a session and store the email
        session_start();
        $_SESSION['email'] = $email;

        // Redirect to the welcome page
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid password. Please try again.";
    }
} else {
    // Redirect back to the login form if accessed directly
    header("Location: index.html");
    exit();
}
?>