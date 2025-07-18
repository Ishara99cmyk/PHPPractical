<?php
    require_once __DIR__ . '/../includes/functions.php';
    
    // Load .env file for local development
    if (file_exists(__DIR__ . '/../.env')) {
        loadEnv(__DIR__ . '/../.env');
    }

    $host = getenv('DB_HOST');
    $apiKey = getenv('API_KEY');
    $db = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');

    $conn = new mysqli($host, $user, $pass, $db);

    try {
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
?>