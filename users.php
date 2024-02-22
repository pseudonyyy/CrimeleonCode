<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
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
    

// Sanitize and prepare data
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$licensed_idno = mysqli_real_escape_string($conn, $_POST['licensed_idno']);
$badge_no = mysqli_real_escape_string($conn, $_POST['badge_no']);
$emailaddr = mysqli_real_escape_string($conn, $_POST['emailaddr']);
$userType = mysqli_real_escape_string($conn, $_POST['userType']);
$password = mysqli_real_escape_string($conn, $_POST['password']); 

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into employee table
$employee_sql = "INSERT INTO employee (firstname, middlename, lastname, address, contact, licensed_idno, badge_no) VALUES ('$firstname', '$middlename', '$lastname', '$address', '$contact', '$licensed_idno', '$badge_no')";
if ($conn->query($employee_sql) === TRUE) {
    $empNo = $conn->insert_id; // Get the auto-generated empNo

    // Insert into users table with hashed password
    $users_sql = "INSERT INTO users (empNo, emailaddr, userType, password) VALUES ('$empNo', '$emailaddr', '$userType', '$hashed_password')";
    if ($conn->query($users_sql) === TRUE) {
        // Success! You might want to redirect or output a success message
    } else {
        // Handle error in inserting into users table
        echo "Error: " . $conn->error;
    }
} else {
    // Handle error in inserting into employee table
    echo "Error: " . $conn->error;
}

$conn->close();
}

 // Database connection details
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "crimeleon2";

// Reopen the connection for fetching registered users
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch registered users
$sql = "SELECT e.empNo, e.firstname, e.middlename, e.lastname, e.address, e.contact, e.licensed_idno, e.badge_no, u.emailaddr, u.userType 
        FROM employee e 
        JOIN users u ON e.empNo = u.empNo";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>CRIMELEON - User Management</title>
    <style>
        @import url('https://fonts.cdnfonts.com/css/lovelo?styles=25962');
    </style>
    <style>
        body {
            font-family: 'Lovelo', sans-serif;
            background-color: #0a2242;
            margin: 0;
            padding: 0;
        }

        .header {
        background-color: #bbc8e6;
        padding: 20px 0;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        }

        .header img {
            margin-left: 15px;
            max-height: 80px;
        }

        .brand-text {
            margin-left: 10px;
            font-size: 50px;
            color: #0a2242;
            vertical-align: middle;
        }

        .header a,
        .dropdown img {
            color: #0a2242;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            font-size: 25px;
            transition: color 0.3s;
            vertical-align: middle;
        }

        .header-links {
        margin-left: auto;
        }

        .header a:hover {
            color: #007bff; /* Blue color for hover effect, can be adjusted */
        }

        .image-section {
        background-image: url('cbg.png');
        background-size: cover;
        background-position: center;
        position: relative;
        height: 400px; /* You can adjust this according to your image's height or your preference */
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .image-section::before {
        content: "";
        background-image: url('logo2.png');
        opacity: 0.9;  /* Adjust for desired opacity */
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        z-index: -1;  /* Makes sure it's behind the text */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #bbc8e6;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #0a2242;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }


        .dashboard {
            text-align: right;
            padding: 10px;
        }

        .dashboard a {
            text-decoration: none;
            margin: 0 10px;
            color: #51a1e3;
        }

        .content {
            max-width: 1000px;
            margin: 40px auto;
            background: #c3d1e9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .content h2, .content h3 {
            color: #0a2242;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #0a2242;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #c3d1e9 ;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #2f3b52;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #51a1e3;
        }
        .user-name {
        color: #0a2242;
        margin: 0 15px;
        font-weight: bold;
        font-size: 25px;
        vertical-align: middle;
        }

    </style>
</head>
<body>
<div class="header">
    <img src="logo2.png" alt="Logo">
    <span class="brand-text">CRIMELEON</span>
    <div class="header-links">
        <a href="admin.php">HOME</a>
        <a href="index_admin.html">MAP</a>
        <a href="users.php">USERS</a>
        <a href="ad_record.php">RECORD</a>
        <a href="about_a.php">ABOUT US</a>
   
        <div class="dropdown">
            <img src="logout.png" alt="Logout Icon" style="cursor: pointer; width: 50px; height: 50px;">
            <div class="dropdown-content">
                <a href="logout.php">LOGOUT</a>
            </div>
        </div>
    </div>
</div>

    <div class="content">

    <h2>Registered Users</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>Emp No</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>License ID No</th>
                <th>Badge No</th>
                <th>Email</th>
                <th>User Type</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["empNo"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["middlename"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><?php echo $row["licensed_idno"]; ?></td>
                    <td><?php echo $row["badge_no"]; ?></td>
                    <td><?php echo $row["emailaddr"]; ?></td>
                    <td><?php echo $row["userType"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No registered users found.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>

    <h1>User Registration</h1>
    <form action="users.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required><br>

        <label for="middlename">Middle Name:</label>
        <input type="text" name="middlename"><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" required><br>

        <label for="licensed_idno">Licensed ID No:</label>
        <input type="text" name="licensed_idno" required><br>

        <label for="badge_no">Badged No:</label>
        <input type="text" name="badge_no" required><br>

        <label for="emailaddr">Email:</label>
        <input type="email" name="emailaddr" required><br>

        <label for="userType">User Type:</label>
        <select name="userType">
            <option value="admin">Admin</option>
            <option value="police">Police</option>
            <option value="investigator">Investigator</option>
        </select><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>
    </div>
</body>
</html>
