<?php
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception(".env file not found at: $path");
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        // Skip comments and empty lines
        if (str_starts_with(trim($line), '#') || empty(trim($line))) {
            continue;
        }
        
        // Parse key=value pairs
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Remove quotes if present
            if (preg_match('/^"(.*)"$/', $value, $matches)) {
                $value = $matches[1];
            } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
                $value = $matches[1];
            }
            
            // Set in environment
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}



function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function redirectTo($location) {
    header("Location: " . $location);
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

?>