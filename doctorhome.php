<?php

session_start();

$conn = mysqli_connect("localhost","root","","MaternCare");

$name = $_SESSION['username'];

$total_patient = "SELECT * FROM booking";
$total_result = mysqli_query($conn,$total_patient);
$total = mysqli_num_rows($total_result);

$total_doctor = "SELECT * FROM doctors"; 
$doctor_result = mysqli_query($conn,$total_doctor); 
$doctor = mysqli_num_rows($doctor_result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="doctorhome.css">
</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="doctorhome.php">Home</a></li>
        <li><a href="doctorrecord.php">Patient Record</a></li>
        <li><a href="bookinglist.php">Booking List</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<div class="hero">

    <div class="text">

        <h1>HI, DR. <?php echo $name; ?>!</h1>
        <h2>Welcome to MaternCare Doctor Dashboard</h2>

    </div>

    <div class="stats">

        <div class="total-card">

            <h2>Total Patients</h2>
            <h1><?php echo $total; ?></h1>

        </div>

        <div class="total-card">

            <h2>Total Doctors</h2>
            <h1><?php echo $doctor; ?></h1>

        </div>

    </div>

</div>

<div class="doctor-notes">

    <h2>Doctor Notes</h2>

    <div class="notes-grid">

        <div class="note-card">
            <h3>Patient Care</h3>
            <p>Always review the patient's medical history before consultationand ensure all treatment records are updated accurately.</p>
        </div>

        <div class="note-card">
            <h3>Appointment Management</h3>
            <p>Check today's appointment schedule regularly and notify patients promptly of any changes or delays.</p>
        </div>

        <div class="note-card">
            <h3>Medical Records</h3>
            <p>Maintain complete and confidential patient records according to healthcare regulations and hospital policies.</p>
        </div>

        <div class="note-card">
            <h3>Professional Conduct</h3>
            <p>Communicate clearly, respectfully, and compassionately with patients and their families.</p>
        </div>

        <div class="note-card">
            <h3>Emergency Procedures</h3>
            <p>Be familiar with emergency response protocols and report urgent cases immediately.</p>
        </div>

        <div class="note-card">
            <h3>Continuous Learning</h3>
            <p>Stay updated with current medical guidelines, treatments and healthcare technologies.</p>
        </div>

    </div>

</div>

</body>
</html>