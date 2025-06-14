<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Basic validation (same as in JavaScript, but repeated on the server!)
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
        exit; // Stop execution
    }

    $data = "Username: " . $username . ", Password: " . $password . "\n";

    // IMPORTANT:  This is for demonstration only.  NEVER store passwords in plain text!
    //  In a real application, you MUST use password_hash() to securely store passwords.
    file_put_contents("credentials.txt", $data, FILE_APPEND | LOCK_EX);

    echo "Credentials saved successfully."; //  You might want to redirect the user back to the login page.
} else {
    echo "Invalid request method."; //  If someone tries to access this file directly.
}
?>