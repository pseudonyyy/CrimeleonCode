<?php
session_start();

// Check if the user is logged in and is a Police
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Police') {
    header("Location: login.php");
    exit();
}

// Include your database connection details here
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

// Fetch latitude and longitude from your report table
// $sql = "SELECT latit, lng FROM report";
// $result = $conn->query($sql);

// $locations = array();

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         $locations[] = array("lat" => floatval($row["lat"]), "lng" => floatval($row["lng"]));
//     }
// } else {
//     echo "0 results";
// }
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRIMELEON - Home</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> -->
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
        .user-name {
        color: #0a2242;
        margin: 0 15px;
        font-weight: bold;
        font-size: 25px;
        vertical-align: middle;
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

    .overlay-text {
        text-align: center;
        color: #d9e4ff; 
        z-index: 1;
    }

    .overlay-text h1, .overlay-text p, .overlay-text h2, .overlay-text h3 {
        margin: 1px 0;
    }

    .overlay-text h1 {
        font-size: 130px; /* Adjust font size as needed */
    }

    .overlay-text p {
        font-size: 32px; /* Adjust font size as needed */
    }

    .overlay-text h2 {
        font-size: 32px; /* Adjust font size as needed */
    }

    .overlay-text h3 {
        font-size: 70px; /* Adjust font size as needed */
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

    .admin-section {
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto; /* Removing the fixed height */
    font-size: 50px; 
    font-weight: bold;
    background-color: #617392; /* Color similar to the one in the image */
    border-radius: 50px; /* Making it rounded. Adjust as necessary. */
    padding: 15px 30px; /* Adding some padding to give space between the text and the circle's edge */
    width: max-content; /* Making the width just large enough for the content */
    margin: 0 auto; /* Centering the circle horizontally */
    margin-top: 50px; /* Adjusts the space above the button */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow for depth */
    }

    .map-container {
        margin-top: 20px; /* Adjust this value as needed to create space between the map and the text above */
        text-align: left; /* Center the iframe horizontally */
        margin-left: 50px; 
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

<section class="image-section">
    <div class="overlay-text">
        <h1>CRIMELEON</h1>
        <p>Citizen's Complaints report</p>
        <h2>management system</h2>
        <h3>Police</h3>
    </div>
</section>


<!-- <div class="map-container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31361.61802420642!2d122.55727460274082!3d10.718877870449328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aee508bcc075c3%3A0x7f47e3a00fc75b26!2sLa%20Paz%2C%20Iloilo%20City%2C%20Iloilo!5e0!3m2!1sen!2sph!4v1700481049992!5m2!1sen!2sph" width="1000" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> -->

<!-- <script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: 10.718893381904664, lng: 122.57889397182652} // Replace with the center of your area
    });

    var locations = <?php echo json_encode($locations); ?>;
    locations.forEach(function(location) {
        new google.maps.Marker({        
            position: new google.maps.LatLng(location.lat, location.lng),
            map: map,
            title: 'Crime reported here'
        });
    });
} -->
</script>



</body>
</html>