<?php

    include '../config/database.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkEmailSql = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailSql);
    
    if ($result->num_rows > 0) {
        echo "<script>
                alert('Email already exists! Please use a different email.');
                window.location.href = 'register_form.php';
            </script>";
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$passwordHash')";

        if ($conn -> query($sql) === TRUE) {
            echo "<script>
                    alert('Registration successful! Please login to continue.');
                    window.location.href = 'loginform.php';
                </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>    




