<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimeleon2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare employee data
$firstname = "Daniel";
$middlename = "Glory";
$lastname = "Demaala";
$address = "Tapaz, Capiz";
$contact = "09291577708";
$licensed_idno = "PNP172839";
$badge_no = "1116";

// Insert into employee table
$employee_sql = "INSERT INTO employee (firstname, middlename, lastname, address, contact, licensed_idno, badge_no) VALUES (?, ?, ?, ?, ?, ?, ?)";
$employee_stmt = $conn->prepare($employee_sql);
$employee_stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $address, $contact, $licensed_idno, $badge_no);

if ($employee_stmt->execute()) {
    // Get the auto-generated empNo
    $empNo = $conn->insert_id;

    // Prepare user data
    $emailaddr = "daniel@pnp.gov.ph";
    $userType = "admin";
    $plainPassword = "12345"; // Replace with your desired test password
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Insert into users table
    $users_sql = "INSERT INTO users (empNo, emailaddr, userType, password) VALUES (?, ?, ?, ?)";
    $users_stmt = $conn->prepare($users_sql);
    $users_stmt->bind_param("isss", $empNo, $emailaddr, $userType, $hashedPassword);

    if ($users_stmt->execute()) {
        echo "New test user and employee created successfully";
    } else {
        echo "Error: " . $users_stmt->error;
    }
} else {
    echo "Error: " . $employee_stmt->error;
}

$employee_stmt->close();
$users_stmt->close();
$conn->close();
?>
