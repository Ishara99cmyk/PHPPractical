<?php
include '../config/database.php';
session_start(); // Always start session to access $_SESSION

if (isset($_SESSION['username'])) {
    echo "Hello, " . $_SESSION['username'] . "!";
} else {
    echo "Hello, Guest!";
}

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h3>Job Listings:</h3>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Title</th><th>Department</th><th>Salary</th><th>Location</th><th>Created At</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No job records found.";
}

$conn->close();
?>
