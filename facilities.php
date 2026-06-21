<?php

session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facilities Info</title>
<link rel="stylesheet" href="facilities.css">
</head>
<body>
<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="patienthome.php">Home</a></li>
        <li><a href="bookingpage.php">Booking</a></li>
        <li><a href="patientrecord.php">Maternal Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>
<div class="facilities-container">

    <h1>Facilities</h1>

    <div class="facility-card">
        <img src="privateroom.jfif" alt="Private Room">
        <div class="facility-content">
            <h2>Private Room</h2>
            <ul>
                <li>Comfortable and spacious environment</li>
                <li>Private bathroom and amenities</li>
                <li>Enhanced patient privacy</li>
                <li>Family-friendly accommodation</li>
                <li>24-hour nursing support</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="ultrasoundroom.jfif" alt="Ultrasound Room">
        <div class="facility-content">
            <h2>Ultrasound Room</h2>
            <ul>
                <li>Advanced ultrasound equipment</li>
                <li>Pregnancy monitoring and assessment</li>
                <li>High-quality imaging technology</li>
                <li>Comfortable examination setting</li>
                <li>Accurate diagnostic support</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="nursery.jfif" alt="Nursery">
        <div class="facility-content">
            <h2>Nursery</h2>
            <ul>
                <li>Safe and secure newborn care</li>
                <li>Continuous baby monitoring</li>
                <li>Experienced nursing staff</li>
                <li>Hygienic and comfortable environment</li>
                <li>Newborn health assessment services</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="deliverysuite.jfif" alt="Delivery Suite">
        <div class="facility-content">
            <h2>Delivery Suite</h2>
            <ul>
                <li>Modern labor and delivery facilities</li>
                <li>Comfortable birthing environment</li>
                <li>Advanced medical equipment</li>
                <li>Professional maternity care team</li>
                <li>Emergency support available when needed</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="operation.jfif" alt="Operation Theatre">
        <div class="facility-content">
            <h2>Operation Theatre</h2>
            <ul>
                <li>State-of-the-art surgical equipment</li>
                <li>Sterile and safe environment</li>
                <li>Experienced surgical specialists</li>
                <li>Advanced monitoring systems</li>
                <li>Emergency surgical services</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="cafe.jfif" alt="Cafe">
        <div class="facility-content">
            <h2>Cafeteria</h2>
            <ul>
                <li>Variety of food and beverages</li>
                <li>Comfortable seating area</li>
                <li>Relaxing environment for visitors</li>
                <li>Healthy meal options available</li>
                <li>Convenient location within the hospital</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="mosque.jfif" alt="Mosque">
        <div class="facility-content">
            <h2>Mosque</h2>
            <ul>
                <li>Clean and peaceful prayer space</li>
                <li>Separate areas for men and women</li>
                <li>Ablution facilities provided</li>
                <li>Comfortable environment for worship</li>
                <li>Easily accessible for patients and visitors</li>
            </ul>
        </div>
    </div>

    <div class="facility-card">
        <img src="playroom.jfif" alt="Playroom">
        <div class="facility-content">
            <h2>Playroom</h2>
            <ul>
                <li>Child-friendly environment</li>
                <li>Educational and recreational activities</li>
                <li>Safe play equipment</li>
                <li>Comfortable waiting area for children</li>
                <li>Designed to reduce anxiety and stress</li>
            </ul>
        </div>
    </div>

</div>

</body>
</html>