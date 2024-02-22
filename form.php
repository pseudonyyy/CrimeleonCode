    <?php
    session_start();

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

    // Check if the form was submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract and sanitize input data
        $type_of_incident = $conn->real_escape_string($_POST['type_of_incident']);
        $datetime_of_incident = $conn->real_escape_string($_POST['datetime_of_incident']);
        $datetime_reported = $conn->real_escape_string($_POST['datetime_reported']);
        $place_of_incident = $conn->real_escape_string($_POST['place_of_incident']);
        // $status = $conn->real_escape_string($_POST['status']);
        $latitude = $conn->real_escape_string($_POST['latitude']);
        $longitude = $conn->real_escape_string($_POST['longitude']);
    
        // Set default status to 'Pending'
        $status = 'Pending'; // Add this line. 
    
        // Insert into `report` table
        $sqlReport = "INSERT INTO report (type_of_incident, datetime_of_incident, datetime_reported, place_of_incident, latitude, longitude, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
        $stmtReport = $conn->prepare($sqlReport);
        $stmtReport->bind_param("ssssdd", $type_of_incident, $datetime_of_incident, $datetime_reported, $place_of_incident, $latitude, $longitude);
        $stmtReport->execute();
        $last_report_id = $stmtReport->insert_id;


        // Insert into `persons_data` (you need to handle each form field accordingly)
        $sqlPersonData = "INSERT INTO persons_data (family_name, first_name, middle_name, qualifier, nickname, citizenship, sex, civil_status, doBirth, age, poBirth, hPhone, mPhone, cHouseNo, cSitio, cBrgy, cTown, cProvince, oHouseNo, oSitio, oBrgy, oTown, oProvince, heAttain, occupation, idCard, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtPersonData = $conn->prepare($sqlPersonData);
        $stmtPersonData->bind_param("sssssssssisssssssssssssssss", 
            $family_name, $first_name, $middle_name, $qualifier, $nickname, $citizenship, 
            $sex, $civil_status, $doBirth, $age, $poBirth, $hPhone, $mPhone, $cHouseNo, 
            $cSitio, $cBrgy, $cTown, $cProvince, $oHouseNo, $oSitio, $oBrgy, $oTown, 
            $oProvince, $heAttain, $occupation, $idCard, $email);
        $stmtPersonData->execute();
        $last_person_id = $stmtPersonData->insert_id;

        // Insert into `item_a` 
        $sqlItemA = "INSERT INTO item_a (personID, repID) VALUES (?, ?)";
        $stmtItemA = $conn->prepare($sqlItemA);
        $stmtItemA->bind_param("ii", $last_person_id, $last_report_id);
        $stmtItemA->execute();

        // Insert into `item_b`
        $sqlItemB = "INSERT INTO item_b (personID, repID, sRank, sAssign, sAffiliation, sCrimRecord, sStatus, Height, Weight, eyeColor, eyeDesc, hairColor, hairDesc, sInfluence, guardian_name, g_address, ghome_phone, gmob_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtItemB = $conn->prepare($sqlItemB);
        $stmtItemB->bind_param("iissssssssssssssss", 
            $last_person_id, $last_report_id, $sRank, $sAssign, $sAffiliation, $sCrimRecord, 
            $sStatus, $Height, $Weight, $eyeColor, $eyeDesc, $hairColor, $hairDesc, 
            $sInfluence, $guardian_name, $g_address, $ghome_phone, $gmob_phone);
        $stmtItemB->execute();


        // Insert into `item_c` (handle each form field accordingly)
        $sqlItemC = "INSERT INTO item_c (personID, repID) VALUES (?, ?)";
        $stmtItemC = $conn->prepare($sqlItemC);
        $stmtItemC->bind_param("ii", $last_person_id, $last_report_id);
        $stmtItemC->execute();
        // ... Bind parameters and execute

        // Insert into `item_d` (handle each form field accordingly)
        $sqlItemD = "INSERT INTO item_d (repID, narrative, administering_officer, rank_name_of_desk_officer, blotter_number, police_station_name, investigator_on_case, chief_head_of_office) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtItemD = $conn->prepare($sqlItemD);
        $stmtItemD->bind_param("isssssss", 
            $last_report_id, $narrative, $administering_officer, $rank_name_of_desk_officer, 
            $blotter_number, $police_station_name, $investigator_on_case, $chief_head_of_office);
        $stmtItemD->execute();
        

        // Check for errors in execution
    if ($stmtItemD->error) {
        // Handle error
        echo "Error: " . $stmtItemD->error;
    } else {
        // Success
        echo "Record inserted successfully";
    }

        // Close the prepared statements
        $stmtReport->close();
        $stmtPersonData->close();
        $stmtItemA->close();
        $stmtItemB->close();
        $stmtItemC->close();
        $stmtItemD->close();

    }

    $conn->close();
    ?>


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
        font-family: 'Lovelo', sans-serif;
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

    .notification {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.2);
            z-index: 1000;
        }

        .notification.success {
            background-color: #4CAF50; /* Green for success */
            color: white;
        }

        .notification.error {
            background-color: #f44336; /* Red for error */
            color: white;
        }

        html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            #map {
                height: 80%;
            }
            .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }
            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 300px;
            }
            #pac-input:focus {
                border-color: #4d90fe;
            }

            
    </style>

        </head>
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
    <script>
            // Function to show or hide the specifyBox based on the type of incident
            function showSpecifyBox(value) {
                var specifyBox = document.getElementById('specifyBox');
                if (value === 'Other') {
                    specifyBox.style.display = 'block';
                } else {
                    specifyBox.style.display = 'none';
                }
            }

            // Function to toggle the visibility of the map
            function toggleMap() {
                var map = document.getElementById('map');
                var toggleButton = document.getElementById('toggleMapButton');
                if (map.style.display === 'none') {
                    map.style.display = 'block';
                    toggleButton.innerHTML = 'Close Map';
                } else {
                    map.style.display = 'none';
                    toggleButton.innerHTML = 'Show Map';
                }
            }
    </script>

    <body>

    <h1>REPORT DETAILS</h1>
    <form method="post" action="form.php">
        <label for="type_of_incident">Type of Incident:</label>
        <select id="type_of_incident" name="type_of_incident" onchange="showSpecifyBox(this.value)" required>
        <option value="">Select Incident Type</option>
        <option value="Theft">Theft</option>
        <option value="Burglary">Burglary</option>
        <option value="Vandalism">Vandalism</option>
        <option value="Assault">Assault</option>
        <option value="Robbery">Robbery</option>
        <option value="Arson">Arson</option>
        <option value="Homicide">Homicide</option>
        <option value="Fraud">Fraud</option>
        <option value="Drug Offense">Drug Offense</option>
        <option value="Traffic Violation">Traffic Violation</option>
        <option value="DUI">DUI (Driving Under the Influence)</option>
        <option value="Public Disturbance">Public Disturbance</option>
        <option value="Cybercrime">Cybercrime</option>
        <option value="Domestic Violence">Domestic Violence</option>
        <option value="Other">Other</option>

    </select>

    <div id="specifyBox" style="display: none;">
            <label for="specify_other">Please specify:</label>
            <input type="text" id="specify_other" name="specify_other">
    </div>


    <label for="datetime_of_incident">Date and Time of Incident:</label>
    <input type="datetime-local" id="datetime_of_incident" name="datetime_of_incident">

    <label for="datetime_reported">Date and Time Reported:</label>
    <input type="datetime-local" id="datetime_reported" name="datetime_reported">

    <label for="place_of_incident">Place of Incident:</label>
    <select id="place_of_incident" name="place_of_incident" onchange="moveMapToLocation(this.value)" required>
        <option value="">Select Place of Incident</option>
        <option value="Aguinaldo">Aguinaldo</option>
        <option value="Baldoza">Baldoza</option>
        <option value="Bantud">Bantud</option>
        <option value="Banuyao">Banuyao</option>
        <option value="Burgos-Mabini-Plaza">Burgos-Mabini-Plaza</option>
        <option value="Caingin">Caingin</option>
        <option value="Divinagracia">Divinagracia</option>
        <option value="Gustilo">Gustilo</option>
        <option value="Hinactacan">Hinactacan</option>
        <option value="Ingore">Ingore</option>
        <option value="Jereos">Jereos</option>
        <option value="Laguda">Laguda</option>
        <option value="Lopez Jaena Norte">Lopez Jaena Norte</option>
        <option value="Lopez Jaena Sur">Lopez Jaena Sur</option>
        <option value="Luna">Luna</option>
        <option value="MacArthur">MacArthur</option>
        <option value="Magdalo">Magdalo</option>
        <option value="Magsaysay Village">Magsaysay Village</option>
        <option value="Nabitasan">Nabitasan</option>
        <option value="Railway">Railway</option>
        <option value="Rizal">Rizal</option>
        <option value="San Isidro">San Isidro</option>
        <option value="San Nicolas">San Nicolas</option>
        <option value="Tabuc Suba">Tabuc Suba</option>
        <option value="Ticud">Ticud</option>
    </select>

    <label for="latitude">Latitude:</label>
    <input type="text" id="latitude" name="latitude">

    <label for="longitude">Longitude:</label>
    <input type="text" id="longitude" name="longitude">


    <!-- Button to toggle map visibility -->
    <button type="button" id="toggleMapButton" onclick="toggleMap()">Show Map</button>


    <!-- Map Container -->
    <div id="map" style="height: 500px; width: 79%; margin-left: auto; margin-right: auto; display: none;"></div>




    <script>
    var locations = {
        "Aguinaldo": {
            coords: {lat: 10.706914020093047, lng: 122.57258361979724},
            zoom: 17.60 
        },
        "Baldoza": {
            coords: {lat: 10.71374275, lng: 122.58079420},
            zoom: 16.20 
        },    
        "Bantud": {
            coords:{lat: 10.70957856, lng: 122.56421070},
            zoom: 16.80
        }, 
        "Banuyao": {
            coords:{lat: 10.729240487193719, lng: 122.57963841541729},
            zoom: 15.70
        },     
        "Burgos-Mabini-Plaza": {
            coords:{lat: 10.71401261, lng: 122.56791330},
            zoom: 16.10
        },    
        "Caingin": {
            coords:{lat: 10.717763266196362, lng: 122.57524171407337},
            zoom: 16.50
        },  
        "Divinagracia": {
            coords:{lat: 10.70919809, lng: 122.57115520},
            zoom: 17
        },
        "Gustilo": {
            coords:{lat:10.716946173751825, lng: 122.5699270491424},
            zoom: 16.86
        },
        "Hinactacan":  {
            coords:{lat: 10.734294031182312, lng: 122.58719760894243},
            zoom: 15.70
        },
        "Ingore": {
            coords:{lat: 10.72160379, lng: 122.59450730},
            zoom: 14.40
        },
        "Jereos": {
            coords:{lat: 10.71722101, lng: 122.56799540},
            zoom: 16.70
        },
        "Laguda": {
            coords:{lat: 10.70778241, lng: 122.56770540},
            zoom: 17.50
        },
        "Lopez Jaena Norte": {
            coords:{ lat: 10.71410005, lng: 122.57266650},
            zoom: 16.70
        },

        "Lopez Jaena Sur": {
            coords:{ lat: 10.71117752, lng: 122.57433100},
            zoom: 16.60 
        },


        "Luna": {
            coords:{ lat: 10.706482706487785,  lng: 122.56534258940596},
            zoom: 17
        
        },


        "MacArthur": {
        coords: { lat: 10.70905186, lng: 122.57038730},
        zoom: 17 

        },


        "Magdalo": { 
            coords: {lat:10.714244103897801, lng: 122.56701057176224},
            zoom: 16.60
    },
        


        "Magsaysay Village": {
            coords: {lat:10.71154421415819, lng: 122.5617769795283},
            zoom: 16.20
        
            },


        "Nabitasan": {lat: 10.70551841, lng: 122.55889500},
        "Railway": {lat: 10.70987142, lng: 122.56790000},
        "Rizal": {lat: 10.70772295, lng: 122.56965500},
        "San Isidro": {lat: 10.72254093, lng: 122.58062130},
        "San Nicolas": {lat: 10.71438142, lng: 122.56458470},
        "Tabuc Suba": {lat: 10.72139678, lng: 122.57292490},
        "Ticud": {lat: 10.71869730, lng: 122.58162000}
    };




    var map; 
    var currentBoundary; 
    var boundaries = {}; 


    function initMap() {
        fetchBoundaries(); // Call to fetch boundary data
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 10.7081, lng: 122.5683}, 
            zoom: 15
        });
    }

    function fetchBoundaries() {
        fetch('boundaries.php')
        .then(response => response.json())
        .then(data => {
            boundaries = data;
        })
        .catch(error => console.error('Error fetching boundaries:', error));
    }

    function moveMapToLocation(place) {
        if (locations[place] && boundaries[place]) {
            var location = locations[place];
            map.setCenter(location.coords);
            map.setZoom(location.zoom);

            if (currentBoundary) {
                currentBoundary.setMap(null);
            }

            currentBoundary = new google.maps.Polygon({
                paths: boundaries[place],
                strokeColor: '#FF0000',
                strokeOpacity: 0.6,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.10
            });

            currentBoundary.setMap(map);
        }
    }


    // Ensure the moveMapToLocation is called when the dropdown changes
    document.getElementById('place_of_incident').addEventListener('change', function() {
        moveMapToLocation(this.value);
    });
    </script>


        <!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6zhaIwscTGqJGz2UwxGyxhlRz2HF3lFg&libraries=places&callback=initMap" async defer></script>
    </body>


<h1>ITEM "A" - REPORTING PERSON</h1>
<form method="post" action="form.php">
    <!-- Reporting Person's Details -->

    <label for="family_name">Family Name:</label>
    <input type="text" id="family_name" name="family_name">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name">

    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name">

    <label for="qualifier">Qualifier:</label>
    <input type="text" id="qualifier" name="qualifier">

    <label for="nickname">Nickname:</label>
    <input type="text" id="nickname" name="nickname">

    <label for="citizenship">Citizenship:</label>
    <input type="text" id="citizenship" name="citizenship">

    <label for="sex">Sex:</label>
    <input type="text" id="sex" name="sex">

    <label for="civil_status">Civil Status:</label>
        <select id="civil_status" name="civil_status">
        <option value="">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Divorced">Divorced</option>
        <option value="Separated">Separated</option>
    </select>

    <label for="doBirth">Date of Birth:</label>
    <input type="date" id="doBirth" name="doBirth">

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">

    <label for="poBirth">Place of Birth:</label>
    <input type="text" id="poBirth" name="poBirth">

    <label for="hPhone">Home Phone:</label>
    <input type="text" id="hPhone" name="hPhone">

    <label for="mPhone">Mobile Phone:</label>
    <input type="text" id="mPhone" name="mPhone">

    <label for="cHouseNo">Current House No:</label>
    <input type="text" id="cHouseNo" name="cHouseNo">

    <label for="cSitio">Current Sitio:</label>
    <input type="text" id="cSitio" name="cSitio">

    <label for="cBrgy">Current Barangay:</label>
    <input type="text" id="cBrgy" name="cBrgy">

    <label for="cTown">Current Town:</label>
    <input type="text" id="cTown" name="cTown">

    <label for="cProvince">Current Province:</label>
    <input type="text" id="cProvince" name="cProvince">

    <label for="oHouseNo">Other House No:</label>
    <input type="text" id="oHouseNo" name="oHouseNo">

    <label for="oSitio">Other Sitio:</label>
    <input type="text" id="oSitio" name="oSitio">

    <label for="oBrgy">Other Barangay:</label>
    <input type="text" id="oBrgy" name="oBrgy">

    <label for="oTown">Other Town:</label>
    <input type="text" id="oTown" name="oTown">

    <label for="oProvince">Other Province:</label>
    <input type="text" id="oProvince" name="oProvince">

    <label for="heAttain">Highest Educational Attainment:</label>
    <input type="text" id="heAttain" name="heAttain">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation">

    <label for="idCard">ID Card:</label>
    <input type="text" id="idCard" name="idCard">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
</form>
                

<!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B --> <!-- ITEM B -->
 
<h1>ITEM "B" - SUSPECT’S DATA</h1>
<form method="post" action="form.php">

    <label for="family_name">Family Name:</label>
    <input type="text" id="family_name" name="family_name">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name">

    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name">

    <label for="qualifier">Qualifier:</label>
    <input type="text" id="qualifier" name="qualifier">

    <label for="nickname">Nickname:</label>
    <input type="text" id="nickname" name="nickname">

    <label for="citizenship">Citizenship:</label>
    <input type="text" id="citizenship" name="citizenship">

    <label for="sex">Sex:</label>
    <input type="text" id="sex" name="sex">

    <label for="civil_status">Civil Status:</label>
        <select id="civil_status" name="civil_status">
        <option value="">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Divorced">Divorced</option>
        <option value="Separated">Separated</option>
    </select>

    <label for="doBirth">Date of Birth:</label>
    <input type="date" id="doBirth" name="doBirth">

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">

    <label for="poBirth">Place of Birth:</label>
    <input type="text" id="poBirth" name="poBirth">

    <label for="hPhone">Home Phone:</label>
    <input type="text" id="hPhone" name="hPhone">

    <label for="mPhone">Mobile Phone:</label>
    <input type="text" id="mPhone" name="mPhone">

    <label for="cHouseNo">Current House No:</label>
    <input type="text" id="cHouseNo" name="cHouseNo">

    <label for="cSitio">Current Sitio:</label>
    <input type="text" id="cSitio" name="cSitio">

    <label for="cBrgy">Current Barangay:</label>
    <input type="text" id="cBrgy" name="cBrgy">

    <label for="cTown">Current Town:</label>
    <input type="text" id="cTown" name="cTown">

    <label for="cProvince">Current Province:</label>
    <input type="text" id="cProvince" name="cProvince">

    <label for="oHouseNo">Other House No:</label>
    <input type="text" id="oHouseNo" name="oHouseNo">

    <label for="oSitio">Other Sitio:</label>
    <input type="text" id="oSitio" name="oSitio">

    <label for="oBrgy">Other Barangay:</label>
    <input type="text" id="oBrgy" name="oBrgy">

    <label for="oTown">Other Town:</label>
    <input type="text" id="oTown" name="oTown">

    <label for="oProvince">Other Province:</label>
    <input type="text" id="oProvince" name="oProvince">

    <label for="heAttain">Highest Educational Attainment:</label>
    <input type="text" id="heAttain" name="heAttain">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation">

    <label for="idCard">ID Card:</label>
    <input type="text" id="idCard" name="idCard">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
                
    <label for="sRank">Rank:</label>
    <input type="text" id="sRank" name="sRank">

    <label for="sAssign">Assignment:</label>
    <input type="text" id="sAssign" name="sAssign">

    <label for="sAffiliation">Affiliation:</label>
    <input type="text" id="sAffiliation" name="sAffiliation">

    <label for="sCrimRecord">Criminal Record:</label>
    <input type="text" id="sCrimRecord" name="sCrimRecord">

    <label for="sStatus">Status:</label>
    <input type="text" id="sStatus" name="sStatus">

    <label for="Height">Height:</label>
    <input type="text" id="Height" name="Height">

    <label for="Weight">Weight:</label>
    <input type="text" id="Weight" name="Weight">

    <label for="eyeColor">Eye Color:</label>
    <input type="text" id="eyeColor" name="eyeColor">

    <label for="eyeDesc">Eye Description:</label>
    <input type="text" id="eyeDesc" name="eyeDesc">

    <label for="hairColor">Hair Color:</label>
    <input type="text" id="hairColor" name="hairColor">

    <label for="hairDesc">Hair Description:</label>
    <input type="text" id="hairDesc" name="hairDesc">

    <label for="sInfluence">Influence:</label>
    <input type="text" id="sInfluence" name="sInfluence">

    <h1>Child in Conflict with the Law</h1>

    <label for="guardian_name">Guardian Name:</label>
    <input type="text" id="guardian_name" name="guardian_name">

    <label for="g_address">Guardian Address:</label>
    <input type="text" id="g_address" name="g_address">

    <label for="ghome_phone">Guardian Home Phone:</label>
    <input type="text" id="ghome_phone" name="ghome_phone">

    <label for="gmob_phone">Guardian Mobile Phone:</label>
    <input type="text" id="gmob_phone" name="gmob_phone">
</form>

        <!-- ITEM C --> <!-- ITEM C --> <!-- ITEM C --> <!-- ITEM C --> <!-- ITEM C --> <!-- ITEM C --> <!-- ITEM C -->

    <h1>ITEM "C" - VICTIM’S DATA</h1>
    <form method="post" action="form.php">

    <label for="family_name">Family Name:</label>
    <input type="text" id="family_name" name="family_name">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name">

    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name">

    <label for="qualifier">Qualifier:</label>
    <input type="text" id="qualifier" name="qualifier">

    <label for="nickname">Nickname:</label>
    <input type="text" id="nickname" name="nickname">

    <label for="citizenship">Citizenship:</label>
    <input type="text" id="citizenship" name="citizenship">

    <label for="sex">Sex:</label>
    <input type="text" id="sex" name="sex">

    <label for="civil_status">Civil Status:</label>
        <select id="civil_status" name="civil_status">
        <option value="">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Divorced">Divorced</option>
        <option value="Separated">Separated</option>
    </select>


    <label for="doBirth">Date of Birth:</label>
    <input type="date" id="doBirth" name="doBirth">

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">

    <label for="poBirth">Place of Birth:</label>
    <input type="text" id="poBirth" name="poBirth">

    <label for="hPhone">Home Phone:</label>
    <input type="text" id="hPhone" name="hPhone">

    <label for="mPhone">Mobile Phone:</label>
    <input type="text" id="mPhone" name="mPhone">

    <label for="cHouseNo">Current House No:</label>
    <input type="text" id="cHouseNo" name="cHouseNo">

    <label for="cSitio">Current Sitio:</label>
    <input type="text" id="cSitio" name="cSitio">

    <label for="cBrgy">Current Barangay:</label>
    <input type="text" id="cBrgy" name="cBrgy">

    <label for="cTown">Current Town:</label>
    <input type="text" id="cTown" name="cTown">

    <label for="cProvince">Current Province:</label>
    <input type="text" id="cProvince" name="cProvince">

    <label for="oHouseNo">Other House No:</label>
    <input type="text" id="oHouseNo" name="oHouseNo">

    <label for="oSitio">Other Sitio:</label>
    <input type="text" id="oSitio" name="oSitio">

    <label for="oBrgy">Other Barangay:</label>
    <input type="text" id="oBrgy" name="oBrgy">

    <label for="oTown">Other Town:</label>
    <input type="text" id="oTown" name="oTown">

    <label for="oProvince">Other Province:</label>
    <input type="text" id="oProvince" name="oProvince">

    <label for="heAttain">Highest Educational Attainment:</label>
    <input type="text" id="heAttain" name="heAttain">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation">

    <label for="idCard">ID Card:</label>
    <input type="text" id="idCard" name="idCard">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
</form>

         <!-- ITEM D -->
<h1>ITEM "D" - INCIDENT NARRATIVE</h1>
<form method="post" action="form.php">

    <label for="narrative">Narrative:</label>
    <textarea id="narrative" name="narrative"></textarea>

    <label for="administering_officer">Administering Officer:</label>
    <input type="text" id="administering_officer" name="administering_officer">

    <label for="rank_name_of_desk_officer">Rank/Name of Desk Officer:</label>
    <input type="text" id="rank_name_of_desk_officer" name="rank_name_of_desk_officer">

    <label for="blotter_number">Blotter Number:</label>
    <input type="text" id="blotter_number" name="blotter_number">

    <label for="police_station_name">Police Station Name:</label>
    <input type="text" id="police_station_name" name="police_station_name">

    <label for="investigator_on_case">Investigator on Case:</label>
    <input type="text" id="investigator_on_case" name="investigator_on_case">

    <label for="chief_head_of_office">Chief/Head of Office:</label>
    <input type="text" id="chief_head_of_office" name="chief_head_of_office">

    <form id="myForm" method="post">
        
    <button type="submit" id="submitButton">Submit</button>
</form>



        <script>
            document.getElementById('myForm').addEventListener('submit', function() {
                document.getElementById('submitButton').disabled = true;
            });
        </script>

    <?php if (!empty($_SESSION['message'])): ?>
        <div id="notification" class="notification <?php echo $_SESSION['message_type']; ?>">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
    <?php endif; ?>

    <script>
        window.onload = function() {
            // Check if the notification element exists
            var notification = document.getElementById('notification');
            if (notification) {
                // Set a timeout to hide the notification after 3 seconds
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 2000);
            }
        };
    </script>

    <script>
            function showSpecifyBox(value) {
                var specifyBox = document.getElementById('specifyBox');
                if(value === 'Other') {
                    specifyBox.style.display = 'block';
                } else {
                    specifyBox.style.display = 'none';
                }
            }
        </script>


            </body>
            </html>

