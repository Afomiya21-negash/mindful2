<?php
$host = 'localhost';
$dbname = 'signup_db';
$user = 'root';
$pass = '';

// Connect to the database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Insert user data into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        echo "Signup successful!";
        header("Location: dashboard.php"); // Redirect to the dashboard page
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry
            echo "Email already registered!";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }


?>