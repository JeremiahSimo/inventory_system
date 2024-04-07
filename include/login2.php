<?php
// login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO: Perform database query to check credentials
    // Example using PDO (replace with your actual database connection)
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=dbcitationticket", "your_username", "your_password");

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Authentication successful
            header("Location: dashboard.php"); // Redirect to the dashboard or another page
            exit();
        } else {
            // Authentication failed
            echo "Invalid credentials";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
