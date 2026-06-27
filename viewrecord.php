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
    <title>Maternal Record</title>
    <link rel="stylesheet" href="maternalrecord.css">
</head>

<body>
<nav>
    <div class="logo">
        <img src="logo.jfif">
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

    <h1>Maternal Record</h1>

    <?php if($row): ?>

        <div class="card">

            <p><strong>Blood Pressure:</strong> <?= $row['BloodPressure'] ?></p>
            <p><strong>Weight:</strong> <?= $row['Weight'] ?> kg</p>
            <p><strong>Height:</strong> <?= $row['Height'] ?> cm</p>
            <p><strong>Pregnancy Week:</strong> <?= $row['PregnancyWeek'] ?></p>
            <p><strong>Baby Heart Rate:</strong> <?= $row['BabyHeartRate'] ?> bpm</p>
            <p><strong>Blood Sugar Level:</strong> <?= $row['BloodSugarLevel'] ?></p>
            <p><strong>Fetal Movement:</strong> <?= $row['FetalMovement'] ?></p>
            <p><strong>Medical Condition:</strong> <?= $row['MedicalCondition'] ?></p>
            <p><strong>Notes:</strong> <?= $row['Notes'] ?></p>

        </div>

    <?php else: ?>

        <div class="card">
            <h2>No Record Found</h2>
        </div>

    <?php endif; ?>

    <br>

    <a href="maternalrecord.php">
        <button class="btn">Back</button>
    </a>

</div>

</body>
</html>