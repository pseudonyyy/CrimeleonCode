<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO report (a_family_name, a_first_name, a_middle_name, a_qualifier, a_nickname, a_citizenship, a_gender, a_civil_status, 
    a_date_of_birth, a_age, a_place_of_birth, a_home_phone, a_mobile_phone, a_current_address, a_village_sitio_current, 
    a_barangay_current, a_town_city_current, a_province_current, a_other_address, a_village_sitio_other, a_barangay_other, 
    a_town_city_other, a_province_other, a_highest_educational_attainment, a_occupation, a_id_card_presented, a_email_address, 
    b_family_name, b_first_name, b_middle_name, b_qualifier, b_nickname, b_citizenship, b_gender, b_civil_status, 
    b_date_of_birth, b_age, b_place_of_birth, b_home_phone, b_mobile_phone, b_current_address, b_village_sitio_current, 
    b_barangay_current, b_town_city_current, b_province_current, b_other_address, b_village_sitio_other, b_barangay_other, 
    b_town_city_other, b_province_other, b_highest_educational_attainment, b_occupation, b_id_card_presented, b_email_address, 
    b_rank, b_unit_assignment, b_group_affiliation, b_criminal_record, b_status_of_previous_case, b_height, b_weight, 
    b_built, b_color_of_eyes, b_description_of_eyes, b_color_of_hair, b_description_of_hair, b_guardian_name, b_guardian_address, 
    b_guardian_home_phone, b_guardian_mobile_phone, c_family_name, c_first_name, c_middle_name, c_qualifier, c_nickname, 
    c_citizenship, c_gender, c_civil_status, c_date_of_birth, c_age, c_place_of_birth, c_home_phone, c_mobile_phone, 
    c_current_address, c_village_sitio_current, c_barangay_current, c_town_city_current, c_province_current, c_other_address, 
    c_village_sitio_other, c_barangay_other, c_town_city_other, c_province_other, c_highest_educational_attainment, 
    c_occupation, c_id_card_presented, c_email_address, type_of_incident, datetime_of_incident, datetime_reported, places, narrative, 
    administering_officer, rank_name_of_desk_officer, blotter_number, police_station_name, investigator_on_case, chief_head_of_office, latitude, longitude
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssiisssssssssssssssssssssssssiisssssssssssssssssssssssssssssssssssssssssiissssssssssssssssssssssssssssdd",
    $a_family_name, $a_first_name, $a_middle_name, $a_qualifier, $a_nickname, $a_citizenship, $a_gender, $a_civil_status, 
    $a_date_of_birth, $a_age, $a_place_of_birth, $a_home_phone, $a_mobile_phone, $a_current_address, $a_village_sitio_current, 
    $a_barangay_current, $a_town_city_current, $a_province_current, $a_other_address, $a_village_sitio_other, $a_barangay_other, 
    $a_town_city_other, $a_province_other, $a_highest_educational_attainment, $a_occupation, $a_id_card_presented, $a_email_address, 
    $b_family_name, $b_first_name, $b_middle_name, $b_qualifier, $b_nickname, $b_citizenship, $b_gender, $b_civil_status, 
    $b_date_of_birth, $b_age, $b_place_of_birth, $b_home_phone, $b_mobile_phone, $b_current_address, $b_village_sitio_current, 
    $b_barangay_current, $b_town_city_current, $b_province_current, $b_other_address, $b_village_sitio_other, $b_barangay_other, 
    $b_town_city_other, $b_province_other, $b_highest_educational_attainment, $b_occupation, $b_id_card_presented, $b_email_address, 
    $b_rank, $b_unit_assignment, $b_group_affiliation, $b_criminal_record, $b_status_of_previous_case, $b_height, $b_weight, 
    $b_built, $b_color_of_eyes, $b_description_of_eyes, $b_color_of_hair, $b_description_of_hair, $b_guardian_name, $b_guardian_address, 
    $b_guardian_home_phone, $b_guardian_mobile_phone, $c_family_name, $c_first_name, $c_middle_name, $c_qualifier, $c_nickname, 
    $c_citizenship, $c_gender, $c_civil_status, $c_date_of_birth, $c_age, $c_place_of_birth, $c_home_phone, $c_mobile_phone, 
    $c_current_address, $c_village_sitio_current, $c_barangay_current, $c_town_city_current, $c_province_current, $c_other_address, 
    $c_village_sitio_other, $c_barangay_other, $c_town_city_other, $c_province_other, $c_highest_educational_attainment, 
    $c_occupation, $c_id_card_presented, $c_email_address, $type_of_incident, $datetime_of_incident, $datetime_reported, 
    $places, $narrative, $administering_officer, $rank_name_of_desk_officer, $blotter_number, $police_station_name, 
    $investigator_on_case, $chief_head_of_office, $latitude, $longitude);

  $a_family_name = $_POST['a_family_name'];
  $a_first_name = $_POST['a_first_name'];
  $a_middle_name = $_POST['a_middle_name'];
  $a_qualifier = $_POST['a_qualifier'];
  $a_nickname = $_POST['a_nickname'];
  $a_citizenship = $_POST['a_citizenship'];
  $a_gender = $_POST['a_gender'];
  $a_civil_status = $_POST['a_civil_status'];
  $a_date_of_birth = $_POST['a_date_of_birth'];
  $a_age = $_POST['a_age'];
  $a_place_of_birth = $_POST['a_place_of_birth'];
  $a_home_phone = $_POST['a_home_phone'];
  $a_mobile_phone = $_POST['a_mobile_phone'];
  $a_current_address = $_POST['a_current_address'];
  $a_village_sitio_current = $_POST['a_village_sitio_current'];
  $a_barangay_current = $_POST['a_barangay_current'];
  $a_town_city_current = $_POST['a_town_city_current'];
  $a_province_current = $_POST['a_province_current'];
  $a_other_address = $_POST['a_other_address'];
  $a_village_sitio_other = $_POST['a_village_sitio_other'];
  $a_barangay_other = $_POST['a_barangay_other'];
  $a_town_city_other = $_POST['a_town_city_other'];
  $a_province_other = $_POST['a_province_other'];
  $a_highest_educational_attainment = $_POST['a_highest_educational_attainment'];
  $a_occupation = $_POST['a_occupation'];
  $a_id_card_presented = $_POST['a_id_card_presented'];
  $a_email_address = $_POST['a_email_address'];
  $b_family_name = $_POST['b_family_name'];
  $b_first_name = $_POST['b_first_name'];
  $b_middle_name = $_POST['b_middle_name'];
  $b_qualifier = $_POST['b_qualifier'];
  $b_nickname = $_POST['b_nickname'];
  $b_citizenship = $_POST['b_citizenship'];
  $b_gender = $_POST['b_gender'];
  $b_civil_status = $_POST['b_civil_status'];
  $b_date_of_birth = $_POST['b_date_of_birth'];
  $b_age = $_POST['b_age'];
  $b_place_of_birth = $_POST['b_place_of_birth'];
  $b_home_phone = $_POST['b_home_phone'];
  $b_mobile_phone = $_POST['b_mobile_phone'];
  $b_current_address = $_POST['b_current_address'];
  $b_village_sitio_current = $_POST['b_village_sitio_current'];
  $b_barangay_current = $_POST['b_barangay_current'];
  $b_town_city_current = $_POST['b_town_city_current'];
  $b_province_current = $_POST['b_province_current'];
  $b_other_address = $_POST['b_other_address'];
  $b_village_sitio_other = $_POST['b_village_sitio_other'];
  $b_barangay_other = $_POST['b_barangay_other'];
  $b_town_city_other = $_POST['b_town_city_other'];
  $b_province_other = $_POST['b_province_other'];
  $b_highest_educational_attainment = $_POST['b_highest_educational_attainment'];
  $b_occupation = $_POST['b_occupation'];
  $b_id_card_presented = $_POST['b_id_card_presented'];
  $b_email_address = $_POST['b_email_address'];
  $b_rank = $_POST['b_rank'];
  $b_unit_assignment = $_POST['b_unit_assignment'];
  $b_group_affiliation = $_POST['b_group_affiliation'];
  $b_criminal_record = $_POST['b_criminal_record'];
  $b_status_of_previous_case = $_POST['b_status_of_previous_case'];
  $b_height = $_POST['b_height'];
  $b_weight = $_POST['b_weight'];
  $b_built = $_POST['b_built'];
  $b_color_of_eyes = $_POST['b_color_of_eyes'];
  $b_description_of_eyes = $_POST['b_description_of_eyes'];
  $b_color_of_hair = $_POST['b_color_of_hair'];
  $b_description_of_hair = $_POST['b_description_of_hair'];
  $b_guardian_name = $_POST['b_guardian_name'];
  $b_guardian_address = $_POST['b_guardian_address'];
  $b_guardian_home_phone = $_POST['b_guardian_home_phone'];
  $b_guardian_mobile_phone = $_POST['b_guardian_mobile_phone'];
  $c_family_name = $_POST['c_family_name'];
  $c_first_name = $_POST['c_first_name'];
  $c_middle_name = $_POST['c_middle_name'];
  $c_qualifier = $_POST['c_qualifier'];
  $c_nickname = $_POST['c_nickname'];
  $c_citizenship = $_POST['c_citizenship'];
  $c_gender = $_POST['c_gender'];
  $c_civil_status = $_POST['c_civil_status'];
  $c_date_of_birth = $_POST['c_date_of_birth'];
  $c_age = $_POST['c_age'];
  $c_place_of_birth = $_POST['c_place_of_birth'];
  $c_home_phone = $_POST['c_home_phone'];
  $c_mobile_phone = $_POST['c_mobile_phone'];
  $c_current_address = $_POST['c_current_address'];
  $c_village_sitio_current = $_POST['c_village_sitio_current'];
  $c_barangay_current = $_POST['c_barangay_current'];
  $c_town_city_current = $_POST['c_town_city_current'];
  $c_province_current = $_POST['c_province_current'];
  $c_other_address = $_POST['c_other_address'];
  $c_village_sitio_other = $_POST['c_village_sitio_other'];
  $c_barangay_other = $_POST['c_barangay_other'];
  $c_town_city_other = $_POST['c_town_city_other'];
  $c_province_other = $_POST['c_province_other'];
  $c_highest_educational_attainment = $_POST['c_highest_educational_attainment'];
  $c_occupation = $_POST['c_occupation'];
  $c_id_card_presented = $_POST['c_id_card_presented'];
  $c_email_address = $_POST['c_email_address'];
  $type_of_incident = $_POST['type_of_incident'];
  $datetime_of_incident = $_POST['datetime_of_incident'];
  $datetime_reported = $_POST['datetime_reported'];
  $places = $_POST['places'];
  $narrative = $_POST['narrative'];
  $administering_officer = $_POST['administering_officer']; 
  $rank_name_of_desk_officer = $_POST['rank_name_of_desk_officer'];
  $blotter_number = $_POST['blotter_number'];
  $police_station_name = $_POST['police_station_name'];
  $investigator_on_case = $_POST['investigator_on_case'];
  $chief_head_of_office = $_POST['chief_head_of_office'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

 
if (!$stmt->execute()) {
 echo "Error: " . $stmt->error;
 } else {
     echo "New records created successfully";
 }
            
  $stmt->close();
  $conn->close();
        } ?>

  <!DOCTYPE html>
  <html>
  <head>
      <title>CRIMELEON - Records</title>
      <style>
@import url('https://fonts.cdnfonts.com/css/lovelo?styles=25962');
      </style>
      <style> 
        body {
            font-family: 'Lovelo', sans-serif;
            background-color: #0a2242;
            color: #ffffff;
            margin: 0;
            padding: 20;
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

        .user-name {
        color: #0a2242;
        margin: 0 15px;
        font-weight: bold;
        font-size: 25px;
        vertical-align: middle;
        }
            
        tr:hover {
        background-color: rgba(232, 232, 232, 0.4); /* 0.7 is 70% opacity */
        }

h1 {
font-size: 30px; /* Adjust as needed */
color: #ffffff; /* White color for headers */
 text-align: center;
margin-bottom: 20px;
}


label {
display: inline-block; /* Aligns labels next to inputs */
color: #ffffff; /* White text color for labels */
margin-right: 10px; /* Space between label and input field */
width: 140px; /* Fixed width for labels */
text-align: right; /* Right aligns the text in the label */
}

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="date"],
    input[type="number"],
    input[type="datetime-local"],
    select, 
    textarea {
        width: 300px; /* Fixed width, adjust as needed */
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #ccc; /* Light grey border */
        background-color: #ffffff; /* Light background for inputs */
        color: #000000; /* Dark text for input content */
        border-radius: 4px;
        box-sizing: border-box;
    }
  /* Style for the submit button */
#submitButton {
    background-color: #4CAF50; /* Green background for submit button */
    color: white; /* White text color for submit button */
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Style for the submit button on hover */
#submitButton:hover {
    background-color: #45a049; /* Darker green for hover effect */
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

        <title>Report Form</title>
        </head>
        <body>

        <form method="POST" action="form.php">
                    <!-- REPORT -->
        
                    <h1>RECORD</h1>

<label for="record_number">Record Number:</label>
<input type="text" id="record_number" name="record_number" >

<label for="type_of_incident">Type of Incident:</label>
<input type="text" id="type_of_incident" name="type_of_incident" >

<label for="datetime_of_incident">Date and Time of Incident:</label>
<input type="datetime-local" id="datetime_of_incident" name="datetime_of_incident" >

<label for="datetime_reported">Date and Time Reported:</label>
<input type="datetime-local" id="datetime_reported" name="datetime_reported" >

<label for="places">Place of Incident:</label>
<input type="text" id="places" name="places" >

<label for="latitude">Latitude:</label>
<input type="text" id="latitude" name="latitude" >

<label for="longitude">Longitude:</label>
<input type="text" id="longitude" name="longitude" >
<a href="https://maps.app.goo.gl/WMEHLkdmJL2ADXSt8" target="_blank" style="color: white;">Map</a>
            
                    <!-- ITEM A  -->
    <h1>ITEM "A" - REPORTING PERSON</h1>
    
    <label for="a_family_name">Family Name:</label>
    <input type="text" id="a_family_name" name="a_family_name" >

    <label for="a_first_name">First Name:</label>
    <input type="text" id="a_first_name" name="a_first_name" >

    <label for="a_middle_name">Middle Name:</label>
    <input type="text" id="a_middle_name" name="a_middle_name">

    <label for="a_qualifier">Qualifier:</label>
    <input type="text" id="a_qualifier" name="a_qualifier">

    <label for="a_nickname">Nickname:</label>
    <input type="text" id="a_nickname" name="a_nickname">

    <label for="a_citizenship">Citizenship:</label>
    <input type="text" id="a_citizenship" name="a_citizenship" >

    <label for="a_gender">Sex/Gender:</label>
    <select id="a_gender" name="a_gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="a_civil_status">Civil Status:</label>
    <select id="a_civil_status" name="a_civil_status">
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="separated">Separated</option>
        <option value="divorced">Divorced</option>
    </select>

    <label for="a_date_of_birth">Date of Birth (MM/DD/YY):</label>
    <input type="text" id="a_date_of_birth" name="a_date_of_birth" placeholder="MM/DD/YY" >

    <label for="a_age">Age:</label>
    <input type="number" id="a_age" name="a_age" >

    <label for="a_place_of_birth">Place of Birth:</label>
    <input type="text" id="a_place_of_birth" name="a_place_of_birth" >

    <label for="a_home_phone">Home Phone:</label>
    <input type="tel" id="a_home_phone" name="a_home_phone">

    <label for="a_mobile_phone">Mobile Phone:</label>
    <input type="tel" id="a_mobile_phone" name="a_mobile_phone" >
    <!-- CURRENT ADDRESS -->
        <label for="a_current_address">Current Address(House Number/Street):</label>
        <input type="text" id="a_current_address" name="a_current_address" >

        <label for="a_village_sitio_current">Village/Sitio:</label>
        <input type="text" id="a_village_sitio_current" name="a_village_sitio_current" >

        <label for="a_barangay_current">Barangay:</label>
        <input type="text" id="a_barangay_current" name="a_barangay_current" >

        <label for="a_town_city_current">Town/City:</label>
        <input type="text" id="a_town_city_current" name="a_town_city_current" >

        <label for="a_province_current">Province:</label>
        <input type="text" id="a_province_current" name="a_province_current" >
    <!-- OTHER ADDRESS -->
        <label for="a_other_address">Other Address(House Number/Street):</label>
        <input type="text" id="a_other_address" name="a_other_address">

        <label for="a_village_sitio_other">Village/Sitio:</label>
        <input type="text" id="a_village_sitio_other" name="a_village_sitio_other">

        <label for="a_barangay_other">Barangay:</label>
        <input type="text" id="a_barangay_other" name="a_barangay_other">

        <label for="a_town_city_other">Town/City:</label>
        <input type="text" id="a_town_city_other" name="a_town_city_other">

        <label for="a_province_other">Province:</label>
        <input type="text" id="a_province_other" name="a_province_other">

        <label for="a_highest_educational_attainment">Highest Educational Attainment:</label>
        <input type="text" id="a_highest_educational_attainment" name="a_highest_educational_attainment">

        <label for="a_occupation">Occupation:</label>
        <input type="text" id="a_occupation" name="a_occupation" >

        <label for="a_id_card_presented">ID Card Presented:</label>
        <input type="text" id="a_id_card_presented" name="a_id_card_presented" >

        <label for="a_email_address">Email Address:</label>
        <input type="email" id="a_email_address" name="a_email_address">
        
            <!-- item b -->
    <h1>ITEM "B" - SUSPECT’S DATA</h1>
    <label for="b_family_name">Family Name:</label>
    <input type="text" id="b_family_name" name="b_family_name" >

    <label for="b_first_name">First Name:</label>
    <input type="text" id="b_first_name" name="b_first_name" >

    <label for="b_middle_name">Middle Name:</label>
    <input type="text" id="b_middle_name" name="b_middle_name">

    <label for="b_qualifier">Qualifier:</label>
    <input type="text" id="b_qualifier" name="b_qualifier">

    <label for="b_nickname">Nickname:</label>
    <input type="text" id="b_nickname" name="b_nickname">

    <label for="b_citizenship">Citizenship:</label>
    <input type="text" id="b_citizenship" name="b_citizenship" >

    <label for="b_gender">Sex/Gender:</label>
    <select id="b_gender" name="b_gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="b_civil_status">Civil Status:</label>
    <select id="b_civil_status" name="b_civil_status">
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="separated">Separated</option>
        <option value="divorced">Divorced</option>
    </select>

    <label for="b_date_of_birth">Date of Birth (MM/DD/YY):</label>
    <input type="text" id="b_date_of_birth" name="b_date_of_birth" placeholder="MM/DD/YY" >

    <label for="b_age">Age:</label>
    <input type="number" id="b_age" name="b_age" >

    <label for="b_place_of_birth">Place of Birth:</label>
    <input type="text" id="b_place_of_birth" name="b_place_of_birth" >

    <label for="b_home_phone">Home Phone:</label>
    <input type="tel" id="b_home_phone" name="b_home_phone">

    <label for="b_mobile_phone">Mobile Phone:</label>
    <input type="tel" id="b_mobile_phone" name="b_mobile_phone" >
    <!-- CURRENT ADDRESS -->
        <label for="b_current_address">Current Address(House Number/Street):</label>
        <input type="text" id="b_current_address" name="b_current_address" >

        <label for="b_village_sitio_current">Village/Sitio:</label>
        <input type="text" id="b_village_sitio_current" name="b_village_sitio_current" >

        <label for="b_barangay_current">Barangay:</label>
        <input type="text" id="b_barangay_current" name="b_barangay_current" >

        <label for="b_town_city_current">Town/City:</label>
        <input type="text" id="b_town_city_current" name="b_town_city_current" >

        <label for="b_province_current">Province:</label>
        <input type="text" id="b_province_current" name="b_province_current" >
    <!-- OTHER ADDRESS -->
        <label for="b_other_address">Other Address(House Number/Street):</label>
        <input type="text" id="b_other_address" name="b_other_address">

        <label for="b_village_sitio_other">Village/Sitio:</label>
        <input type="text" id="b_village_sitio_other" name="b_village_sitio_other">

        <label for="b_barangay_other">Barangay:</label>
        <input type="text" id="b_barangay_other" name="b_barangay_other">

        <label for="b_town_city_other">Town/City:</label>
        <input type="text" id="b_town_city_other" name="b_town_city_other">

        <label for="b_province_other">Province:</label>
        <input type="text" id="b_province_other" name="b_province_other">

        <label for="b_highest_educational_attainment">Highest Educational Attainment:</label>
        <input type="text" id="b_highest_educational_attainment" name="b_highest_educational_attainment">

        <label for="b_occupation">Occupation:</label>
        <input type="text" id="b_occupation" name="b_occupation" >

        <label for="b_id_card_presented">ID Card Presented:</label>
        <input type="text" id="b_id_card_presented" name="b_id_card_presented">

        <label for="b_email_address">Email Address:</label>
        <input type="email" id="b_email_address" name="b_email_address">

        <label for="b_rank">Rank:</label>
        <input type="text" id="b_rank" name="b_rank">

        <label for="b_unit_assignment">Unit Assignment:</label>
        <input type="text" id="b_unit_assignment" name="b_unit_assignment">

        <label for="b_group_affiliation">Group Affiliation:</label>
        <input type="text" id="b_group_affiliation" name="b_group_affiliation">

        <label for="b_criminal_record">With Previous Criminal Record?</label>
        <label><input type="radio" name="b_criminal_record" value="yes"> Yes</label>
        <label><input type="radio" name="b_criminal_record" value="no" checked> No</label>

        <label for="b_status_of_previous_case">Status of Previous Case:</label>
        <input type="text" id="b_status_of_previous_case" name="b_status_of_previous_case">

        <label for="b_height">Height:</label>
        <input type="text" id="b_height" name="b_height">

        <label for="b_weight">Weight:</label>
        <input type="text" id="b_weight" name="b_weight">

        <label for="b_built">Built:</label>
        <input type="text" id="b_built" name="b_built">

        <label for="b_color_of_eyes">Color of Eyes:</label>
        <input type="text" id="b_color_of_eyes" name="b_color_of_eyes">

        <label for="b_description_of_eyes">Description of Eyes:</label>
        <input type="text" id="b_description_of_eyes" name="b_description_of_eyes">

        <label for="b_color_of_hair">Color of Hair:</label>
        <input type="text" id="b_color_of_hair" name="b_color_of_hair">

        <label for="b_description_of_hair">Description of Hair:</label>
        <input type="text" id="b_description_of_hair" name="b_description_of_hair">

                        <!-- CHILD CONFLICT  -->

        <h2>Children in Conflict with the Law</h2>
        <label for="b_guardian_name">Name of Guardian:</label>
        <input type="text" id="b_guardian_name" name="b_guardian_name">

        <label for="b_guardian_address">Guardian Address:</label>
        <input type="text" id="b_uardian_address" name="b_guardian_address">

        <label for="b_guardian_home_phone">Home Phone:</label>
        <input type="tel" id="b_guardian_home_phone" name="b_guardian_home_phone">

        <label for="b_guardian_mobile_phone">Mobile Phone:</label>
        <input type="tel" id="b_guardian_mobile_phone" name="b_guardian_mobile_phone">

                        <!-- ITEM c  -->

        <h1>ITEM “C” – VICTIM’S DATA</h1>
    
    <label for="c_family_name">Family Name:</label>
    <input type="text" id="c_family_name" name="c_family_name" >

    <label for="c_first_name">First Name:</label>
    <input type="text" id="c_first_name" name="c_first_name" >

    <label for="c_middle_name">Middle Name:</label>
    <input type="text" id="c_middle_name" name="c_middle_name">

    <label for="c_qualifier">Qualifier:</label>
    <input type="text" id="c_qualifier" name="c_qualifier">

    <label for="c_nickname">Nickname:</label>
    <input type="text" id="c_nickname" name="c_nickname">

    <label for="c_citizenship">Citizenship:</label>
    <input type="text" id="c_citizenship" name="c_citizenship" >

    <label for="c_gender">Sex/Gender:</label>
    <select id="c_gender" name="c_gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="c_civil_status">Civil Status:</label>
    <select id="c_civil_status" name="c_civil_status">
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="separated">Separated</option>
        <option value="divorced">Divorced</option>
    </select>

    <label for="c_date_of_birth">Date of Birth (MM/DD/YY):</label>
    <input type="text" id="c_date_of_birth" name="c_date_of_birth" placeholder="MM/DD/YY" >

    <label for="c_age">cAge:</label>
    <input type="number" id="c_age" name="c_age" >

    <label for="c_place_of_birth">Place of Birth:</label>
    <input type="text" id="c_place_of_birth" name="c_place_of_birth" >

    <label for="c_home_phone">Home Phone:</label>
    <input type="tel" id="c_home_phone" name="c_home_phone">

    <label for="c_mobile_phone">Mobile Phone:</label>
    <input type="tel" id="c_mobile_phone" name="c_mobile_phone" >
    <!-- CURRENT ADDRESS -->
        <label for="c_current_address">Current Address(House Number/Street):</label>
        <input type="text" id="c_current_address" name="c_current_address" >

        <label for="c_village_sitio_current">Village/Sitio:</label>
        <input type="text" id="c_village_sitio_current" name="c_village_sitio_current" >

        <label for="c_barangay_current">Barangay:</label>
        <input type="text" id="c_barangay_current" name="c_barangay_current" >

        <label for="c_town_city_current">Town/City:</label>
        <input type="text" id="c_town_city_current" name="c_town_city_current" >

        <label for="c_province_current">Province:</label>
        <input type="text" id="c_province_current" name="c_province_current" >
    <!-- OTHER ADDRESS -->
        <label for="c_other_address">Other Address(House Number/Street):</label>
        <input type="text" id="c_other_address" name="c_other_address">

        <label for="c_village_sitio_other">Village/Sitio:</label>
        <input type="text" id="c_village_sitio_other" name="c_village_sitio_other">

        <label for="c_barangay_other">Barangay:</label>
        <input type="text" id="c_barangay_other" name="c_barangay_other">

        <label for="c_town_city_other">Town/City:</label>
        <input type="text" id="c_town_city_other" name="c_town_city_other">

        <label for="c_province_other">Province:</label>
        <input type="text" id="c_province_other" name="c_province_other">

        <label for="c_highest_educational_attainment">Highest Educational Attainment:</label>
        <input type="text" id="c_highest_educational_attainment" name="c_highest_educational_attainment">

        <label for="c_occupation">Occupation:</label>
        <input type="text" id="c_occupation" name="c_occupation" >

        <label for="c_id_card_presented">ID Card Presented:</label>
        <input type="text" id="c_id_card_presented" name="c_id_card_presented" >

        <label for="c_email_address">Email Address:</label>
        <input type="email" id="c_email_address" name="c_email_address">




                        <!-- ITEM D -->

        <h1>ITEM "D" - NARRATIVE</h1>


        <label for="narrative">Narrative:</label>
        <textarea id="narrative" name="narrative" rows="4" cols="50" ></textarea>

        <label for="administering_officer">Administering Officer:</label>
        <input type="text" id="administering_officer" name="administering_officer" >

        <label for="rank_name_of_desk_officer">Rank/Name of Desk Officer:</label>
        <input type="text" id="rank_name_of_desk_officer" name="rank_name_of_desk_officer" >

        <label for="blotter_number">Blotter Number:</label>
        <input type="text" id="blotter_number" name="blotter_number" >

        <label for="police_station_name">Name of Police Station:</label>
        <input type="text" id="police_station_name" name="police_station_name" >

        <label for="investigator_on_case">Investigator-on-Case:</label>
        <input type="text" id="investigator_on_case" name="investigator_on_case" >

        <label for="chief_head_of_office">Name of Chief/Head of Office:</label>
        <input type="text" id="chief_head_of_office" name="chief_head_of_office" >


    <form id="myForm" method="post">
    
    <button type="submit" id="submitButton">Submit</button>
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function() {
            document.getElementById('submitButton').disabled = true;
        });
    </script>

        </body>
        </html>

