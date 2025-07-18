<?php
    session_start(); // Start the session
    include '../config/database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username']; // Set session
            header("Location: dashboard.php"); // Redirect to dashboard
            exit(); // stop further execution
            //echo "Login successful! Welcome, " . htmlspecialchars($row['username']) . ".";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
?>