<?php
// Assume you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbcitationticket";

$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($conn));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validateInput($_POST["username"]);
    $password = validateInput($_POST["password"]);

    // Validate non-empty fields
    if (empty($username) || empty($password)) {
        die("Username and password are required");
    }

    // Validate user credentials using prepared statements
    $stmt = $conn->prepare("SELECT * FROM administrator WHERE username=? AND user_password=? AND user_role=0");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, redirect to user dashboard
        header("Location: ../index_user.php");
        exit();
    } else {
        // Check admin credentials using prepared statements
        $stmt = $conn->prepare("SELECT * FROM administrator WHERE username=? AND user_password=? AND user_role=1");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Admin found, redirect to admin dashboard
            header("Location: ../index_Admin.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password";
        }
    }

    $stmt->close();
}

$conn->close();

function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
