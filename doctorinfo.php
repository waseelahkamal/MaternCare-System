<?php

session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Specialist Info</title>
    <link rel="stylesheet" href="doctorinfo.css">
</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="patienthome.php">Home</a></li>
        <li><a href="bookingform.php">Booking</a></li>
        <li><a href="record.php">Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<h1 class="title">Specialist Info</h1>

<div class="doctor-container">

    <div class="doctor-card">

        <img src="OB-GYN.jfif">

        <h3>Obstetrician & Gynecologist (OB-GYN)</h3>

        <p>Handles pregnancy & women health</p>
        <p>Monitors mother and baby</p>
        <p>Treats reproductive problems</p>

    </div>

    <div class="doctor-card">

        <img src="pediatrics.jfif">

        <h3>Pediatrician</h3>

        <p>Treats children & babies</p>
        <p>Monitors growth & development</p>
        <p>Gives vaccinations</p>

    </div>

    <div class="doctor-card">

        <img src="dietitian.jpg">

        <h3>Dietitian</h3>

        <p>Plans healthy diets</p>
        <p>Gives nutrition advice</p>
        <p>Helps patient recovery with food plans</p>

    </div>

    <div class="doctor-card">

        <img src="surgeon.jfif">

        <h3>Surgeon</h3>

        <p>Performs operations</p>
        <p>Treats injuries & diseases</p>
        <p>Handles pre & post-surgery care</p>

    </div>

</div>

</div>

</div>

</body>
</html>