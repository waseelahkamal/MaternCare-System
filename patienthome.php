<?php
session_start();

$name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>

    <title>Home</title>

    <link rel="stylesheet" href="homestyle.css">

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
        <li><a href="maternalrecord.php">Maternal Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<div class="content">

    <div class="welcome">

        <h2>Hi, <?php echo $name; ?>!</h2>
        <h2>Treatments for a <br> Healthy Pregnant Mother</h2>
        <p>Operating Hours: Open daily from 8:00 A.M. until 5:00 P.M.</p>

    </div>

    <div class="info-cards">

        <a href="medicalinfo.php" class="card">
            <img src="medicalinfo.jfif">
            <div>
                <h3>Medical Info</h3>
                <p>View medical Information</p>
            </div>
        </a>

        <a href="hospitalinfo.php" class="card">
            <img src="iconhospital.png">
            <div>
                <h3>Hospital Info</h3>
                <p>Hospital information</p>
            </div>
        </a>

        <a href="medicalservices.php" class="card">
            <img src="iconmedical.jpg">
            <div>
                <h3>Medical Services</h3>
                <p>Available services</p>
            </div>
        </a>

    </div>

</div>

</body>
</html>
