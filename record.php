<?php
// Start the session
session_start();

// Include your database configuration file
require 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch data from database
$sql = "SELECT * FROM report";
$result = $conn->query($sql);

// Store the results in a variable for later use
$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = null;
}

// Check if the search form has been submitted
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    // Modify the SQL query to include a WHERE clause for filtering
    $sql = "SELECT * FROM report WHERE 
        data_id LIKE '%$search%' OR
        a_family_name LIKE '%$search%' OR
        a_first_name LIKE '%$search%' OR
        b_family_name LIKE '%$search%' OR
        b_first_name LIKE '%$search%' OR
        c_family_name LIKE '%$search%' OR
        c_first_name LIKE '%$search%' OR
        type_of_incident LIKE '%$search%' OR
        datetime_of_incident LIKE '%$search%' OR
        datetime_reported LIKE '%$search%' OR
        places LIKE '%$search%'";
} else {
    // If no search query is provided, retrieve all records
    $sql = "SELECT * FROM report";
}

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = null;
}


// Close connection
$conn->close();
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
            max-width: 1900px;
            margin: 40px auto;
            background: #c3d1e9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .content h2, .content h3 {
            color: #0a2242;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0a2242;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #c3d1e9 ;
        }

        .user-name {
        color: #0a2242;
        margin: 0 15px;
        font-weight: bold;
        font-size: 25px;
        vertical-align: middle;
        }

        .content form {
        display: flex;
        align-items: center;
        gap: 10px; /* Spacing between elements */
    }

    .content label {
        margin-right: 5px;
    }

    .content input[type="text"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .content input[type="text"]:focus {
        outline: none;
        border-color: #0a2242;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }

    .content button {
        font-family: 'Lovelo', sans-serif;
        padding: 8px 15px;
        background-color: #0a2242; /* Green background */
        color: white; /* White text */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .content button:hover {
        background-color: #174e97; /* Darker green on hover */
    }

    .content button[type="reset"] {
        background-color: #0a2242; /* Red background for reset button */
    }

    .content button[type="reset"]:hover {
        background-color: #174e97; /* Darker red on hover */
    }


    </style>
</head>
<body>
<div class="header">
    <img src="logo2.png" alt="Logo">
    <span class="brand-text">CRIMELEON</span>
    <div class="header-links">
        <a href="police.php">HOME</a>
        <a href="index_police.html">MAP</a>
        <a href="form.php">FORM</a>
        <a href="record.php">RECORD</a>
        <a href="about_p.php">ABOUT US</a>
        <span class="user-name"><?php echo htmlspecialchars($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?></span>
        <div class="dropdown">
            <img src="logout.png" alt="Logout Icon" style="cursor: pointer; width: 50px; height: 50px;">
            <div class="dropdown-content">
                <a href="logout.php">LOGOUT</a>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <form method="GET" action="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter keywords">
        <button type="submit">Search</button>
        <button type="submit">Reset</button>
    </form>
    <?php if ($data): ?>
        <!-- ... (Table for ITEM A) ... -->
        <!-- ... (Table for ITEM B) ... -->
        <!-- ... (Table for ITEM C) ... -->
        <!-- ... (Table for RECORDS) ... -->
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>

<div class="content">
    <?php if ($data): ?>

        <h2>RECORDS</h2>
        <table border='1'>
            <tr>
                <th></th>
                <th>Data ID</th>
                <th>Type of Incident</th>
                <th>Datetime of Incident</th>
                <th>Datetime Reported</th>
                <th>Place of Incident</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["type_of_incident"]); ?></td>
                    <td><?php echo htmlspecialchars($row["datetime_of_incident"]); ?></td>
                    <td><?php echo htmlspecialchars($row["datetime_reported"]); ?></td>
                    <td><?php echo htmlspecialchars($row["places"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>ITEM "A" - REPORTING PERSON</h2>
        <table border='1'>
            <tr>    
                <th></th>
                <th>Data ID</th>
                <th>Family Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Qualifier</th>
                <th>Nickname</th>
                <th>Citizenship</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Place Of Birth</th>
                <th>Home Phone</th>
                <th>Mobile Phone</th>
                <th>Current Address</th>
                <th>Village Sitio Current</th>
                <th>Barangay Current</th>
                <th>Town City Current</th>
                <th>Province Current</th>
                <th>Other Address</th>
                <th>Village Sitio Other</th>
                <th>Barangay Other</th>
                <th>Town City Other</th>
                <th>Province Other</th>
                <th>Highest Educational Attainment</th>
                <th>Occupation</th>
                <th>Id Card Presented</th>
                <th>Email Address</th>
            </tr>
            <?php foreach ($data as $row): ?>
                
                <tr>
                    <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_family_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_first_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_middle_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_qualifier"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_nickname"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_citizenship"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_gender"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_civil_status"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_date_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_age"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_place_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_home_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_mobile_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_current_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_village_sitio_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_barangay_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_town_city_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_province_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_other_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_village_sitio_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_barangay_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_town_city_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_province_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_highest_educational_attainment"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_occupation"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_id_card_presented"]); ?></td>
                    <td><?php echo htmlspecialchars($row["a_email_address"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>ITEM “B” – SUSPECT’S DATA </h2>
        <table border='1'>
            <tr> 
                <th></th>   
                <th>Data ID</th>
                <th>Family Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Qualifier</th>
                <th>Nickname</th>
                <th>Citizenship</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Place Of Birth</th>
                <th>Home Phone</th>
                <th>Mobile Phone</th>
                <th>Current Address</th>
                <th>Village Sitio Current</th>
                <th>Barangay Current</th>
                <th>Town City Current</th>
                <th>Province Current</th>
                <th>Other Address</th>
                <th>Village Sitio Other</th>
                <th>Barangay Other</th>
                <th>Town City Other</th>
                <th>Province Other</th>
                <th>Highest Educational Attainment</th>
                <th>Occupation</th>
                <th>Id Card Presented</th>
                <th>Email Address</th>
                <th>Rank</th>
                <th>Unit Assignment</th>
                <th>Group Affiliation</th>
                <th>Criminal_record</th>
                <th>Status of Previous Case</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Built</th>
                <th>Color of Eyes</th>
                <th>Description of Eyes</th>
                <th>Color of Hair</th>
                <th>Description of Hair</th>
                <th>Guardian Name</th>
                <th>Guardian Address</th>
                <th>Guardian Home Phone</th>
                <th>Guardian Mobile Phone</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_family_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_first_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_middle_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_qualifier"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_nickname"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_citizenship"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_gender"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_civil_status"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_date_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_age"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_place_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_home_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_mobile_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_current_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_village_sitio_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_barangay_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_town_city_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_province_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_other_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_village_sitio_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_barangay_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_town_city_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_province_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_highest_educational_attainment"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_occupation"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_id_card_presented"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_email_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_rank"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_unit_assignment"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_group_affiliation"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_criminal_record"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_status_of_previous_case"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_height"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_weight"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_built"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_color_of_eyes"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_description_of_eyes"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_color_of_hair"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_description_of_hair"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_home_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_mobile_phone"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>FOR CHILDREN IN CONFLICT WITH THE LAW </h2>
        <table border='1'>
            <tr> 
                <th></th>   
                <th>Data ID</th>
                <th>Guardian Name</th>
                <th>Guardian Address</th>
                <th>Guardian Home Phone</th>
                <th>Guardian Mobile Phone</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_home_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["b_guardian_mobile_phone"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>


         <h2>ITEM “C” – VICTIM’S DATA</h2>
        <table border='1'>
            <tr> 
                <th></th>   
                <th>Data ID</th>
                <th>Family Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Qualifier</th>
                <th>Nickname</th>
                <th>Citizenship</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Place Of Birth</th>
                <th>Home Phone</th>
                <th>Mobile Phone</th>
                <th>Current Address</th>
                <th>Village Sitio Current</th>
                <th>Barangay Current</th>
                <th>Town City Current</th>
                <th>Province Current</th>
                <th>Other Address</th>
                <th>Village Sitio Other</th>
                <th>Barangay Other</th>
                <th>Town City Other</th>
                <th>Province Other</th>
                <th>Highest Educational Attainment</th>
                <th>Occupation</th>
                <th>Id Card Presented</th>
                <th>Email Address</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_family_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_first_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_middle_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_qualifier"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_nickname"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_citizenship"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_gender"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_civil_status"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_date_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_age"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_place_of_birth"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_home_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_mobile_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_current_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_village_sitio_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_barangay_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_town_city_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_province_current"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_other_address"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_village_sitio_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_barangay_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_town_city_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_province_other"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_highest_educational_attainment"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_occupation"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_id_card_presented"]); ?></td>
                    <td><?php echo htmlspecialchars($row["c_email_address"]); ?></td>
                    <td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>ITEM “D” – NARRATIVE </h2>
        <table border='1'>
            <tr> 
                <th></th>   
                <th>Data ID</th>
                <th>Narrative</th>
                <th>Administering Officer</th>
                <th>Rank Name of Desk Officer</th>
                <th>Blotter Number</th>
                <th>Police Station Name</th>
                <th>Investigator on Case</th>
                <th>Chief Head of Office</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td>
                    <a href="edit.php?id=<?php echo $row['data_id']; ?>">Edit</a>
                    </td>
                    <td><?php echo htmlspecialchars($row["data_id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["narrative"]); ?></td>
                    <td><?php echo htmlspecialchars($row["administering_officer"]); ?></td>
                    <td><?php echo htmlspecialchars($row["rank_name_of_desk_officer"]); ?></td>
                    <td><?php echo htmlspecialchars($row["blotter_number"]); ?></td>
                    <td><?php echo htmlspecialchars($row["police_station_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["investigator_on_case"]); ?></td>
                    <td><?php echo htmlspecialchars($row["chief_head_of_office"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>

</head>
<body>