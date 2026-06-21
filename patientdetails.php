<?php

$conn = mysqli_connect("localhost","root","","materncare");

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

$record_ref = $_GET['record_ref'];

$sql = "SELECT * FROM record WHERE Record_REF='$record_ref'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <link rel="stylesheet" href="healthassessment.css">
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

<div class="container">

    <div class="section">

        <h2>Patient Medical Record</h2>

        <p><b>Name:</b> <?php echo $row['Name']; ?></p>
        <p><b>IC Number:</b> <?php echo $row['IC_Number']; ?></p>
        <p><b>Booking Ref:</b> <?php echo $row['Booking_REF']; ?></p>
        <p><b>Checkup Date:</b> <?php echo $row['CheckupDate']; ?></p>
        <p><b>Checkup Time:</b> <?php echo $row['CheckupTime']; ?></p>

        <br>

        <h2>Maternal Record</h2>

        <p><b>Preferred Hospital:</b> <?php echo $row['Hospital_Name']; ?></p>
        <p><b>Blood Pressure:</b> <?php echo $row['BloodPressure']; ?></p>
        <p><b>Weight:</b> <?php echo $row['Weight']; ?> kg</p>
        <p><b>Height:</b> <?php echo $row['Height']; ?> cm</p>
        <p><b>Pregnancy Week:</b> <?php echo $row['PregnancyWeek']; ?></p>
        <p><b>Baby Heart Rate:</b> <?php echo $row['BabyHeartRate']; ?> bpm</p>
        <p><b>Blood Sugar Level:</b> <?php echo $row['BloodSugarLevel']; ?></p>
        <p><b>Fetal Movement:</b> <?php echo $row['FetalMovement']; ?></p>
        <p><b>Medical Condition:</b> <?php echo $row['MedicalCondition']; ?></p>
        <p><b>Notes:</b> <?php echo $row['Notes']; ?></p>

    </div>

</div>

</body>
</html>