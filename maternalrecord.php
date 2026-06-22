<?php
session_start();

$conn = mysqli_connect("localhost","root","","materncare");

$ic_number = $_SESSION['IC_Number'] ?? null;

$row = null;

if($ic_number){

    $sql = "
    SELECT *
    FROM record
    WHERE IC_Number='$ic_number'
    ORDER BY Record_REF DESC
    LIMIT 1
    ";

    $result = mysqli_query($conn,$sql);

    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Medical Record</title>
    <link rel="stylesheet" href="maternalrecord.css">
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

<div class="main-container">

    <h1>My Medical Record</h1>

    <div class="record-wrapper">

    <?php if($row): ?>

        <!-- ADA RECORD -->
        <div class="card">
            <h2>Patient Information</h2>

            <p><strong>Name:</strong> <?php echo $row['Name']; ?></p>
            <p><strong>IC Number:</strong> <?php echo $row['IC_Number']; ?></p>
            <p><strong>Booking Ref:</strong> <?php echo $row['Booking_REF']; ?></p>
            <p><strong>Checkup Date:</strong> <?php echo $row['CheckupDate']; ?></p>
            <p><strong>Checkup Time:</strong> <?php echo $row['CheckupTime']; ?></p>
        </div>

        <div class="card">
            <h2>Maternal Record</h2>

            <p><strong>Blood Pressure:</strong> <?php echo $row['BloodPressure']; ?></p>
            <p><strong>Weight:</strong> <?php echo $row['Weight']; ?> kg</p>
            <p><strong>Height:</strong> <?php echo $row['Height']; ?> cm</p>
            <p><strong>Pregnancy Week:</strong> <?php echo $row['PregnancyWeek']; ?></p>
            <p><strong>Baby Heart Rate:</strong> <?php echo $row['BabyHeartRate']; ?> bpm</p>
            <p><strong>Blood Sugar Level:</strong> <?php echo $row['BloodSugarLevel']; ?></p>
            <p><strong>Fetal Movement:</strong> <?php echo $row['FetalMovement']; ?></p>
            <p><strong>Medical Condition:</strong> <?php echo $row['MedicalCondition']; ?></p>
            <p><strong>Notes:</strong> <?php echo $row['Notes']; ?></p>
        </div>

    <?php else: ?>

        <div class="card">
            <h2>No Medical Record</h2>
            <p>Your medical record has not been created yet.</p>
        </div>

    <?php endif; ?>

    </div>

</div>

</body>
</html>
