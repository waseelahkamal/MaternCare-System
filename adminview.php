<?php

$conn=mysqli_connect("localhost","root","","MaternCare");

$record_ref=$_GET['id'];
$sql = "SELECT * 
        FROM record 
        WHERE Record_REF='$record_ref'
        ORDER BY Record_REF DESC";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>
<title>Patient Details</title>
<link rel="stylesheet" href="adminview.css">
</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>
    
    <ul>
        <li><a href="adminhome.php">Home</a></li>
        <li><a href="adminreport.php">Report</a></li>
        <li><a href="doctorlist.php">Doctor List</a></li>
        <li><a href="bookinglist.php">Booking List</a></li>
        <li><a href="adminrecord.php">Record</a></li>
        <li><a href="logout.php"class="logout-btn">Sign Out</a>
    </li>
    </ul>

</nav>

<div class="container">

<div class="section">

<h2>Patient Medical Record</h2>

<p><b>Name:</b> <?= $row['Name'] ?></p>
<p><b>IC Number:</b> <?= $row['IC_Number'] ?></p>
<p><b>Booking Ref:</b> <?= $row['Booking_REF'] ?></p>
<p><b>Checkup Date:</b> <?php echo $row['CheckupDate']; ?></p>
<p><b>Checkup Time:</b> <?php echo $row['CheckupTime']; ?></p>

<br> 

<h2>Maternal Record</h2>

<p><b>Blood Pressure:</b> <?= $row['BloodPressure'] ?></p>
<p><b>Weight:</b> <?= $row['Weight'] ?> kg</p>
<p><b>Height:</b> <?= $row['Height'] ?> cm</p>
<p><b>Pregnancy Week:</b> <?= $row['PregnancyWeek'] ?></p>
<p><b>Baby Heart Rate:</b> <?= $row['BabyHeartRate'] ?> bpm</p>
<p><b>Blood Sugar Level:</b> <?= $row['BloodSugarLevel'] ?></p>
<p><b>Fetal Movement:</b> <?= $row['FetalMovement'] ?></p>
<p><b>Medical Condition:</b> <?= $row['MedicalCondition'] ?></p>
<p><b>Notes:</b> <?= $row['Notes'] ?></p>
</div>

</div>

</body>

</html>
