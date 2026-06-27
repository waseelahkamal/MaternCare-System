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

    <h1>My Medical Record</h1>

    <?php if($row): ?>

        <div class="card">
            <h2>Patient Information</h2>

            <p><strong>Name:</strong> <?= $row['Name'] ?></p>
            <p><strong>IC Number:</strong> <?= $row['IC_Number'] ?></p>
            <p><strong>Booking Ref:</strong> <?= $row['Booking_REF'] ?></p>
            <p><strong>Checkup Date:</strong> <?= $row['CheckupDate'] ?></p>
            <p><strong>Checkup Time:</strong> <?= $row['CheckupTime'] ?></p>

            <a href="viewrecord.php">
                <button class="btn">View Maternal Record</button>
            </a>
        </div>

    <?php else: ?>

        <div class="card">
            <h2>No Medical Record</h2>
            <p>Your medical record has not been created yet.</p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
