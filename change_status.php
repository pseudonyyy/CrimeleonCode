<?php
session_start();
require 'config.php'; // Ensure this contains your database connection settings

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID and status are set
if(isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE report SET status = ? WHERE data_id = ?");
    $stmt->bind_param("si", $status, $id);

    if($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();

// Redirect back to the records page (or any other page)
header("Location: inv_record.php");
exit();
?>
