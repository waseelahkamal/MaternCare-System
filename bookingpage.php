<?php

session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Booking Management</title>
    <link rel="stylesheet" href="bookingpage.css">

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
        <li>
            <a href="logout.php" class="logout-btn">
                Sign Out
            </a>
        </li>
    </ul>

</nav>

<!-- HERO SECTION -->

<div class="hero">

    <div class="text">

        <h1>BOOKING MANAGEMENT</h1>
        <h2>Manage your maternal care appointments easily and efficiently.</h2>

    </div>

</div>

<!-- MENU SECTION -->

<div class="menu-section">

    <!-- NEW APPOINTMENT -->

    <div class="menu-card">

        <img src="NewApp.jfif">

        <h3>New Appointment</h3>

        <p>
            Book your maternal check-up appointment easily.
        </p>

        <a href="patientbooking.php">
            <button>
                BOOK NOW
            </button>
        </a>

    </div>

    <!-- VIEW APPOINTMENT -->

    <div class="menu-card">

        <img src="AppHistory.jfif">

        <h3>Appointment History</h3>

        <p>
            Check appointment status and booking history.
        </p>

        <a href="appointmenthistory.php">
            <button>
                VIEW
            </button>
        </a>

    </div>

</div>

</body>
</html>
