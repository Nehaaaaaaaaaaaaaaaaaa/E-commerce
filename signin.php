<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // User is already logged in, redirect to the homepage or desired page
    header('Location: home_page.html');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform necessary validation and create a new user account
    // Example: Store the user information in a database
    // Replace "your-database-details" with your actual database connection details

    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "root123";
    $dbname = "web_mini";

    // Create a database connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to insert the user details into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === true) {
        // User account created successfully, store the user information in the session
        $_SESSION['username'] = $username;

        // Redirect the user to the homepage or desired page
        header('Location: home_page.html');
        exit();
    } else {
        // Error occurred while creating the user account
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
