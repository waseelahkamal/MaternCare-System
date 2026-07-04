<?php

session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Medical Services Info</title>
<link rel="stylesheet" href="medicalservices.css">
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

<div class="medical-container">
<h1>Medical Services</h1>

<div class="medical-card">
    <img src="ultrasound.jfif" alt="Ultrasound">
    <div class="medical-content">
        <h2>Ultrasound</h2>
        <ul>
            <li>Monitors the baby's growth and development throughout pregnancy.</li>
            <li>Confirms the baby's heartbeat and estimated due date.</li>
            <li>Checks the position of the baby and placenta.</li>
            <li>Detects possible pregnancy complications or abnormalities.</li>
            <li>Helps healthcare providers assess the overall health of mother and baby.</li>
        </ul>
    </div>
</div>

<div class="medical-card">
    <img src="lab.jfif" alt="Laboratory Testing">
    <div class="medical-content">
        <h2>Laboratory Testing</h2>
        <ul>
            <li>Detects infections that may affect pregnancy.</li>
            <li>Monitors blood sugar levels and screens for gestational diabetes.</li>
            <li>Checks blood type, anemia, and overall maternal health.</li>
            <li>Assesses hormone and nutrient levels important for pregnancy.</li>
            <li>Helps identify potential risks early for timely treatment.</li>
        </ul>
    </div>
</div>

<div class="medical-card">
    <img src="healthscreening.jfif" alt="Health Screening">
    <div class="medical-content">
        <h2>Health Screening</h2>
        <ul>
            <li>Evaluates the overall health of pregnant mothers.</li>
            <li>Identifies pregnancy-related complications at an early stage.</li>
            <li>Monitors blood pressure, weight gain, and fetal development.</li>
            <li>Assesses risk factors that may affect pregnancy outcomes.</li>
            <li>Supports personalized care plans for a healthy pregnancy.</li>
        </ul>
    </div>
</div>

<div class="medical-card">
    <img src="monthlycheckup.jfif" alt="Monthly Check-Up">
    <div class="medical-content">
        <h2>Monthly Check-Up Services</h2>
        <ul>
            <li>Monitor overall health condition.</li>
            <li>Detect any health problems early.</li>
            <li>Track progress of treatment or recovery.</li>
            <li>Review symptoms and medical condition.</li>
            <li>Provide advice for maintaining good health.</li>
        </ul>
    </div>
</div>

<div class="medical-card">
    <img src="ivdrip.jfif" alt="IV Drip Therapy">
    <div class="medical-content">
        <h2>IV Drip Therapy</h2>
        <ul>
            <li>Helps maintain hydration during pregnancy.</li>
            <li>Provides essential fluids, vitamins, and nutrients when needed.</li>
            <li>Supports mothers experiencing severe morning sickness or dehydration.</li>
            <li>Assists in restoring electrolyte balance.</li>
            <li>Promotes maternal health and recovery under medical supervision.</li>
        </ul>
    </div>
</div>

</body>
</html>
